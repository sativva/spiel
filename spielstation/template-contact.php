<?php
/**
 * The template for displaying contact page.
 *
 *
 * @package spiestation
 */
/*
Template Name: Contact
*/
get_header(); ?>

<?php
while ( have_posts() ) : the_post();
?>

<section class="Contact">
  <div id="js-Map" class="Contact-map"></div>
  <div class="Contact-infos">
    <img src="<?php the_post_thumbnail_url();?>" alt="" class="img-responsive" />

    <div class="Contact-infos-adresse">
    <?php the_content();?>
    </div>

  </div>
</section>
<?php
endwhile; // End of the loop.
?>

<script>
  // SCRIPT GOOGLES MAPS
  var map;
  function initMap() {

    var map = new google.maps.Map(document.getElementById('js-Map'), {
      zoom: 15,
      center: {lat: 52.215161, lng: 13.451414},
      scrollwheel: false
    });

    google.maps.event.addDomListener(window, "resize", function() {
      var center = map.getCenter();
      google.maps.event.trigger(map, "resize");
      map.setCenter(center);
    });

    var myLatLng = {lat: 52.215161, lng: 13.451414};

    var image = '<?php echo get_template_directory_uri();?>/assets/img/pin-contact.svg';

    var marker = new google.maps.Marker({
      position: myLatLng,
      map: map,
      icon: image
    });
  }
</script>
<script async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdDdjJKT1JfzPTpDHOR_fUconIeRNwbcY&language=de&callback=initMap"></script>


<?php
get_footer();
?>
