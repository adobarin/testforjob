<?php
/**
 * The template for displaying home page.
 * @package Xmas_Lite
 */
get_header();
/**
 * Hook - xmas_lite_trending_posts.
 *
 * @hooked xmas_lite_display_trending_posts - 10
 */
do_action('xmas_lite_display_posts');

get_footer();