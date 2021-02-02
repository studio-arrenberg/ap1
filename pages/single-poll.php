<?php
/**
 * Template Name: Angebote [Default]
 * Template Post Type: gemeinsam
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */
if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) { // Execute code if user is logged in or user is the author
    acf_form_head();
    wp_deregister_style( 'wp-admin' );
}

get_header();
?>

<main id="site-content" role="main">

    <?php

if ( have_posts() ) {

    while ( have_posts() ) {
        the_post();

        if( !isset($_GET['action']) && !$_GET['action'] == 'edit' ){

    ?>

    <div class="card-container card-container__center card-container__large ">

        <?php get_template_part('elements/card', get_post_type()); ?>

    </div>
    <br>
    <h4>Kontakt</h4>
    <!-- kontakt -->
    <?php if (is_user_logged_in()) { ?>
        <?php if (get_field('phone')) { ?>
            <!-- <a class="button is-style-outline" href="tel:<?php the_field('phone'); ?>"><?php the_field('phone'); ?></a> -->
            <br>
            <p><?php the_field('phone'); ?></p>
        <?php } ?>
        <?php if (get_the_author_meta( 'user_email', get_the_author_meta( 'ID' ) )) { ?>
            <a class="button is-style-outline" href="mailto:<?php echo get_the_author_meta( 'user_email', get_the_author_meta( 'ID' ) ); ?>"><?php echo get_the_author_meta( 'user_email', get_the_author_meta( 'ID' ) ); ?></a>
        <?php } ?>
    <?php } ?>

        <br>

    <?php
    if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
        ?>
        <a class="button is-style-outline" href="<?php get_permalink(); ?>?action=edit">Umfrage bearbeiten</a>
        <a class="button is-style-outline" onclick="return confirm('Umfrage permanent löschen?')" href="<?php get_permalink(); ?>?action=delete">Umfrage löschen</a>
    <?php
    }

    ?>
    </div>
    <?php

}

else if (isset($_GET['action']) && $_GET['action'] == 'delete' && is_user_logged_in() && $current_user->ID == $post->post_author) {

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


else {
if ( ( is_user_logged_in() && $current_user->ID == $post->post_author ) ) {
    echo '<h2>Bearbeite deine Umfrage</h2><br>';
    acf_form (
        array(
            'form' => true,
            'return' => '%post_url%',
            'submit_value' => 'Änderungen speichern',
            'post_title' => false,
            'post_content' => false,    
            'field_groups' => array('group_5fcf55e0af4db'), //Arrenberg App
        )
    );
    
}
}
// echo $post->post_author;
?>


    <!-- kommentare -->
    <?php			

    // echo "kommentare";

    if( !isset($_GET['action']) && !$_GET['action'] == 'edit' ) {
    if ( ( is_single() || is_page() ) && ( comments_open() || get_comments_number() ) && ! post_password_required() ) {
    
    ?>

    <div class="comments-wrapper">

        <?php comments_template('', true); ?>

    </div><!-- .comments-wrapper -->

    <?php } ?>
    </div>
    <?php		
    	
        }

    }
}



?>



</main><!-- #site-content -->



<?php get_footer(); ?>