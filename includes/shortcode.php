<?php

namespace ots;


function enqueue_scripts() {
    //TODO only enqueue on shortcode page
    wp_enqueue_style( 'ots-css', asset( 'css/style.css' ), null, VERSION );
    wp_enqueue_script( 'ots-js', asset( 'js/script.js' ), array( 'jquery' ), VERSION );

}

add_action( 'wp_enqueue_scripts', 'ots\enqueue_scripts' );


function do_shortcode_output( $attributes = array() ) {

    $defaults = array(
        'group'           => '',
        'template'        => get_option( Options::TEMPLATE ),
        'single_template' => get_option( Options::S_TEMPLATE )
    );

    $args = shortcode_atts( $defaults, $attributes );
    $include = template_path( $args['template'] . '.php' );

    ob_start();
    extract( $args );

    // Dynamically pull in the template file
    include_once apply_filters( 'ots_template_include', $include, $attributes );

    return ob_get_clean();

}

add_shortcode( 'our-team', 'ots\do_shortcode_output' );

//TODO only print these on shortcode pages
function print_dynamic_styles() { ?>

    <style id="ots-dynamic-styles">

        #sc_our_team a,
        .sc_our_team_lightbox .name,
        .sc_personal_quote span.sc_team_icon-quote-left {
            color: <?php esc_html_e( get_option( Options::MAIN_COLOR ) ); ?>;
        }

        .grid#sc_our_team .sc_team_member .sc_team_member_name,
        .grid#sc_our_team .sc_team_member .sc_team_member_jobtitle,
        .grid_circles#sc_our_team .sc_team_member .sc_team_member_jobtitle,
        .grid_circles#sc_our_team .sc_team_member .sc_team_member_name,
        #sc_our_team_lightbox .progress,
        .sc_our_team_panel .sc-right-panel .sc-name,
        #sc_our_team .sc_team_member .icons span,
        .sc_our_team_panel .sc-right-panel .sc-skills .progress,
        #sc_our_team_lightbox .sc_our_team_lightbox .social span,
        .sc_team_single_member .sc_team_single_skills .progress {
            background: <?php esc_html_e( get_option( Options::MAIN_COLOR ) ); ?>;
        }

        .stacked#sc_our_team .smartcat_team_member {
            border-color: <?php esc_html_e( get_option( Options::MAIN_COLOR ) ); ?>;
        }

        .grid#sc_our_team .sc_team_member {
            padding: <?php esc_html_e( get_option( Options::MARGIN ) ); ?>px;
        }

    </style>

<?php }

add_action( 'wp_print_styles', 'ots\print_dynamic_styles' );