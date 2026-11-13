<?php
if ( ! defined( 'boniPS_VERSION' ) ) exit;

/**
 * boniPS About Page Header
 * @since 1.0.0
 * @version 1.0.0
 */
function bonips_about_header() {

	$name = bonips_label();

?>
<style type="text/css">
#bonips-badge { background: url('<?php echo plugins_url( 'assets/images/badge.png', boniPS_THIS ); ?>') no-repeat center center; background-size: 140px 160px; }.dashboard_page_bonips-about #wpwrap {background-color: white;}#wpwrap #bonips-about a {color: #666;background-color: #EBEBEB;padding: 10px;text-decoration: none;border-radius: 5px;}
</style>
<h1><?php printf( __( 'Willkommen zu %s %s', 'bonips' ), $name, boniPS_VERSION ); ?></h1>
<div class="about-text"><?php esc_html_e( 'Ein adaptives Punkteverwaltungssystem für WordPress-basierte Webseiten.', 'bonips' ); ?></div>
<p><?php printf( esc_html__( 'Vielen Dank, dass Du %s verwendest.', 'bonips' ), esc_html( $name ) ); ?></p>
<div class="wp-badge" id="bonips-badge">Version <?php echo boniPS_VERSION; ?></div>
<h2 class="nav-tab-wrapper wp-clearfix">
	<a class="nav-tab nav-tab-active" href="#"><?php esc_html_e( 'Neuigkeiten', 'bonips' ); ?></a>
	<a class="nav-tab" href="https://psource.eimen.net/wiki/bonipress-einstellungen/" target="_blank"><?php esc_html_e( 'Dokumentation', 'bonips' ); ?></a>
	<a class="nav-tab" href="https://psource.eimen.net/shop/artikel/category/bonips-erweiterungen/" target="_blank"><?php esc_html_e( 'Shop', 'bonips' ); ?></a>
</h2>
<?php

}


/**
 * About boniPS Page
 * @since 1.0.0
 * @version 1.0.0
 */
function bonips_about_page() {

?>
<div class="wrap about-wrap" id="bonips-about-wrap">

	<?php bonips_about_header(); ?>

	<div id="bonips-about">
		<h2><?php esc_html_e( 'Verbesserte Verwaltungswerkzeuge', 'bonips' ); ?></h2>
		<div class="feature-section two-col">
			<div class="col">
				<img src="<?php echo plugins_url( 'assets/images/bonips16-stats-addon.png', boniPS_THIS ); ?>" alt="" />			
			</div>
			<div class="col">
				<h3><?php esc_html_e( 'Statistiken', 'bonips' ); ?></h3>
				<p><?php esc_html_e( 'Das Statistik-Add-on wurde vollständig überarbeitet und unterstützt die Anzeige von Diagrammen und statistischen Daten auf Deiner Website. Vordefinierte Daten lassen sich als Tabelle, als Diagramm oder in beiden Formen anzeigen.', 'bonips' ); ?></p>
				<a href="https://psource.eimen.net/wiki/bonipress-erweiterungen/"><?php esc_html_e( 'Dokumentation', 'bonips' ); ?></a>
			</div>
			<div class="col">
				<h3><?php esc_html_e( 'Neuer Kaufabschluss für buyCRED', 'bonips' ); ?></h3>
				<p><?php esc_html_e( 'Der Kaufabschluss für buyCRED wurde überarbeitet und lässt sich leichter anpassen. Du kannst die integrierte Vorlage über Dein Theme ersetzen und die Seite nach Deinen Wünschen gestalten.', 'bonips' ); ?></p>
				<p><a href="https://psource.eimen.net/wiki/bonipress-kreditkauf/"><?php esc_html_e( 'Dokumentation', 'bonips' ); ?></a></p>
			</div>
			<div class="col">	
				<img src="<?php echo plugins_url( 'assets/images/buycred-checkout-page.png', boniPS_THIS ); ?>" alt="" />							
			</div>
		</div>
		<hr />
		<h2><?php esc_html_e( 'Verbesserungen der Add-ons', 'bonips' ); ?></h2>
		<div class="feature-section two-col">
			<div class="col">
				<h3><?php esc_html_e( 'Ränge', 'bonips' ); ?></h3>
				<p><?php esc_html_e( 'Ränge können wie Abzeichen manuell zugewiesen werden. BoniPress ändert diese Ränge nicht automatisch. Bearbeite den gewünschten Benutzer im Administrationsbereich und wähle den Rang aus.', 'bonips' ); ?></p>
			</div>
			<div class="col">
				<h3><?php esc_html_e( 'E-Mail-Benachrichtigungen', 'bonips' ); ?></h3>
				<p><?php esc_html_e( 'Das Add-on für E-Mail-Benachrichtigungen unterstützt E-Mails für bestimmte Ereignisse anhand ihrer Referenz.', 'bonips' ); ?></p>
			</div>
		</div>
		<hr />
		<h2><?php esc_html_e( 'Neue Shortcodes', 'bonips' ); ?></h2>
		<div class="feature-section three-col">
			<div class="col">
				<h3><code>[bonips_chart_circulation]</code></h3>
				<p><?php esc_html_e( 'Dieser Shortcode zeigt für jede Punkteart Diagramme zur Anzahl der aktuell bei Deinen Benutzern vorhandenen Punkte an.', 'bonips' ); ?></p>
			</div>
			<div class="col">
				<h3><code>[bonips_chart_gain_loss]</code></h3>
				<p><?php esc_html_e( 'Dieser Shortcode zeigt Diagramme zum Vergleich der vergebenen und abgezogenen Punkte an.', 'bonips' ); ?></p>
			</div>
			<div class="col">
				<h3><code>[bonips_chart_top_balances]</code></h3>
				<p><?php esc_html_e( 'Dieser Shortcode zeigt eine nach Höhe sortierte Liste der Guthaben an.', 'bonips' ); ?></p>
			</div>
		</div>
		<div class="feature-section one-col">
			<p style="text-align: center;"><a href="https://bonips.me/support/changelog/" target="_blank"><?php esc_html_e( 'Alle Änderungen ansehen', 'bonips' ); ?></a></p>
		</div>
		<hr />
	</div>

	<?php bonips_about_footer(); ?>

</div>
<?php

}
