<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>

		</div><!-- .site-content -->

		<footer id="colophon" class="site-footer clearfix" role="contentinfo">

            <div class="footer-content col-xs-12">
                <?php if ( has_nav_menu( 'footer' ) ) : ?>
                    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Primary Menu', 'twentysixteen' ); ?>">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'footer',
                            'menu_class'     => 'footer-menu',
                        ) );
                        ?>
                    </nav><!-- .main-navigation -->
                <?php endif; ?>

<!--                <div class="newsletter">-->
<!--                    <div>More Bedtime Stories</div>-->
<!--                    <div>-->
<!--                        <input type="text" disabled="disabled">-->
<!--                    </div>-->
<!--                </div>-->
            </div>
			<div class="site-info">
                <div class="year">&copy; <?php echo date('Y'); ?></div>
                <?php if ( has_nav_menu( 'signature' ) ) : ?>
                    <nav id="site-navigation" class="main-navigation" role="navigation" aria-label="<?php esc_attr_e( 'Signature Menu' ); ?>">
                        <?php
                        wp_nav_menu( array(
                            'theme_location' => 'signature',
                            'menu_class'     => 'signature-menu',
                        ) );
                        ?>
                    </nav><!-- .main-navigation -->
                <?php endif; ?>
            </div><!-- .site-info -->
		</footer><!-- .site-footer -->
	</div><!-- .site-inner -->
</div><!-- .site -->
<?php wp_footer(); ?>
<!--<script async src="/wp-content/themes/www/public/main.js"></script>-->
</body>
</html>
