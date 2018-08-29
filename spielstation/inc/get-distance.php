<?php
if (isset($_POST['start'])){
  $address_search = $_POST['start'];
}

// MAP ZOOMS (depending on the distances)

$map_zoom = 8;
$distance = 100000;

?>

<?php

// Get stations
$i = 0;
$distances = array();
$stations_coords = array();

$loopCount = 0;

$loop = new WP_Query( array('post_type' => 'stations', 'posts_per_page' => '-1') );
$posts = $loop->get_posts();

foreach($posts as $post) {

  $postid = $post->ID;
  setup_postdata($post); 

  $rue = get_post_meta($post->ID, 'station_adress', true);
  $cp = get_post_meta($post->ID, 'station_postcode', true);
  $ville = get_post_meta($post->ID, 'station_city', true);

  $latlong = $rue . " " . $cp . " " . $ville;

  // Calcul de distance
  if (isset($address_search)) {

    // Sleep each 10 loops
    if ($loopCount % 10 == 0) {
      sleep(2);
      echo "patience ! + LoopCount Value : ". $loopCount ."<br>";
    }

    $distancesearch = getDistance($latlong,$address_search); // DISTANCE BETWEEN SEARCH AND STATIONS
    if ($distancesearch < $distance){
      $distancesearch_array = (array)$distancesearch;
      $distances[$post->ID] = $distancesearch_array[0]; 
    }
  }

  $loopCount++;

}
wp_reset_postdata();




asort($distances);

// print_r($distances);

$i = 0;
$j = 0;

// suppression des entrées vides
$distances = array_filter($distances, function($var){
    return (!($var == '' || is_null($var) || $var == '?'));
});

// print_r($distances);

foreach ($distances as $key => $val) { // LOOP DISPLAY RESULTS
  $id_station = $key;
  $distancesearch = $val;

  $i++;
  $address = get_post_meta($id_station, 'station_adress', true);
  $zip = get_post_meta($id_station, 'station_postcode', true);
  $city = get_post_meta($id_station, 'station_city', true);
  $lat = get_post_meta($id_station, 'station_latitude', true);
  $long = get_post_meta($id_station, 'station_longitude', true);

  $latlong = $lat.",".$long;
  $stations_coords[] = array('lat'=>$lat,'lng'=>$long); // LAT & LONG FOR MAP MARKERS

  $distancesearch_display = $distancesearch / 1000; // DISTANCE FOR DISPLAY
  $distancesearch_display = ceil($distancesearch_display); ?>

      <div class="FinderResult-post" data-id="<?php echo $key; ?>">
        <div class="FinderResult-post-img">
          <div style="background-image: url(<?php echo get_the_post_thumbnail_url($id_station);?>);"></div>
        </div>
        <div class="FinderResult-post-content col-xs-12 col-sm-7">
          <div class="clearfix">
            <div class="pull-left">
              <div class="FinderResult-post-title"><?php echo get_the_title($id_station); ?></div>
              Spielstation <?php get_the_title($id_station); ?><br />
              <?php echo $address; ?><br />
              <?php echo $zip; ?> <?php echo $city; ?>
            </div>
            <div class="FinderResult-mapMarker pull-right">
              <div class="FinderResult-mapMarker-pin">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/pin.svg" alt="" />
                <div class="FinderResult-mapMarker-number"><?php echo $i; ?></div>
              </div>
              <div class="FinderResult-mapMarker-distance"><?php echo $distancesearch_display; ?> km</div>
            </div>
          </div>
          <div class="FinderResult-action">  
            <div class="pull-right btn btn--turquoise btn--disabled js-ApplyBox" disabled>Anfahrt</div>       
          </div>
        </div>
      </div>


      <div class="MapRoute-form clearfix" data-id="<?php echo $key; ?>">
        <form action="<?php echo get_page_link(880);?>" method="POST">
          <div class="row">
            <div class="MapRoute-form-adresse col-xs-12 col-sm-6">
              <p>Anfhart</p>
              <input type="text" id="start" name="start" placeholder="Ort eingeben" required />
              <input type="hidden" name="end" value="<?php echo $address; ?> <?php echo $city; ?>" />
              <input type="hidden" name="city" value="<?php echo $city; ?>" />
              <input type="hidden" name="adress" value="<?php echo $address; ?><br />" />
              <input type="hidden" name="postcode" value="<?php echo $zip; ?> <?php echo $city; ?>" />
              <img class="MapRoute-form-arrow " src="<?php echo get_template_directory_uri();?>/assets/img/arrow.svg" alt="" />
            </div>
            <div class="MapRoute-form-station col-xs-12 col-sm-4">
              <?php echo get_the_title($id_station); ?><br />
              Spielstation <?php get_the_title($id_station); ?><br />
              <?php echo $address; ?><br />
              <?php echo $zip; ?> <?php echo $city; ?>
            </div>
            <div class="MapRoute-form-button col-xs-12 col-sm-2">
              <input id="submit" type="submit" name="submit" value="Suchen">
            </div>
          </div>
        </form>
    </div>


  <?php }
  wp_reset_postdata();

  $distances = array();

?>
  
  <?php if (isset($address_search)){ ?>
  <?php // DISPLAY THE STATIONS COUNTER?>
    <script type="text/javascript">document.getElementById("found").innerHTML = <?php echo $i; ?>+' Spielstationen werden hier angezeigt';</script>

    </div>
  </section>

  <?php }
	

//
// Function GetDistance
function getDistance($adresse1,$adresse2){ // DISTANCE BETWEEN 2 POINTS
  $adresse1 = str_replace(" ", "+", $adresse1);
  $adresse2 = str_replace(" ", "+", $adresse2);

  $url='https://maps.google.com/maps/api/directions/xml?language=de&origin='.$adresse1.'&destination='.$adresse2.'&sensor=false&region=DE';
  $xml = simplexml_load_file($url) or die ("BUUUUUUUUG !");
  $status = $xml->status;
  
  // var_dump($xml);

  echo "distanceToStation : " . $xml->status ."<br>";

  $distanceToStation=$xml->route->leg->distance->value;

  if ($status == "OK"){
    return $distanceToStation;
  }
  else {
    return "?";
  }
}
//

?>


<script type="text/javascript"> // MAP SCRIPT
  window.initMap = function(){ 
    var image = '<?php echo get_template_directory_uri();?>/assets/img/pin-map.svg';
    var map = new google.maps.Map(document.getElementById('js-Map--stations'), {
      zoom: <?php echo $map_zoom; ?>,
      center: {lat: <?php echo $lat_search; ?>, lng: <?php echo $long_search; ?>},
      scrollwheel: false
    });
    var coordsArray = <?php echo json_encode($stations_coords); ?>;
    var nbrCoords = <?php echo $i;?>;
    for(var i=0;i<nbrCoords;i++){ // LOOP MARKERS
      var coordArray = coordsArray[i];
      var lat = coordArray['lat'];
      var lng = coordArray['lng'];
      var finalLng = parseFloat(lng);
      var finalLat = parseFloat(lat);
      var i_plus = i + 1;
      var i_string = i_plus.toString();
      var marker = new MarkerWithLabel({
        position: { lat: finalLat, lng: finalLng },
        map: map,
        labelContent: i_string,
        labelAnchor: new google.maps.Point(-7,30),
        labelClass: "labelsmap", // the CSS class for the label
        labelInBackground: false,
        icon: {url: image, labelOrigin: new google.maps.Point(43,19)}
      });

    }
  }
  google.maps.event.addDomListener(window, 'load', initMap);
</script>