<?php
// Aktuelle Veranstaltungen
$args_chronik = array(
    'post_type'=>'veranstaltungen', 
    'post_status'=>'publish', 
    'posts_per_page'=> 2,
    'meta_key' => 'event_date',
    'orderby' => 'rand',
    'order' => 'ASC',
    'offset' => '0', 
    'meta_query' => array(
        array(
            'key' => 'event_date', 
            'value' => date("Y-m-d"),
            'compare' => '>=', 
            'type' => 'DATE'
        )
    ),
    'tax_query' => array(
        array(
            'taxonomy' => 'projekt',
            'field' => 'slug',
            'terms' => ".$post->post_name."
        )
    )

);

if (count_query($args_chronik)) {
    echo "<h2>".__('Aktuelle Veranstaltung', 'quartiersplattform')."</h2>";
    card_list($args_chronik);
}

?>