const assert = require( 'node:assert/strict' );
const fs = require( 'node:fs' );
const path = require( 'node:path' );
const test = require( 'node:test' );
const vm = require( 'node:vm' );

const checkout = fs.readFileSync( path.join( __dirname, '../addons/buy-creds/assets/js/checkout.js' ), 'utf8' );

function clickBuyLink( href, checkoutMode = 'popup' ) {
	const handlers = {};
	const document = {};
	let request;
	let prevented = false;
	const link = {
		attr: () => href,
		data: () => 'bank-transfer'
	};
	const chain = {
		on: ( event, selector, handler ) => {
			if ( typeof handler === 'function' ) handlers[ selector ] = handler;
			return chain;
		},
		ready: callback => callback(),
		removeClass: () => chain,
		addClass: () => chain
	};
	function jquery( selector ) {
		if ( typeof selector === 'function' ) return selector( jquery );
		return selector === link ? link : chain;
	}
	jquery.ajax = options => { request = options; };

	vm.runInNewContext( checkout, {
		jQuery: jquery,
		document,
		window: { location: { href: 'https://example.test/shop' } },
		URL,
		buyCRED: { checkout: checkoutMode, ajaxurl: 'https://example.test/' }
	} );
	handlers['.bonips-buy-link'].call( link, { preventDefault: () => { prevented = true; } } );
	return { request, prevented };
}

test( 'popup checkout preserves URL parameters and special characters', () => {
	const { request, prevented } = clickBuyLink(
		'/shop?bonips_buy=old&ctype=points&amount=25&token=abc&gift_to=7&extra=a%5Cb%22c%26d%3De%2Bf+g&duplicate=first&duplicate=last&__proto__=safe#fragment'
	);
	const data = request.data;
	assert.equal( prevented, true );
	assert.equal( request.type, 'POST' );
	assert.equal( data.ctype, 'points' );
	assert.equal( data.amount, '25' );
	assert.equal( data.token, 'abc' );
	assert.equal( data.gift_to, '7' );
	assert.equal( data.extra, 'a\\b"c&d=e+f g' );
	assert.equal( data.duplicate, 'last' );
	assert.equal( data.__proto__, 'safe' );
	assert.equal( data.ajax, 1 );
	assert.equal( data.bonips_buy, 'bank-transfer' );
} );

test( 'page checkout follows the link without an AJAX request', () => {
	const { request, prevented } = clickBuyLink( '/shop?amount=25', 'page' );
	assert.equal( prevented, false );
	assert.equal( request, undefined );
} );
