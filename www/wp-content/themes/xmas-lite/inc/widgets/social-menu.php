<?php
/**
 * Adds Xmas_Lite_Social_Menu widget.
 */
class Xmas_Lite_Social_Menu extends WP_Widget {
    /**
     * Sets up a new widget instance.
     *
     * @since 1.0.0
     */
    function __construct() {
        parent::__construct(
            'xmas_lite_social_menu_widget',
            esc_html__( 'XL: Social Menu', 'xmas-lite' ),
            array( 'description' => esc_html__( 'Displays social menu if you have set it(social menu)', 'xmas-lite' ), )
        );
    }

    /**
     * Outputs the content for the current widget instance.
     *
     * @since 1.0.0
     *
     * @param array $args     Display arguments.
     * @param array $instance Saved values from database.
     */
    public function widget( $args, $instance ) {
        echo $args['before_widget'];

        echo "<div class='widget-header-wrapper'>";
        if (!empty($instance['title'])) {
            echo $args['before_title'] . $instance['title'] . $args['after_title'];
        }
        if (!empty($instance['desc'])) {
            echo "<p class='widget-description secondary-font'>";
            echo wp_kses_post($instance['desc']);
            echo "</p>";
        }
        echo "</div>";
        ?>
        <div class="social-widget-menu">
            <?php
            if ( has_nav_menu( 'social-nav' ) ) {
                wp_nav_menu( array(
                    'theme_location' => 'social-nav',
                    'link_before'    => '<span>',
                    'link_after'     => '</span>',
                ) );
            } ?>
        </div>
        <?php if ( ! has_nav_menu( 'social-nav' ) ) : ?>
            <p>
                <?php esc_html_e( 'Social menu is not set. You need to create menu and assign it to Social Menu on Menu Settings.', 'xmas-lite' ); ?>
            </p>
        <?php endif; ?>
        <?php
        echo $args['after_widget'];
    }

    /**
     * Back-end widget form.
     *
     * @since 1.0.0
     *
     * @param array $instance Previously saved values from database.
     *
     *
     */
    public function form( $instance ) {
        $title = !empty($instance['title']) ? $instance['title'] : '';
        $desc = !empty($instance['desc']) ? $instance['desc'] : '';
        ?>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('title')); ?>">
                <?php esc_attr_e('Title:', 'xmas-lite'); ?>
            </label>
            <input class="widefat" id="<?php echo esc_attr($this->get_field_id('title')); ?>"
                   name="<?php echo esc_attr($this->get_field_name('title')); ?>" type="text"
                   value="<?php echo esc_attr($title); ?>">
        </p>
        <p>
            <label for="<?php echo esc_attr($this->get_field_id('desc')); ?>">
                <?php esc_attr_e('Short Description:', 'xmas-lite'); ?>
            </label>
            <textarea class="widefat" id="<?php echo esc_attr($this->get_field_id('desc')); ?>" name="<?php echo esc_attr($this->get_field_name('desc')); ?>"><?php echo esc_textarea($desc);?></textarea>
        </p>
        <?php
    }

    /**
     * Sanitize widget form values as they are saved.
     *
     * @since 1.0.0
     *
     * @param array $new_instance Values just sent to be saved.
     * @param array $old_instance Previously saved values from database.
     *
     * @return array Updated safe values to be saved.
     */
    public function update( $new_instance, $old_instance ) {
        $instance = array();

        $instance['title'] = (!empty($new_instance['title'])) ? sanitize_text_field($new_instance['title']) : '';
        $instance['desc'] = (!empty($new_instance['desc'])) ? wp_kses_post($new_instance['desc']) : '';

        return $instance;
    }

}