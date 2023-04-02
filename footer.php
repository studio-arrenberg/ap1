<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>

<div class="site-logo">
<?php
    $image = get_field('logo', 'option');
    if( !empty( $image ) ): ?>
        <!-- <img class="quartier-logo" src="<?php echo esc_url($image['url']); ?>" alt="<?php echo esc_attr($image['alt']); ?>" /> -->
        <?php
                echo wp_get_attachment_image($image['ID'], 'medium', false, array('class' => 'quartier-logo'));
                //  print_r( $image);
                // echo $image['ID'];
                ?>


    <?php endif; ?>

</div>

<?php if ( is_front_page() || cms_is_in_menu( 'qp_menu') ) { ?>

<div class="sponsoren">
    <?php if( have_rows('sponsors', 'option') ): ?>

        <?php while( have_rows('sponsors', 'option') ): the_row();
            $image = get_sub_field('field_6024f5b43157e');
            $link = get_sub_field('field_6036469e6db06');
        ?>
            <div class="shadow sponsor">

                <?php
                if(  !empty( $link ) ){
                ?>
                    <a href="<?php echo $link; ?>" target="_blank" rel="noreferrer">
                <?php } ?>

                <!-- <img class="sponsoren-logo" src="<?php echo esc_url($image['url']); ?>" alt="Sponsor der Quartiersplattform" >  -->
                <?php
                echo wp_get_attachment_image($image['ID'], 'medium', false, array('class' => 'sponsoren-logo', 'alt' => 'Sponsor der Quartiersplattform'));
                //  print_r( $image);
                // echo $image['ID'];
                ?>

                <?php if( !empty( $link ) ){ ?>
                    </a>
                <?php } ?>
            </div>

        <?php endwhile; ?>
    <?php endif; ?>
</div>

<?php } ?>



<footer id="site-footer" role="contentinfo" class="header-footer-group" data-track-content data-content-name="Footer">
    <div class="site-footer-content">

    <div class="footer">

        <div>
            <h4 class="heading-size-3"><?php _e('Die Plattform für dein Quartier!', 'quartiersplattform'); ?> </p>
        </div>

        <div>
            <h4 class="heading-size-3"><?php _e('Entdecke dein Viertel', 'quartiersplattform'); ?></h4>
            <a class="footer-link" href="<?php echo get_site_url(); ?>/projektverzeichnis/">  <?php _e('Alle Projekte', 'quartiersplattform'); ?> </a>
            <a class="footer-link" href="<?php echo get_site_url(); ?>/projekte/">  <?php _e('Neuigkeiten & Projektupdates', 'quartiersplattform'); ?> </a>
            <a class="footer-link" href="<?php echo get_site_url(); ?>/veranstaltungen/"> <?php _e('Veranstaltungskalender', 'quartiersplattform'); ?> </a>
            <a class="footer-link" href="<?php echo get_site_url(); ?>/sdgs/"> <?php _e('Ziele für nachhaltige Entwicklung im Quartier', 'quartiersplattform'); ?> </a>
        </div>

        <div>
            <h4 class="heading-size-3"><?php _e('Die Quartiersplattform', 'quartiersplattform'); ?></h4>
                <?php if (current_user_can('administrator')) {?>
                    <a class="footer-link" href="<?php echo  get_site_url(); ?>/einstellungen/"><?php _e('Einstellungen', 'quartiersplattform'); ?> ⚙️ </a>
                <?php } ?>
                <a class="footer-link" href="<?php echo  get_site_url(); ?>/quartiersplattform/"> <?php _e('Informationen zum Status deiner Plattform', 'quartiersplattform'); ?> </a>


            <a class="footer-link" rel="noreferrer" href="https://github.com/studio-arrenberg/quartiersplattform" target="_blank"><?php _e('Die Quartiersplattform ', 'quartiersplattform'); ?> </a>

        </div>

        <div>

        <?php if (!is_user_logged_in()) {?>

            <a class="heading-size-3 " href="<?php echo  get_site_url(); ?>/register/" ><?php _e('Jetzt registrieren', 'quartiersplattform'); ?></a>
            <?php } ?>

            <?php if (is_user_logged_in()) {?>
                <a class="heading-size-3 " href="<?php echo  get_site_url(); ?>/feedback/" ><?php _e('Feedback zur Quartiersplattform', 'quartiersplattform'); ?></a>
           <?php } ?>

        </div>
    </div>

    <div class="final-footer">
        <div>
            <!-- <a href="https://www.arrenberg.studio" rel="noreferrer" class="footer-link primary">Quartiersplattform</a> -->
            <a class="footer-link" href="<?php echo get_site_url(); ?>/impressum/"><?php _e('Impressum', 'quartiersplattform'); ?> </a>
            <?php
                if (get_privacy_policy_url()) {
                    ?>
                <a class="footer-link" href="<?php echo get_privacy_policy_url(); ?>"><?php _e('Datenschutz', 'quartiersplattform'); ?> </a>
                    <?php
                }
            ?>
        </div>

        <div class="sprache">
            <a class="button <?php if(qp_language() == "en_GB") echo "is-primary"; ?>" href="<?php echo qp_parameter_permalink('lang=en_GB'); ?>">🇬🇧&nbsp;<?php _e('English', ''); ?></a>
            <a class="button <?php if(qp_language() == "tr_TR") echo "is-primary"; ?>" href="<?php echo qp_parameter_permalink('lang=tr_TR'); ?>">🇹🇷&nbsp;<?php _e('Türkçe', ''); ?></a>
            <a class="button <?php if(qp_language() == "it_IT") echo "is-primary"; ?>" href="<?php echo qp_parameter_permalink('lang=it_IT'); ?>">🇮🇹&nbsp;<?php _e('Italiano', ''); ?></a>
            <a class="button <?php if(qp_language() == "de_DE") echo "is-primary"; ?>" href="<?php echo qp_parameter_permalink('lang=de_DE'); ?>">🇩🇪&nbsp;<?php _e('Deutsch', ''); ?></a>
        </div>


    </div><!-- .section-inner -->


</footer><!-- #site-footer -->
<?php wp_footer(); ?>
</body>

</html>
