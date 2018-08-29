<?php
/**
 * The template for displaying stations in finder.
 *
 *
 * @package spiestation
 */
/*
Template Name: Stations Finder
*/

get_header(); ?>

<?php
if (isset($_POST['start'])){
  $address_search = $_POST['start'];
}
elseif (isset($_GET['start'])){
  $address_search = $_GET['start'];
}

// MAP ZOOMS (fixed for fixed distance)

$map_zoom = 8;
$distance = 100;

?>

<div id="js-Map--stations" class="Map"></div>

<div class="SearchForm SearchForm--yellow">
  <form action="<?php echo esc_url( home_url( '/finder/' ) ); ?>" method="GET"> 
    <input type="text" name="start" value="<?php if (isset($address_search)){ echo $address_search; }?>" placeholder="Stadt oder PLZ eingeben." required>
    <input type="submit" value="Suchen">
  </form>
</div>

<?php
if (isset($address_search)) { ?>
  <section class="FinderResult">
    <div class="Container--small">
      <div id='found' class="FinderResult-title"></div>
       <div class="FinderResult-subtitle">Die angegebenen Entfernungen entsprechen der Luftlinie. Diese wird in einem Umkreis von 100 km, beginnend von dem gesuchten Ort, berechnet.</div>
      <div class="row">
<?php } ?>

<?php
if (isset($address_search)){ 
  $address_search_req = str_replace(" ", "+", $address_search);
}
if ((isset($address_search))){

  $coords = getXmlCoordsFromAdress($address_search_req);

  // echo "<div>Status : ".$coords['status']." / ".$coords['lat']." / ".$coords['lon']."</div>";

  if ($coords['status'] == "OVER_QUERY_LIMIT") {
    $coords = getXmlCoordsFromAdress($address_search_req);
  }
  elseif ($coords['status'] == "OK") {
    $lat_search = $coords['lat'];
    $long_search = $coords['lon'];
  }
  else {
    $lat_search = 51.165691;
    $long_search = 10.45152;

    // echo "<div class='col-xs-12'>We can't find the place you're looking for.</div>";
  }

}
else{
  $lat_search = 51.165691;
  $long_search = 10.45152;
}



// Get stations
$i = 0;
$distances = array();
$stations_coords = array();

$loopCount = 0;

$loop = new WP_Query( array('post_type' => 'stations', 'posts_per_page' => '300') );
$posts = $loop->get_posts();


foreach($posts as $post) {

  $postid = $post->ID;
  setup_postdata($post); 

  $sta2lat = get_post_meta($post->ID, 'station_latitude', true);
  $sta2lon = get_post_meta($post->ID, 'station_longitude', true);

  // Distance calc
  if (isset($address_search)){

    // Get distance with lat and long between 2 points
    $distancesearch = getDistance("$lat_search", "$long_search", "$sta2lat", "$sta2lon");

    if ($distancesearch < $distance){
      $distancesearch_array = (array)$distancesearch;
      $distances[$post->ID] = $distancesearch_array[0]; 
    }

  }
  
  $loopCount++;

}

wp_reset_postdata();

asort($distances);

$i = 0;
$j = 0;

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

  $distancesearch_display = $distancesearch; // DISTANCE FOR DISPLAY
  $distancesearch_display = ceil($distancesearch_display); ?>

    <div class="col-xs-12">
      <div class="FinderResult-post" data-id="<?php echo $key; ?>">
        <div class="FinderResult-post-img">
          <div style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/stations/spielstation-image-<?php echo rand(1,9); ?>.jpg);"></div>
        </div>
        <div class="FinderResult-post-content col-xs-12 col-sm-7">
          <div class="clearfix">
            <div class="pull-left">
              <div class="FinderResult-post-title"><?php echo $city; ?></div>
              SPIELSTATION <?php get_the_title($id_station); ?><br />
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
            <div class="pull-right btn btn--turquoise btn--disabled js-ApplyBox">Anfahrt</div>       
          </div>
        </div>
      </div>


      <div class="MapRoute-form clearfix" data-id="<?php echo $key; ?>">
        <form action="<?php echo get_page_link(880);?>" method="POST">
          <div class="row">
            <div class="MapRoute-form-adresse col-xs-12 col-sm-6">
              <p>Anfahrt</p>
              <input type="text" id="start" name="start" placeholder="Ort eingeben" required />
              <input type="hidden" name="end" value="<?php echo $address; ?> <?php echo $city; ?>" />
              <input type="hidden" name="city" value="<?php echo $city; ?>" />
              <input type="hidden" name="adress" value="<?php echo $address; ?><br />" />
              <input type="hidden" name="postcode" value="<?php echo $zip; ?> <?php echo $city; ?>" />
              <img class="MapRoute-form-arrow " src="<?php echo get_template_directory_uri();?>/assets/img/arrow.svg" alt="" />
            </div>
            <div class="MapRoute-form-station col-xs-12 col-sm-4">
              <?php echo get_the_title($id_station); ?><br />
              SPIELSTATION <?php get_the_title($id_station); ?><br />
              <?php echo $address; ?><br />
              <?php echo $zip; ?> <?php echo $city; ?>
            </div>
            <div class="MapRoute-form-button col-xs-12 col-sm-2">
              <input id="submit" type="submit" name="submit" value="Suchen">
            </div>
          </div>
        </form>
      </div>
    </div>


  <?php }
  wp_reset_postdata();

  $distances = array();
  
  if (isset($address_search)){ ?>
  <?php // DISPLAY THE STATIONS COUNTER ?>
    <script type="text/javascript">document.getElementById("found").innerHTML = <?php echo $i; ?>+' SPIELSTATIONEN werden hier angezeigt';</script>

    </div>
  </section>

  <?php }

get_footer(); ?>


<?php

  function getXmlCoordsFromAdress($address) {

    $coords=array();
    $base_url="https://maps.googleapis.com/maps/api/geocode/xml?region=de&key=AIzaSyAh8FdSMFuWNRAuugFQeO0XOA0LhcSXDBQ";

    $request_url = $base_url . "&address=" . urlencode($address) . "+deutschland";

    $xml = simplexml_load_file($request_url) or die("url not loading");
    // print_r($xml);
    $coords['lat']=$coords['lon']='';

    $coords['status'] = $xml->status;

    if($coords['status']=='OK')
    {
      $coords['lat'] = $xml->result->geometry->location->lat ;
      $coords['lon'] = $xml->result->geometry->location->lng ;
    }
    return $coords;

  }

  function getDistance($lat1, $lon1, $lat2, $lon2) {

    $theta = $lon1 - $lon2;
    $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
    $dist = acos($dist);
    $dist = rad2deg($dist);
    $distanceToStation = $dist * 60 * 1.1515 * 1.609344;

    return $distanceToStation;

  }

?>


<script type="text/javascript">
  var map;
  function initMap() { 
    var image = '<?php echo get_template_directory_uri();?>/assets/img/pin-map.svg';
    map = new google.maps.Map(document.getElementById('js-Map--stations'), {
      zoom: <?php echo $map_zoom; ?>,
      center: new google.maps.LatLng(<?php echo $lat_search .",". $long_search; ?>),
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
      var marker = new google.maps.Marker({
        position: { lat: finalLat, lng: finalLng },
        map: map,
        label: {
          text: i_string,
          // Add in the custom label here
          color: 'white',
          fontFamily: 'Arial, sans-serif, custom-label-' + i_string
        },
        icon: {url: image, labelOrigin: new google.maps.Point(43,19)}
      });

    }
  }
</script>
<script async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?region=de&key=AIzaSyBdDdjJKT1JfzPTpDHOR_fUconIeRNwbcY&libraries=geometry&language=de&callback=initMap"></script>




