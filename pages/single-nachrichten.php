<?php

/**
 *  
 * Template Name: Nachrichten [Default]
 * Template Post Type: Nachrichten<
 *
 */

if ( ( is_user_logged_in() && qp_project_owner() ) ) { // Execute code if user is logged in or user is the author
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}

get_header();

?>

<main id="site-content" class="page-grid" role="main">

	<div class="left-sidebar">
		<?php projekt_carousel(); ?>
	</div>

	<div class="main-content">


        <?php
        // Projekt Kachel
        project_card($post->ID);
        ?>

        <div class="page-card shadow">
            <a class="close-card-link" onclick="history.go(-1);"><img class="close-card-icon"  alt="Close" src="<?php echo get_template_directory_uri()?>/assets/icons/close.svg" /></a>

            <?php
            if ( have_posts() ) {
                while ( have_posts() ) {
                the_post();
                // get project by Term
                $term_list = wp_get_post_terms( $post->ID, 'projekt', array( 'fields' => 'all' ) );
                $the_slug = $term_list[0]->slug;
                $project_id = $term_list[0]->description;

                if( empty($_GET['action']) ){

                // prep image url
                $image_url = ! post_password_required() ? get_the_post_thumbnail_url( get_the_ID(), 'post-thumbnail' ) : '';

                if ( $image_url ) {
                    $cover_header_style   = ' style="background-image: url( ' . esc_url( $image_url ) . ' );"';
                    $cover_header_classes = ' bg-image';
                }
                // get project by Term
            ?>

            <h2 class="heading-size-3 highlight">
                <?php echo get_cpt_term_owner($post->ID, 'projekt'); ?> -
                <span class="date"><?php echo qp_date(get_the_date('Y-m-d')); ?></span>
            </h2>
            <h1 class="heading-size-1"><?php the_title(); ?><br></h1>
            <?php visibility_badge(); ?>

            <div class="single-content">
                <?php extract_links(get_field('text')); ?>
            </div>

            <img class="single-thumbnail" src="<?php echo esc_url( $image_url ) ?>" />

            <div class="gutenberg-content">
                <?php
                    // Gutenberg Editor Content
                    if ( is_search() || ! is_singular() && 'summary' === get_theme_mod( 'blog_content', 'full' ) ) {
                        the_excerpt();
                    } else {
                        the_content( __( 'Continue reading', 'twentytwenty' ) );
                    }
                ?>
            </div>
        </div>

            <?php if ( ( is_user_logged_in() && qp_project_owner() ) ) { ?>
                <div class="simple-card ">
                    <div class="button-group">
                        <a class="button is-style-outline" href="<?php qp_parameter_permalink('action=edit'); ?>"><?php _e('Nachricht bearbeiten', 'quartiersplattform'); ?></a>
                        <a class="button is-style-outline button-red" onclick="return confirm('<?php _e('Willst du diesen Beitrag endgültig löschen?','quartiersplattform'); ?>')" href="<?php qp_parameter_permalink('action=delete'); ?>"><?php _e('Nachricht löschen', 'quartiersplattform'); ?></a>
                    </div>
                </div>
                <br>
            <?php } ?>

            <?php
            // anheften
            pin_toggle();

            // sichtbarkeit
            visibility_toggle(get_the_ID(  ));

            // project is not public
            if (get_post_status() == 'draft' && qp_project_owner() ) {
                reminder_card('!warning visibilty-warning-'.get_the_ID(  ), __('Dein Beitrag ist nicht öffentlich sichtbar.','quartiersplattform'), '');
            }

            get_template_part('components/general/share-post');

            // Projekt Kachel
            // project_card($post->ID);

            // Author
            author_card();

            // Map  Not ready jet
            get_template_part('components/general/map-card');

            // Backend edit link
            qp_backend_edit_link();

            // Kommentare
            if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
            ?>
                <div class="comments-wrapper">
                    <?php comments_template('', true); ?>
                </div><!-- .comments-wrapper -->
            <?php
            } # kommentare

        } # main loop


        # Post löschen
        else if (isset($_GET['action']) && $_GET['action'] == 'delete' && is_user_logged_in() && qp_project_owner()) {

            $term_list = wp_get_post_terms( $post->ID, 'projekt', array( 'fields' => 'all' ) );
            $the_slug = $term_list[0]->slug;
            $project_id = $term_list[0]->description;

            wp_delete_post(get_the_ID());


            if ($project_id) {
                wp_redirect( get_permalink($project_id) );
            }
            else {
                wp_redirect( get_site_url() );
            }
        }
        # Post bearbeiten
        else {
            if ( ( is_user_logged_in() && qp_project_owner() ) ) {
                echo '<h2>Bearbeite deine Nachricht</h2><br>';
                acf_form (
                    array(
                        'form' => true,
                        'return' => '%post_url%',
                        'submit_value' => __('Änderungen speichern','quartiersplattform'),
                        'post_title' => true,
                        'post_content' => false,
                        'uploader' => qp_form_uploader(),
                        'field_groups' => array('group_5c5de02092e76'),
                    )
                );
            }
        }
        }
    }
    ?>
    </div>

    <div class="right-sidebar">
            <?php
            // weitere Nachrichten
            $args2 = array(
                'post_type'=> array('nachrichten', 'veranstaltungen'),
                'post_status'=>'publish',
                'posts_per_page'=> 6,
                'order' => 'DESC',
                'post__not_in' => array(get_the_ID()),
                'tax_query' => array(
                    array(
                        'taxonomy' => 'projekt',
                        'field' => 'slug',
                        'terms' => ".$the_slug."
                    )
                )
            );

            $my_query = new WP_Query($args2);
            if ($my_query->post_count > 0 && empty($_GET['action'])) {
            ?>
                <h3><?php _e('Weitere Nachrichten und Veranstaltungen aus diesem Projekt', 'quartiersplattform'); ?> </h3>
                <br>
            <?php
                card_list($args2);
            }
            ?>
            </div>
        </div>
    </div>
</main><!-- #site-content -->


<?php get_footer(); ?>
