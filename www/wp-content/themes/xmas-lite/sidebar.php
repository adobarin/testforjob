<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Xmas_Lite
 */

if ( ! is_active_sidebar( 'sidebar-1' ) ) {
	return;
}
?>

<aside id="secondary" class="widget-area">
	<div class="sidebar-bg">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
		
		<?php if (function_exists('vote_poll') && !in_pollarchive()): ?>
   
       
       
            <?php get_poll();?>
        
		
        
 
<?php endif; ?>
	</div>
</aside><!-- #secondary -->
