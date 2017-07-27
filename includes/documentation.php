<?php

namespace ots;


function add_documentation_pages() {

    add_submenu_page( 'edit.php?post_type=team_member', __( 'Documentation', 'ots' ), __( 'Documentation', 'ots' ), 'manage_options', 'ots-docs', 'ots\do_documentation_page' );

}

add_action( 'admin_menu', 'ots\add_documentation_pages' );


function add_documentation_sections() {

    add_settings_section( 'plugin-usage', __( 'Plugin Usage', 'ots' ), '', 'ots-getting-started' );
    add_settings_section( 'templates',  __( 'Templates', 'ots' ), '', 'ots-getting-started' );
    add_settings_section( 'widgets', __( 'Widgets', 'ots' ), '', 'ots-getting-started' );

}

add_action( 'admin_init', 'ots\add_documentation_sections' );


function add_documentation_fields() {

    add_settings_field( 'usage', __( 'Usage', 'ots' ), 'ots\doc_usage', 'ots-getting-started', 'plugin-usage' );
    add_settings_field( 'templates', __( 'Team View Templates', 'ots' ), 'ots\doc_templates', 'ots-getting-started', 'templates' );
    add_settings_field( 'shortcode-templates', __( 'Setting a Template and Using Short-codes', 'ots' ), 'ots\doc_shortcode_templates', 'ots-getting-started', 'templates' );
    add_settings_field( 'single-templates', __( 'Single Member View Templates', 'ots' ), 'ots\doc_single_templates', 'ots-getting-started', 'templates' );
    add_settings_field( 'custom-templates', __( 'Custom Templates - <i>Pro Version</i>', 'ots' ), 'ots\doc_custom_templates', 'ots-getting-started', 'templates' );
    add_settings_field( 'sidebar-widget', __( 'Sidebar Widget', 'ots' ), 'ots\doc_sidebar_widget', 'ots-getting-started', 'widgets' );

}

add_action( 'admin_init', 'ots\add_documentation_fields' );


function doc_usage() { ?>

    <div>
        <p>
            <?php _e( 'To display a team showcase on any page of your site, simply place the short-code <code>[our-team]</code> where you want it to appear within the page.', 'ots' ); ?>
        </p>
        <p>
            <?php _e( 'You can also indicate a specific group to display, as well as override the settings for the full team and single member templates through the short-code:', 'ots' ); ?>
            <code>[our-team group="slug" template="grid" single_template="panel"]</code>
        </p>
        <p>
            <i>
                <strong><?php _e( 'Tip:', 'ots' ); ?></strong>
                <?php _e( 'The group "slug" can be viewed and edited from the plugin settings. Go to Team > Groups and select "Quick Edit" for the group you want to use. The slug should have no capital letters, and use underscores (group_slug) or dashes (group-slug) instead of spaces.', 'ots' ); ?>
            </i>
        </p>
        <p>
            <?php _e( 'Overriding your settings is useful when you want to display the showcase in different ways on different pages.', 'ots' ); ?>
        </p>
    </div>

<?php }


function doc_templates() { ?>

    <p>
        <?php _e( 'To view the Template options for Our Team Showcase, visit the ', 'ots' ); ?>
        <a target="_blank" href="https://smartcatdesign.net/our-team-showcase-demo/"><?php _e( 'Our Team Showcase Demo Page', 'ots' ); ?></a>.
    </p>
    <p>
        <i>
            <?php _e( 'Please note that <strong>Carousel, Honeycomb, Stacked</strong> and <strong>Directory</strong> are only available in the Pro version.', 'ots' ); ?>
        </i>
    </p>

<?php }


function doc_shortcode_templates() { ?>

    <p>
        <?php _e( 'The default template, "Grid - Boxes", can be changed to one of several other options. Each one will display your team showcase in a different visual arrangement. The template can be changed in the ', 'ots' ); ?>
        <a target="_blank" href="<?php menu_page_url( 'ots-settings' ); ?>"><?php _e( 'plugin settings', 'ots' ); ?></a>.
    </p>
    <p>
        <?php _e( 'If you wish to display the Showcase in more than one configuration on the site, you can also modify the short-code to specify a different template for that version of output of the plugin.', 'ots' ); ?>
    </p>
    <p>
        <?php _e( 'Example:', 'ots' ); ?> <code>[our-team template="grid"]</code>
    </p>
    <p>
        <?php _e( 'The short-code values for each of the templates are:', 'ots' ); ?>
    </p>
    <p>
        <code>[our-team template="carousel"]</code>
        <br>
        <code>[our-team template="grid"]</code>
        <br>
        <code>[our-team template="grid_cirlces"]</code>
        <br>
        <code>[our-team template="grid_circles2"]</code>
        <br>
        <code>[our-team template="hc"]</code>
        <br>
        <code>[our-team template="stacked"]</code>
        <br>
        <code>[our-team template="directory"]</code>
    </p>

<?php }

function doc_single_templates() { ?>

    <p>
        <strong><?php _e( 'Theme Default (Single Post)', 'ots' ); ?></strong>
    </p>
    <p>
        <?php _e( 'This will load the single member page based on your theme\'s single.php file.', 'ots' ); ?>
    </p>
    <p>
        <strong><?php _e( 'Custom Template', 'ots' ); ?></strong>
    </p>
    <p>
        <?php _e( 'This will load the single member page from a custom template file (team_members_template.php).', 'ots' ); ?>
    </p>
    <p>
        <strong>
            <?php _e( 'Card Popup (single_template="vcard")', 'ots' ); ?> - <i><?php _e( 'Pro Version', 'ots' ); ?></i>
        </strong>
    </p>
    <p class="media">
        <a href="<?php echo esc_url( asset( 'images/demo/card.jpg' ) ); ?>" target="_blank">
            <img src="<?php echo esc_url( asset( 'images/demo/card.jpg' ) ); ?>">
        </a>
    </p>
    <p>
        <?php _e( 'This will load a light-box and the member details in a sliding box.', 'ots' ); ?>
    </p>
    <p>
        <strong>
            <?php _e( 'Side Panel (single_template="panel")', 'ots' ); ?> - <i><?php _e( 'Pro Version', 'ots' ); ?></i>
        </strong>
    </p>
    <p class="media">
        <a href="<?php echo esc_url( asset( 'images/demo/panel-1.jpg' ) ); ?>" target="_blank">
            <img src="<?php echo esc_url( asset( 'images/demo/panel-1.jpg' ) ); ?>">
        </a>
    </p>
    <p>
        <?php _e( 'If you do not wish to include a full single profile for each Team Member, you can disable single member view in the', 'ots' ); ?>
        <a target="_blank" href="<?php menu_page_url( 'ots-settings' ); ?>"><?php _e( ' plugin settings', 'ots' ); ?></a>.
    </p>

<?php }


function doc_custom_templates() { ?>

    <p>
        <?php _e( 'The plugin allows you to choose between several options for displaying single members. By default, the team member single page follows the theme\'s single.php file. You can choose to use the custom template, which is included in the plugin. In the Team plugin Settings page, under Single Member View Settings, select Custom Template. That tells the plugin to use the included custom template file. ', 'ots' ); ?>
    </p>
    <p>
        <strong><?php _e( 'Overriding the Custom Template', 'ots' ); ?></strong>
    </p>
    <p>
        <?php _e( 'To override the file, do not edit it from the plugin. Instead, create the file <code>/{THEME_ROOT}/team_members_template.php</code> and copy the contents of <code>/{PLUGIN_DIR}/templates/team_members_template.php</code> into it. You can then edit this file to your liking.', 'ots' ); ?>
    </p>

<?php }


function doc_sidebar_widget() { ?>

    <p>
        <?php _e( 'The plugin comes with an easy to use widget designed for appearing in your site Sidebar. Go to Appearance - Widgets and find the widget titled "Our Team Sidebar Widget".', 'ots' ); ?>
    </p>
    <p class="media">
        <a href="<?php echo esc_url( asset( 'images/demo/sidebar-widget.jpg' ) ); ?>" target="_blank">
            <img src="<?php echo esc_url( asset( 'images/demo/sidebar-widget.jpg' ) ); ?>">
        </a>
    </p>
    <p>
        <?php _e( 'You can drag & drop the widget into any widget placeholder.', 'ots' ); ?>
    </p>

<?php }


function do_documentation_page() {

    $tabs = array(
        'ots-getting-started' => __( 'Getting Started', 'ots' )
    );

    $tabs = apply_filters( 'ots_documentation_tabs', $tabs );

    reset( $tabs );

    $active = isset( $_GET['tab'] ) && array_key_exists( $_GET['tab'], $tabs ) ? $_GET['tab'] : key( $tabs );
    $screen = get_current_screen();

    ?>

    <div class="wrap ots-admin-page ots-documentation">

        <div class="ad-header">

            <div class="title-bar">

                <div class="inner">

                    <div class="branding">
                        <img src="<?php echo esc_url( asset( 'images/branding/smartcat-medium.png' ) ); ?>" />
                    </div>

                    <p class="page-title"><?php _e( 'Our Team Showcase', 'ots' ); ?></p>

                </div>

			    <?php if( apply_filters( 'ots_enable_pro_preview', true ) ) : ?>

                    <div class="inner">

                        <a href="https://smartcatdesign.net/our-team-showcase-demo/"
                           class="cta cta-secondary"
                           target="_blank">
						    <?php _e( 'View Demo', 'ots' ); ?>
                        </a>

                        <a href="https://smartcatdesign.net/downloads/our-team-showcase/"
                           class="cta cta-primary"
                           target="_blank">
						    <?php _e( 'Go Pro', 'ots' ); ?>
                        </a>

                    </div>

			    <?php endif; ?>

            </div>

            <div class="clear"></div>

        </div>

        <h2 style="display: none"></h2>

        <h2 class="nav-tab-wrapper">

            <?php foreach( $tabs as $tab => $title ) : ?>

                <a href="<?php echo $screen->parent_file . '&page=ots-docs&tab=' . $tab; ?>"
                   class="nav-tab <?php echo $active == $tab ? 'nav-tab-active' : ''; ?>"><?php esc_html_e( $title ); ?></a>

            <?php endforeach; ?>

        </h2>

        <div class="inner">

            <form><?php do_settings_sections( $active ); ?></form>

        </div>

    </div>

<?php }