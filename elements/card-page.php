<?php

/**
 * 
 * Card => Nachrichten
 *
 */

// variable text length
if (strlen(get_the_title()) < 35 ) {
    $char = 90;
}
else {
    $char = 56;
}

// variable text length
if (strlen($the_slug < 1 )) {
    $char = 200;
}

?>




<div class="card-group">
    
    <?php if (get_query_var( 'additional_info') && get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' )) ) { ?>
        <div class="pre-card">
            <a href="<?php echo get_author_posts_url(get_the_author_meta( 'ID' )); ?>">
                <?php echo get_avatar( get_the_author_meta( 'ID' ), 32 ); ?>
                <!-- ist es möglich 'Projektupdate' oberhalb des links anzuzeigen -->
                <span>
                    <b>Projektupdate</b>
                    <br>
                    Veröffentlicht von <?php echo get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                </span>
            </a>
        </div>
    <?php } ?>

    <!-- main card -->
    <div class="card shadow nachricht">
        <a class="card-link" href="<?php echo esc_url( get_permalink() ); ?>">
            <div class="content">
                <div class="pre-title">

                    <?php  echo qp_date(get_the_date('Y-m-d')); ?>
                </div> 
                <h3 class="card-title">
                    <?php shorten(get_the_title(), '60'); ?>
                </h3>
                <p class="preview-text">
                    <?php  
                    if (strlen(get_field('text')) > 2) {
                        shorten(get_field('text'), $char);
                    }
                    else {
                        shorten(get_the_content(), $char);
                    }
                    ?>
                </p>
            </div>
            <?php the_post_thumbnail( 'preview_m' ); ?>

        </a>
    </div>

    <?php if (get_query_var( 'additional_info') ) { ?>
        <div class="after-card">
            <a href="<?php echo get_permalink( get_term_id($post->ID, 'projekt') ); ?>">
                <?php echo get_the_title( get_term_id($post->ID, 'projekt') ); ?>
                <span style="margin:-1px 0px 0px 5px"><?php the_field('emoji', get_term_id($post->ID, 'projekt')); ?></span>
            </a>
        </div>
    <?php } ?>

</div>