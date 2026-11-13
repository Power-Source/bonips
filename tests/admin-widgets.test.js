const assert = require( 'node:assert/strict' );
const fs = require( 'node:fs' );
const path = require( 'node:path' );
const test = require( 'node:test' );
const vm = require( 'node:vm' );

const source = fs.readFileSync( path.join( __dirname, '../assets/js/bonips-admin-widgets.js' ), 'utf8' );

function loadWidgets( title ) {
	const widget = {};
	let displayedTitle;
	const chain = {
		ready: () => {},
		children: () => chain,
		text: value => { displayedTitle = value; }
	};
	function jquery( selector ) {
		if ( typeof selector === 'string' && selector.indexOf( 'input[id*="-title"]' ) === 0 ) {
			return { val: () => title };
		}
		return chain;
	}
	const context = { jQuery: jquery, document: {} };
	vm.runInNewContext( source, context );
	return { widgets: context.wpWidgets, widget, getTitle: () => displayedTitle };
}

function element( attributes, value ) {
	const node = {
		attributes: Object.entries( attributes ).map( ( [ name, attrValue ] ) => ( { name, value: attrValue } ) ),
		value,
		removeAttribute( name ) {
			this.attributes = this.attributes.filter( attribute => attribute.name !== name );
		},
		setAttribute( name, attrValue ) {
			const attribute = this.attributes.find( item => item.name === name );
			if ( attribute ) attribute.value = attrValue;
			else this.attributes.push( { name, value: attrValue } );
		}
	};
	return node;
}

test( 'widget title is written as text, including incomplete markup and entities', () => {
	const { widgets, widget, getTitle } = loadWidgets( '<b>Name</b> <scr<script>ipt> &amp;' );
	widgets.appendTitle( widget );
	assert.equal( getTitle(), ': Name <script> &amp;' );
} );

test( 'widget placeholders are replaced in attributes without reparsing content', () => {
	const { widgets } = loadWidgets( '' );
	const input = element( { id: 'field-__i__', name: 'widget[%i%][title]', value: 'value-__i__', 'data-__i__': 'x' }, 'edited-__i__' );
	const label = element( { for: 'field-__i__' } );
	const unchanged = element( { title: '<script>__i__</script>' } );
	const nodes = [ input, label, unchanged ];
	const widget = {
		find: selector => {
			assert.equal( selector, '*' );
			return { each: callback => nodes.forEach( node => callback.call( node ) ) };
		}
	};

	widgets.replaceWidgetPlaceholders( widget, '12' );
	const attrs = node => Object.fromEntries( node.attributes.map( attribute => [ attribute.name, attribute.value ] ) );
	assert.deepEqual( attrs( input ), { id: 'field-12', name: 'widget[12][title]', value: 'value-12', 'data-12': 'x' } );
	assert.equal( input.value, 'edited-12' );
	assert.equal( attrs( label ).for, 'field-12' );
	assert.equal( attrs( unchanged ).title, '<script>12</script>' );
} );
