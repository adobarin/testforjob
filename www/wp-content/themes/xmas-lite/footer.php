<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xmas_Lite
 */
?>
<?php
if( !is_front_page() ) {
    ?>
    </div><!-- #content -->
    <?php
}
?>

<?php
/**
 * Hook - xmas_lite_before_footer.
 *
 * @hooked xmas_lite_latest_posts - 10
 * @hooked xmas_lite_static_page_content - 20
 * @hooked xmas_lite_post_gallery - 30
 */
do_action('xmas_lite_before_footer');
?>

<footer id="colophon" class="site-footer">
    <?php if ( is_active_sidebar('footer-col-one') || is_active_sidebar('footer-col-two') || is_active_sidebar('footer-col-three') ): ?>
    <div class="footer-widget-area">
        <div class="container">
            <div class="row">
                <?php if (is_active_sidebar('footer-col-one')) : ?>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-col-one'); ?>
                    </div>
                <?php endif; ?>
                <?php if (is_active_sidebar('footer-col-two')) : ?>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-col-two'); ?>
                    </div>
                <?php endif; ?>
                <?php if (is_active_sidebar('footer-col-three')) : ?>
                    <div class="col-md-4">
                        <?php dynamic_sidebar('footer-col-three'); ?>
                    </div>
                <?php endif; ?>
            </div>
        </div>
    </div>
    <?php endif;?>

    <div class="site-copyright text-center">
        <div class="container">
            <div class="row">
                <div class="col-sm-12">
                    <span>
                       Агенство праздников"Феерия" 2019 г.
                </div>
            </div>
        </div>
    </div>

</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
