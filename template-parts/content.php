<?php
/**
 * The template part for displaying content
 *
 * @package WordPress
 * @subpackage Twenty_Sixteen
 * @since Twenty Sixteen 1.0
 */
?>
<div class="col-xs-12 padding-sm-0">
<article id="post-<?php the_ID(); ?>"  <?php post_class(); ?> <?php do_action('wol_post_highlight_options', get_the_ID(), ['highlight'=>true] )?>>
    <div class="entry-wrapper clearfix">
        <?php twentysixteen_post_thumbnail(); ?>
        <div class="entry-body">
            <header class="entry-header">
                <?php the_title( sprintf( '<h2 class="entry-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h2>' ); ?>
            </header><!-- .entry-header -->

            <div class="entry-content">
                <?php twentysixteen_excerpt(); ?>
                <?php
                /* translators: %s: Name of current post */
//                the_content( sprintf(
//                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
//                    get_the_title()
//                ) );

                wp_link_pages( array(
                    'before'      => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', 'twentysixteen' ) . '</span>',
                    'after'       => '</div>',
                    'link_before' => '<span>',
                    'link_after'  => '</span>',
                    'pagelink'    => '<span class="screen-reader-text">' . __( 'Page', 'twentysixteen' ) . ' </span>%',
                    'separator'   => '<span class="screen-reader-text">, </span>',
                ) );
                ?>
            </div><!-- .entry-content -->

            <footer class="entry-footer">
                <?php //twentysixteen_entry_meta(); ?>
                <?php
                edit_post_link(
                    sprintf(
                    /* translators: %s: Name of current post */
                        __( 'Edit<span class="screen-reader-text"> "%s"</span>', 'twentysixteen' ),
                        get_the_title()
                    ),
                    '<span class="edit-link">',
                    '</span>'
                );
                ?>
            </footer><!-- .entry-footer -->
        </div>

    </div>
</article><!-- #post-## -->
</div>
