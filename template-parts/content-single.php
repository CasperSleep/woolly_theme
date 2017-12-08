<?php
/**
 * The template part for displaying single posts
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div class="col-xs-12" style="padding: 0">
    <article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	    <?php
	    $thumb_id = get_post_thumbnail_id();
	    if( $thumb_id ) :
		    $thumb_post = get_post($thumb_id);
	    endif;
	    ?>
        <div class="header-wrapper" <?php do_action('wol_post_highlight_options', get_the_ID() )?>>
            <div class="entry-wrapper clearfix">
                <?php twentysixteen_post_thumbnail(); ?>
                <div class="entry-intro">
                    <?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

                    <?php twentysixteen_excerpt('entry-subtitle'); ?>

                    <?php twentysixteen_entry_meta(); ?>
                </div>
            </div>
        </div>
        <?php
        if( $thumb_id && $thumb_post->post_excerpt ) : ?>
            <div class="header-caption">
                <div class="caption-wrapper wp-caption-text"><?= $thumb_post->post_excerpt ?></div>
            </div>
        <?php endif; ?>

        <?php
        $twitter_title = get_the_title();
        $article_url = get_permalink(get_the_ID());
        ?>

        <div class="entry-wrapper clearfix entry-content">
                <div class="entry-social">

                    <div class="fb-share-button"
                         data-href="<?= $article_url ?>"
                         data-layout="button"
                         data-size="large"
                         data-mobile-iframe="true"
                    >
                        <a class="fb-xfbml-parse-ignore"
                           target="_blank"
                           href="javascript:void(0);"
                           >
                            Share
                        </a>
                    </div>
                    <div style="margin-top: 14px;">
                        <a class="popup tweet-button" href="https://twitter.com/share?url=<?= urlencode($article_url) ?>&via=Woolly&text=<?= urlencode($twitter_title) ?>">
                           <span class="tweet-icon">
                           </span>
                            <span>Tweet</span>
                        </a>
                    </div>
                </div>
                <div class="entry-body">
                    <?php
                    the_content();

                    ?>
                    <div class="article-category-block">
                        <?php
//                        echo get_the_category_list();
                        twentysixteen_entry_taxonomies();
                    ?>
                    </div>
                    <?php

                    wp_link_pages( array(
                        'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
                        'after'       => '</div>',
                        'link_before' => '<span>',
                        'link_after'  => '</span>',
                        'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
                        'separator'   => '<span class="screen-reader-text">, </span>',
                    ) );

                    ?>
                </div>
            <div class="entry-right"></div>
            <div class="entry-social-mobile">
                <div class="fb-share-button" style="vertical-align: top;"
                     data-href="<?= $article_url ?>"
                     data-layout="button"
                     data-size="large"
                     data-mobile-iframe="true"
                >
                    <a class="fb-xfbml-parse-ignore"
                       target="_blank"
                       href="javascript:void(0);"
                    >
                        Share
                    </a>
                </div>
                <div>
                    <a class="popup tweet-button" href="https://twitter.com/share?url=<?= urlencode($article_url) ?>&via=Woolly&text=<?= urlencode($twitter_title) ?>">
                           <span class="tweet-icon">
                           </span>
                        <span>Tweet</span>
                    </a>
                </div>
            </div>
        </div><!-- .entry-content -->
            <?php
            //<footer class="entry-footer">
//                edit_post_link(
//                    sprintf(
//                        /* translators: %s: Name of current post */
//                        __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
//                        get_the_title()
//                    ),
//                    '<span class="edit-link">',
//                    '</span>'
//                );

            // </footer><!-- .entry-footer -->
            ?>
    </article><!-- #post-## -->
</div>
