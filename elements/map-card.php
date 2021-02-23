<?php
$location = get_field('map');
// print_r($location);
$map_zoom = 15; 
$width = 500;
$height = 300;


?>


<div class="card landscape gardient ">
       <div class="content">
            <div class="pre-title">
                <span> 
                    <?php if(get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) )) echo "Projekt von ".get_the_author_meta( 'user_firstname', get_the_author_meta( 'ID' ) ); ?>
                </span>
            </div>
            <h3 class="card-title">
                <?php the_title(); ?>
                <!-- Senefelderstraße 34 a -->
            </h3>
            <p class="preview-text">
                <?php echo $location['street_name']." ".$location['street_number'];  ?>
            </p>
            <div class="card-footer">
                <!-- http://maps.apple.com/?address=1,Studio,,California -->
                <!-- http://maps.apple.com/?ll=51.2492462,7.1303931,Infinite+Loop,Cupertino,California -->
                <!-- http://maps.apple.com/?saddr=San+Jose&daddr=San+Francisco&dirflg=r
                http://maps.apple.com/?daddr=51.2492462,7.1303931&dirflg=r -->
                <a class="button card-button" href="http://maps.apple.com/?daddr=<?php echo $location['lat'].",".$location['lng'];?>" target="_blank">In Karten öffenen</a>
                <a class="button card-button" target="_blank" onclick="return map_confirm()" href="https://www.google.com/maps/dir/?api=1&origin=&destination=<?php echo $location['lat'].",".$location['lng']; ?>&travelmode=walking&basemap=roadmap">In Maps öffnen</a>
            </div>
        </div>

        <div class="marker-container">
            <div class="marker">
                 <?php
                    if (empty(get_field('emoji'))) { 
                        the_post_thumbnail( 'square_m' ); 
                    } else { 
                        echo '<span class="emoji-marker">'; 
                        the_field('emoji'); 
                        echo "</span>"; 
                    } 
                    ?>
            </div>
        </div>
        
        <!-- <img src="https://api.mapbox.com/styles/v1/mapbox/light-v10/static/-87.0186,32.4055,14/500x300@2x?access_token=pk.eyJ1Ijoic3R1ZGlvYXJyZW5iZXJnIiwiYSI6ImNraWc5aGtjZzBtMGQyc3FrdXplcG5kZXYifQ._bNxRJxhINPtn18Y-hztEQ" alt="hello world"> -->
         <img src="https://api.mapbox.com/styles/v1/studioarrenberg/ckl9rpmct17pi17mxw1zw46h0/static/<?php echo $location['lng'].",".$location['lat'].",".$map_zoom."/".$width."x".$height; ?>@2x?access_token=pk.eyJ1Ijoic3R1ZGlvYXJyZW5iZXJnIiwiYSI6ImNraWc5aGtjZzBtMGQyc3FrdXplcG5kZXYifQ._bNxRJxhINPtn18Y-hztEQ" alt="Projekt Location">

    </div>
</div>


<script>
    function map_confirm() {
        if (confirm("Zu Google Maps wechseln?")) {
        } else {
            return false;
        }
    }
</script>