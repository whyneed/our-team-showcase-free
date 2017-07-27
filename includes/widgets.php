<?php

namespace ots;

/**
 * Register the plugin's widgets.
 *
 * @since 4.0.0
 */
function register_widgets() {

    register_widget( TeamWidget::class );

}

add_action( 'widgets_init', 'ots\register_widgets' );


/**
 * Enqueue scripts for the sidebar widget.
 *
 * @since 4.0.0
 */
function enqueue_widget_scripts() {

	wp_enqueue_style( 'ots-widget-css', asset( 'css/widgets.css' ), null, VERSION );

}

add_action( 'wp_enqueue_scripts', 'ots\enqueue_widget_scripts' );
