<?php 

acf_form_head();
get_header();

if (!is_user_logged_in(  )) {
    exit(wp_redirect( home_url( ) ));
}


?>

<main id="site-content" role="main">
    <?php 
        //Überprüfen ob das Projekt öffentlich ist
        // echo get_post_status( $_GET['project'] );
        
        reminder_card(get_the_ID(  ).'draft', __('Projekt veröffentlichen','quartiersplattform'), __('Dein Beitrag ist zunächst nicht sichtbar, weil du zuerst das Projekt in den Projekteinstellungen veröffentlichen musst. ','quartiersplattform'));
    ?>
    <div class="left-sidebar">
		<?php projekt_carousel(); ?>
	</div>

    <div class="small-projekt-card">
    <?php
        // Projekt Kachel
        project_card($_GET['project'], 'slug');
    ?>
</div>

    <div class="publish-form">

        <h2><?php _e('Erstelle eine Nachricht', 'quartiersplattform'); ?> </h2>
        <br>

        <?php 
            acf_form(
                array(
                    'id' => 'nachrichten-form',
                    'post_id'=>'new_post',
                    'new_post'=>array(
                        'post_type' => 'nachrichten',
                        'post_status' => 'publish',
                    ),
                    'return' => get_site_url().'/gemeinsam', 
                    'field_el' => 'div',
                    'post_content' => false,
                    'uploader' => 'basic',
                    'post_title' => true,
                    'field_groups' => array('group_5c5de02092e76'),
                    'submit_value'=> __('Nachricht veröffentlichen','quartiersplattform'),
                    'html_before_fields' => '<input type="text" id="project_tax" name="project_tax" value="'.$_GET['project'].'" style="display:none;">',
                )
            ); 
        ?>
    </div>

</main><!-- #site-content -->

<?php get_footer(); ?>