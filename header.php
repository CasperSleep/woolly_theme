<?php
/**
 * The template for displaying the header
 *
 * Displays all of the head element and everything up until the "site-content" div.
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

$theme_url = get_template_directory_uri();
?><!DOCTYPE html>
<html <?php language_attributes(); ?> class="no-js">
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
    <link rel="canonical">
	<?php if ( is_singular() && pings_open( get_queried_object() ) ) : ?>
	<link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>">
	<?php endif; ?>
    <link rel="shortcut icon" href="<?= $theme_url ?>/public/favicon.ico" type="image/x-icon">
    <link rel="icon" href="<?= $theme_url ?>/public/favicon.ico" type="image/x-icon">
    <!-- Google Tag Manager -->
    <script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
            new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
            j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
            'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
        })(window,document,'script','dataLayer','GTM-W629CGP');</script>
    <!-- End Google Tag Manager -->

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<!-- Global Site Tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-101944654-6"></script>
<script>
    window.dataLayer = window.dataLayer || [];
    function gtag(){dataLayer.push(arguments)};
    gtag('js', new Date());

    gtag('config', 'UA-101944654-6');
</script>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-W629CGP"
                  height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->

<div id="fb-root"></div>
<script>(function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0];
        if (d.getElementById(id)) return;
        js = d.createElement(s); js.id = id;
        js.src = 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10';
        fjs.parentNode.insertBefore(js, fjs);
    }(document, 'script', 'facebook-jssdk'));</script>

<script>window.twttr = (function(d, s, id) {
        var js, fjs = d.getElementsByTagName(s)[0],
            t = window.twttr || {};
        if (d.getElementById(id)) return t;
        js = d.createElement(s);
        js.id = id;
        js.src = "https://platform.twitter.com/widgets.js";
        fjs.parentNode.insertBefore(js, fjs);

        t._e = [];
        t.ready = function(f) {
            t._e.push(f);
        };

        return t;
    }(document, "script", "twitter-wjs"));</script>
<script data-obct type="text/javascript">
    /** DO NOT MODIFY THIS CODE**/
    !function(_window, _document) {
        var OB_ADV_ID='00b65ba00afd1beab704faa1b041194a9e';
        if (_window.obApi) {var toArray = function(object) {return Object.prototype.toString.call(object) === '[object Array]' ? object : [object];};_window.obApi.marketerId = toArray(_window.obApi.marketerId).concat(toArray(OB_ADV_ID));return;}
        var api = _window.obApi = function() {api.dispatch ? api.dispatch.apply(api, arguments) : api.queue.push(arguments);};api.version = '1.1';api.loaded = true;api.marketerId = OB_ADV_ID;api.queue = [];var tag = _document.createElement('script');tag.async = true;tag.src = '//amplify.outbrain.com/cp/obtp.js';tag.type = 'text/javascript';var script = _document.getElementsByTagName('script')[0];script.parentNode.insertBefore(tag, script);}(window, document);
    obApi('track', 'PAGE_VIEW');
</script>
<?php $home_url = home_url(); ?>
<div id="page" class="site">
	<div class="site-inner">

		<header id="masthead" class="site-header" role="banner">
            <div class="site-branding">
                <a href="<?= $home_url; ?>" id="logo" style="width: 413px;">
                    <img src="<?= $theme_url ?>/public/woolly-logo.png">
                </a>
            </div><!-- .site-branding -->
			<div class="site-header-main">

                <div id="little-logo">
                    <a href="<?= $home_url; ?>">
                        <img src="<?= $theme_url ?>/public/woolly-logo.png" width="100">
                    </a>
                </div>
                <div id="mobile-menu-icon">
                    <img src="<?= $theme_url ?>/public/menu-lines.png">
                </div>
				<?php if ( has_nav_menu( 'primary' ) || has_nav_menu( 'social' ) ) : ?>

					<div id="site-header-menu" class="site-header-menu">
                        <div class="mobile-sidebar-header clearfix">
                            <div class="col-xs-10 padding-0">
                                <a href="<?= $home_url; ?>">
                                    <img src="<?= $theme_url ?>/public/woolly-logo.png" width="100">
                                </a>
                            </div>
                            <div class="close-sidebar col-xs-2 padding-0">
                                <img src="<?= $theme_url ?>/public/close-x.png">
                            </div>
                        </div>
						<?php if ( has_nav_menu( 'primary' ) ) : ?>
							<nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
								<?php
									wp_nav_menu( array(
										'theme_location' => 'primary',
										'menu_class'     => 'primary-menu',
									 ) );
								?>
							</nav><!-- .main-navigation -->
						<?php endif; ?>
					</div><!-- .site-header-menu -->
				<?php endif; ?>
			</div><!-- .site-header-main -->
		</header><!-- .site-header -->

        <div class="right-logo">
            <a href="https://casper.com/?utm_source=woolly&utm_medium=internal&utm_term=upper&utm_content=header_c" target="_blank" rel="noreferrer">
                <img class="white-logo" src="<?= $theme_url ?>/public/Casper_icon_blue.png">
                <img class="blue-logo" src="<?= $theme_url ?>/public/woolly-blue-logo.png">
            </a>
        </div>
        <div class="left-blue-line"></div>
        <div class="right-blue-line"></div>

		<div id="content" class="container-fluid">
