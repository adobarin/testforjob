<?php
/**
 * Template part for displaying posts
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Xmas_Lite
 */

?>
<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
    <?php if( !is_singular() ): ?>
        <header class="entry-header">
            <?php
            the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
            if ( 'post' === get_post_type() ) : ?>
            <div class="entry-meta">
                <?php xmas_lite_posted_on(); ?>
            </div><!-- .entry-meta -->
            <?php
            endif; ?>
        </header><!-- .entry-header -->
    <?php endif;?>

	<div class="entry-content">
		<?php
        if(is_singular()){
            if(has_post_thumbnail()){
                echo '<div class="saga-featured-image post-thumb border-overlay">'.get_the_post_thumbnail(get_the_ID(),'full').'</div>';
            }
            the_content( sprintf(
                wp_kses(
                /* translators: %s: Name of current post. Only visible to screen readers */
                    __( 'Continue reading<span class="screen-reader-text"> "%s"</span>', 'xmas-lite' ),
                    array(
                        'span' => array(
                            'class' => array(),
                        ),
                    )
                ),
                get_the_title()
            ) );
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xmas-lite' ),
                'after'  => '</div>',
            ) );
        }else{
            if(has_post_thumbnail()){
                echo '<div class="saga-featured-image post-thumb border-overlay">'.get_the_post_thumbnail(get_the_ID(),'xmas-lite-large-img').'</div>';
            }
            the_excerpt();
            wp_link_pages( array(
                'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'xmas-lite' ),
                'after'  => '</div>',
            ) );
        }
		?>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php xmas_lite_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article>
