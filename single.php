<?php
/**
 * The template for displaying all single posts and attachments
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header();

$theme_url = get_template_directory_uri();
?>

<div id="primary" class="content-area">
	<main id="main" class="site-main" role="main">
        <div class="row">
		<?php
		// Start the loop.
		while ( have_posts() ) : the_post();

			// Include the single post content template.
			get_template_part( 'template-parts/content', 'single' );

			// If comments are open or we have at least one comment, load up the comment template.
//			if ( comments_open() || get_comments_number() ) {
//				comments_template();
//			}

//			if ( is_singular( 'attachment' ) ) {
//				// Parent post navigation.
//				the_post_navigation( array(
//					'prev_text' => _x( '<span class="meta-nav">Published in</span><span class="post-title">%title</span>', 'Parent post link', 'twentysixteen' ),
//				) );
//			} elseif ( is_singular( 'post' ) ) {
//				// Previous/next post navigation.
//				the_post_navigation( array(
//					'next_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Next', 'twentysixteen' ) . '</span> ' .
//						'<span class="screen-reader-text">' . __( 'Next post:', 'twentysixteen' ) . '</span> ' .
//						'<span class="post-title">%title</span>',
//					'prev_text' => '<span class="meta-nav" aria-hidden="true">' . __( 'Previous', 'twentysixteen' ) . '</span> ' .
//						'<span class="screen-reader-text">' . __( 'Previous post:', 'twentysixteen' ) . '</span> ' .
//						'<span class="post-title">%title</span>',
//				) );
//			}

			// End of the loop.
		endwhile;
		?>
        </div>

        <?php do_action('wol_reflect_pinned_item'); ?>

        <div class="row">
            <div class="col-xs-12">
                <div class="magazine-wrapper clearfix">
                    <div class="iner">
                        <div class="img-wrapper">
                            <img src="<?= $theme_url ?>/public/Woolly_v.3.jpg">
                        </div>
                        <div class="magazine-body">
                            <div class="magazine-title">
                                <h2>About Woolly</h2>
                            </div>
                            <div class="magazine-content">
                                <p>A curious exploration of comfort, wellness, and modern life — emotionally supported by Casper. It’s a beautiful magazine published by a mattress. Come on, you know it’s not the weirdest thing to happen this year. The first issue includes a love letter to comfort pants, a skeptic's guide to crystals, and an adulting coloring book.</p>
                                <div class="magazine-button">
                                    <a target="_blank" href="https://casper.com/woolly-magazine/?utm_source=woolly&utm_medium=internal&utm_term=upper&utm_content=AMU_magazine">
                                        <button class="primary woolly-button">BUY MAGAZINE</button>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-xs-12 products-section">
                <div class="section-header">
                    <div class="section-title">
                        <h2><span>This Is A Casper Ad!</span></h2>
                    </div>
                    <div class="section-subhead">
                        <p>
                            Our lawyer told us we had to mention this to you so you know and now you do.
                        </p>
                    </div>
                </div>
                <div class="products-wrapper">
                    <div class="product-item">
                        <a href="https://casper.com/mattresses/casper/?utm_source=woolly&utm_medium=internal&utm_term=upper&utm_content=cs_COR" target="_blank">
                            <img src="<?= $theme_url ?>/public/products/casper-gallery-02-mattress-zip.png" alt="" style="margin-bottom: 20px">
                            <div class="model">The Casper</div>
                            <div class="dscr">The mattress that made Casper famous for making ridiculously comfortable mattresses.</div>
                        </a>
                    </div>


                    <div class="product-item">
                        <a href="https://casper.com/sheets/?utm_source=woolly&utm_medium=internal&utm_term=upper&utm_content=cs_SHE" target="_blank">
                            <img src="<?= $theme_url ?>/public/products/us-pip-sheets-tile.png" alt="">
                            <div class="model">The Sheets</div>
                            <div class="dscr">
                                Soft, crisp, airy, smooth and other words to describe really excellent sheets.
                            </div>
                        </a>
                    </div>

                    <div class="product-item">
                        <a href="https://casper.com/pillows/?utm_source=woolly&utm_medium=internal&utm_term=upper&utm_content=cs_PIL" target="_blank">
                            <img src="<?= $theme_url ?>/public/products/us-pip-pillow-tile.png" alt="">
                            <div class="model">The Pillow</div>
                            <div class="dscr">
                                Your head deserves a supportive, but fluffy, giant marshmallow to dream on.
                            </div>
                        </a>
                    </div>
                </div>
            </div>
        </div>
	</main><!-- .site-main -->

</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
