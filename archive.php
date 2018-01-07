<?php
/**
 * The template for displaying archive pages
 *
 * Used to display archive-type pages if nothing more specific matches a query.
 * For example, puts together date-based pages if no date.php file exists.
 *
 * If you'd like to further customize these archive views, you may create a
 * new template file for each one. For example, tag.php (Tag archives),
 * category.php (Category archives), author.php (Author archives), etc.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
            
		<?php if ( have_posts() ) : ?>

            <div class="row">
                <div class="col-xs-12 padding-0">
            <header class="page-header">
                <h1>
                    <?= single_cat_title( '', false ) ?>
                </h1>
				<?php

//					the_archive_title( '<h1 class="page-title">', '</h1>' );
//					the_archive_description( '<div class="taxonomy-description">', '</div>' );
				?>
            </header><!-- .page-header -->
                </div>
            </div>
            <div class="row posts-block">
			<?php
			// Start the Loop.
			while ( have_posts() ) : the_post();

				/*
				 * Include the Post-Format-specific template for the content.
				 * If you want to override this in a child theme, then include a file
				 * called content-___.php (where ___ is the Post Format name) and that will be used instead.
				 */
				get_template_part( 'template-parts/content', get_post_format() );

			// End the loop.
			endwhile; ?>
            </div>
                <?php

			// Previous/next page navigation.
//			the_posts_pagination( array(
//				'prev_text'          => __( 'Previous page', 'twentysixteen' ),
//				'next_text'          => __( 'Next page', 'twentysixteen' ),
//				'before_page_number' => '<span class="meta-nav screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>',
//			) );

		// If no content, include the "No posts found" template.
		else :
			get_template_part( 'template-parts/content', 'none' );

		endif;

        if( $GLOBALS['wp_query']->found_posts > $GLOBALS['wp_query']->post_count ) :
            $adding_data = '';
            $queried_object = get_queried_object();
            if( $queried_object instanceof  \WP_Term ) :
                $adding_data = 'data-tax="' . $queried_object->taxonomy . '" data-id="' . $queried_object->term_id . '"';
            elseif ($queried_object instanceof \WP_User ) :
                $adding_data = 'data-auth="' . $queried_object->ID . '"';
            endif;
            if ($adding_data) :
            ?>

            <div class="row">
                <div class="col-xs-12">
                    <div class="load-more">
                        <button id="b_more_stories" class="button" <?= $adding_data ?>>More stories</button>
                    </div>
                </div>
            </div>
        <?php endif;
        endif; ?>


		</main><!-- .site-main -->
	</div><!-- .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
