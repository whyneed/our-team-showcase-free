<?php

namespace ots;

$members = get_members_in_order( $get_attr( 'group' ) );

?>

<div id="sc_our_team" class="grid_circles2 sc-col<?php esc_attr_e( get_option( Options::GRID_COLUMNS ) ); ?>">

    <div class="clear"></div>

    <?php if ( $members->have_posts() ) : ?>

        <?php while ( $members->have_posts() ) : $members->the_post(); ?>

            <div itemscope itemtype="http://schema.org/Person" class="sc_team_member">

                <div class="sc_team_member_inner">

                    <?php member_avatar(); ?>

                    <?php if ( get_option( Options::DISPLAY_NAME ) == 'on' ) : ?>

                        <div itemprop="name" class="sc_team_member_name">
                            <a href="<?php the_permalink() ?>" rel="bookmark" ><?php the_title() ?></a>
                        </div>

                    <?php endif; ?>

                    <?php if ( get_option( Options::DISPLAY_TITLE ) == 'on' ) : ?>

                        <div itemprop="jobtitle" class="sc_team_member_jobtitle">
                            <?php esc_html_e( get_post_meta( get_the_ID(), 'team_member_title', true ) ); ?>
                        </div>

                    <?php endif; ?>

                    <div class="sc_team_content"><?php the_content(); ?></div>

                    <div class='icons <?php echo get_option( Options::SHOW_SOCIAL ) ? '' : 'hidden'; ?>'>
                        <?php do_member_social_links(); ?>
                    </div>

                    <div class="sc_team_member_overlay"></div>

                </div>

            </div>

            <?php wp_reset_postdata(); ?>

        <?php endwhile; ?>

    <?php else : ?>

        <?php _e( 'There are no team members to display.', 'ots' ); ?>

    <?php endif; ?>

    <div class="clear"></div>

</div>
