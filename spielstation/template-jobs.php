
<?php
/**
 * The template for displaying jobs.
 *
 *
 * @package spiestation
 */
/*
Template Name: Jobs
*/

get_header(); ?>

<?php
if (isset($_GET['job_search_plz'])){
  $address_search = $_GET['job_search_plz'];
}
elseif (isset($_GET['plz'])){
  $address_search = $_GET['plz'];
}
if (isset($_GET['job_search_distance'])){
  $distance = $_GET['job_search_distance'];
}
elseif (isset($_GET['dist'])){
  $distance = $_GET['dist'];
}
if (isset($_GET['job_search_type'])){
  $search_type = $_GET['job_search_type'];
}
elseif (isset($_GET['cat'])){
  $search_type = $_GET['cat'];
}


// MAP ZOOMS (depending on the distances)

$map_zoom = 6;

if (isset($distance)) {

  if ($distance == 10){
    $map_zoom = 9;
  }
  elseif ($distance == 20){
    $map_zoom = 8;
  }
  elseif ($distance == 50){
    $map_zoom = 7;
  }

}
?>
<section id="jobangebote-head" class="ArticleBanner ArticleBanner--purple">
  <div class="container">
    <div >
      <div class="jobangebote-title  col-sm-8 col-md-6">Jobangebote</div>
    </div>
  </div>
  <img class="head-img" src="http://www.thomasrondio.com/spiel/wp-content/uploads/2016/10/Statement_Julia_Rupscheit_353x120-1.jpg" alt="">
</section>

<!-- <div id="js-Map--stations" class="Map"></div> -->
<!-- <div id="jobangebote-head">
<h3>Jobangebote</h3>
<img class="head-img" src="http://localhost:8888/wp-content/uploads/2016/10/Statement_Julia_Rupscheit_353x120-1.jpg" alt="">
</div> -->

<!-- if Search results -->
<?php if (isset($_GET['job_search_plz'])){ ?>
  <div class="flex">
    <div class="params SearchForm results SearchForm--purple clearfix col-xs-12 col-sm-spiel-5 col-lg-3">
      <div class="big-screen">
        <div >
          <div class="searchJob-form">
            <div class="searchJob-wrap">
              <form action="<?php echo esc_url( home_url( '/jobangebote/' ) ); ?>" method="GET">
                <div class="searchJob-formItem">
                  <label class="results_page" for="job_search_plz">Umkreissuche um PLZ </label>
                  <input type="text" name="job_search_plz" value="<?php if (isset($address_search)){ echo $address_search; }?>" placeholder="Stadt oder PLZ eingeben" required>
                </div>
                <br>
                <div class="searchJob-formItem">
                  <label for="job_search_distance">Umkreisdistanz </label>
                  <select name="job_search_distance" id="" class="basic">
                    <option value="100">Alle</option>
                    <option <?php if ((isset($distance))&&($distance == 10)) { echo "selected "; } ?>value="10">10 km</option>
                    <option <?php if ((isset($distance))&&($distance == 20)) { echo "selected "; } ?>value="20">20 km</option>
                    <option <?php if ((isset($distance))&&($distance == 50)) { echo "selected "; } ?>value="50">50 km</option>
                  </select>
                </div>
                <br>
                <div class="searchJob-formItem">
                  <label class="results_page" for="job_search_type">Stellenangebot </label>
                  <select name="job_search_type" id="" class="basic">
                    <option value="Alle">Alle</option>
                    <option <?php if ((isset($search_type))&&($search_type == "Servicemitarbeiter")) { echo "selected "; } ?>value="Servicemitarbeiter">Servicemitarbeiter</option>
                    <option <?php if ((isset($search_type))&&($search_type == "Reinigungskraft")) { echo "selected "; } ?>value="Reinigungskraft">Reinigungskräfte</option>
                    <option <?php if ((isset($search_type))&&($search_type == "Servicetechniker")) { echo "selected "; } ?>value="Servicetechniker">Servicetechniker</option>
                    <?php if (isset($_GET['params']) == 'ausbildung') { ?>
                      <option selected <?php if ((isset($search_type))&&($search_type == "Auszubildende")) { echo "selected "; } ?>value="Auszubildende">Auszubildende</option>
                    <?php } else { ?>
                      <option <?php if ((isset($search_type))&&($search_type == "Auszubildende")) { echo "selected "; } ?>value="Auszubildende">Auszubildende</option>
                    <?php } ?>
                  </select>
                </div>
                <br>
                <div class="searchJob-formItem">
                  <input type="submit" value="Suchen" class="suchen">
                </div>
              </form>
            </div>
          </div>
          <hr class="col-xs-12 hidden-lg-spiel hidden-xs" style="width: 90vw ">
          <div class="col-xs-12 hidden-lg-spiel hidden-xs">
            <div class="initiativJob">
              <div class="initiativJob-block">
                <div class="initiativJob-blockTitle">INITIATIVBEWERBUNG -6</div>
                <div class="initiativJob-blockDesc">
                  Nicht das Passende dabei?<br/>
                  Hier geht es zu unseren Initiativbewerbungen.
                </div>
                <div class="initiativJob-blockBtns">
                  <a href="<?php bloginfo('url'); ?>/jobs/auszubildender-m-w/" class="btn btn--purple">Ausbildung</a>
                  <a href="<?php bloginfo('url'); ?>/jobs/servicetechniker-mw/" class="btn btn--purple">Technik</a>
                </div>
              </div>
              <div class="initiativJob-link">
                <a href="https://www.schmidtgruppe.de/karriere.html" target="_blank"> <span class="no-underline">></span> <u>Weitere Jobs innerhalb der <span class="txt-bold">SCHMIDT.</span>GRUPPE</u></a>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
<?php } else { ?>
  <div class="SearchForm SearchForm--purple clearfix col-xs-12 ">
    <div class="container">
      <div >
        <div class="col-xs-12 col-md-6">
          <div class="searchJob-wrap">
            <form action="<?php echo esc_url( home_url( '/jobangebote/' ) ); ?>" method="GET">
              <div class="searchJob-formItem">
                <label for="job_search_plz">Umkreissuche um PLZ </label>
                <input type="text" name="job_search_plz" value="<?php if (isset($address_search)){ echo $address_search; }?>" placeholder="Stadt oder PLZ eingeben" required>
              </div>
              <div class="searchJob-formItem no-results">
                <label for="job_search_distance">Umkreisdistanz </label>
                <select name="job_search_distance" id="" class="basic">
                  <option value="100">Alle</option>
                  <option <?php if ((isset($distance))&&($distance == 10)) { echo "selected "; } ?>value="10">10 km</option>
                  <option <?php if ((isset($distance))&&($distance == 20)) { echo "selected "; } ?>value="20">20 km</option>
                  <option <?php if ((isset($distance))&&($distance == 50)) { echo "selected "; } ?>value="50">50 km</option>
                </select>
              </div>
              <div class="searchJob-formItem">
                <label for="job_search_type">Stellenangebot </label>
                <select name="job_search_type" id="" class="basic">
                  <option value="Alle">Alle</option>
                  <option <?php if ((isset($search_type))&&($search_type == "Servicemitarbeiter")) { echo "selected "; } ?>value="Servicemitarbeiter">Servicemitarbeiter</option>
                  <option <?php if ((isset($search_type))&&($search_type == "Reinigungskraft")) { echo "selected "; } ?>value="Reinigungskraft">Reinigungskräfte</option>
                  <option <?php if ((isset($search_type))&&($search_type == "Servicetechniker")) { echo "selected "; } ?>value="Servicetechniker">Servicetechniker</option>
                  <?php if (isset($_GET['params']) == 'ausbildung') { ?>
                    <option selected <?php if ((isset($search_type))&&($search_type == "Auszubildende")) { echo "selected "; } ?>value="Auszubildende">Auszubildende</option>
                  <?php } else { ?>
                    <option <?php if ((isset($search_type))&&($search_type == "Auszubildende")) { echo "selected "; } ?>value="Auszubildende">Auszubildende</option>
                  <?php } ?>

                </select>
              </div>
              <div class="searchJob-formItem">
                <input type="submit" value="Suchen" class="suchen">
              </div>
            </form>
          </div>
        </div>
        <hr class="col-xs-12 hidden-lg-spiel hidden-md" style="width: 80vw ">
        <div class="col-xs-12 col-md-6 hidden-xs">
          <div class="initiativJob">
            <div class="initiativJob-block background">
              <div class="initiativJob-blockTitle">INITIATIVBEWERBUNG -3</div>
              <div class="initiativJob-blockDesc">
                Nicht das Passende dabei?<br/>
                Hier geht es zu unseren Initiativbewerbungen.
              </div>
              <div class="initiativJob-blockBtns">
                <a href="<?php bloginfo('url'); ?>/jobs/auszubildender-m-w/" class="btn btn--purple">Ausbildung</a>
                <a href="<?php bloginfo('url'); ?>/jobs/servicetechniker-mw/" class="btn btn--purple">Technik</a>
              </div>
            </div>
            <div class="initiativJob-link no-padding-left">
              <a href="https://www.schmidtgruppe.de/karriere.html" target="_blank"> <span class="no-underline">></span> <u>Weitere Jobs innerhalb der <span class="txt-bold">SCHMIDT.</span>GRUPPE</u></a>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <?php } ?>
  <?php
  if (isset($address_search)) { ?>
    <section class="FinderResult col-xs-12 col-sm-spiel-7 col-lg-6">
      <div class="Container--small">
        <div id='found' class="FinderResult-title col-xs-12 col-md-6 hidden"></div>
        <div >
          <div>
          <h6 id='table-title1' class='col-xs-4 hidden-xs'>Stellenangebot</h6>
          <h6 id='table-title2' class='col-xs-4 hidden-xs right'>Standort / Gebiet</h6>
          <h6 id='table-title3' class='col-xs-4 hidden-xs right'>Straße</h6>
          <hr class="col-xs-12" style="padding: 0; margin: 0">
          </div>


          <!-- <div class="FinderResult-link col-xs-12 col-sm-6">
            Bitte wählen Sie eine Kategorie aus :
            <ul>
              <a href="?cat=Alle&plz=<?php // echo $address_search;?>&dist=<?php // echo $distance;?>"><li>Alle</li></a>
              <a href="?cat=Servicekraft&plz=<?php // echo $address_search;?>&dist=<?php // echo $distance;?>"><li>Servicekraft</li>
              <a href="?cat=Technik&plz=<?php // echo $address_search;?>&dist=<?php // echo $distance;?>"><li>Technik</li>
              <a href="?cat=Ausbildung&plz=<?php // echo $address_search;?>&dist=<?php // echo $distance;?>"><li>Ausbildung</li>
              <a href="?cat=Reinigungskraft&plz=<?php // echo $address_search;?>&dist=<?php // echo $distance;?>"><li>Reinigungskraft</li>
            </ul>
          </div>
          <a class="FinderResult-linkRight col-xs-12 col-md-6" href="https://www.schmidtgruppe.de/karriere.html">Weitere Jobs innerhlab der <span class="txt-bold">SCHMIDT</span>.GRUPPE</a>
        </div> -->
  <?php } ?>

  <?php
  if (isset($address_search)){
    $address_search_req = str_replace(" ", "+", $address_search);
    // echo $address_search_req;
    $coords = getXmlCoordsFromAdress($address_search_req);
    // echo $coords['status'];
    if ($coords['status'] == "OVER_QUERY_LIMIT") {
      $coords = getXmlCoordsFromAdress($address_search_req);
    }
    elseif ($coords['status'] == "OK") {
      $lat_search = $coords['lat'];
      $long_search = $coords['lon'];
      // echo $lat_search;
    }
    else {
      $coords = getXmlCoordsFromAdress($address_search_req);
      $lat_search = 51.165691;
      $long_search = 10.45152;
    }
  }
  else{
    $lat_search = 51.165691;
    $long_search = 10.45152;
  }
  ?>
<!--  <script async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdDdjJKT1JfzPTpDHOR_fUconIeRNwbcY&language=de&callback=initMap"></script>
  <script>
  var geocoder =  new google.maps.Geocoder();
    geocoder.geocode( { 'lat': 'miami, us'}, function(results, status) {
          if (status == google.maps.GeocoderStatus.OK) {
            alert("location : " + results[0].geometry.location.lat() + " " +results[0].geometry.location.lng());
          } else {
            alert("Something got wrong " + status);
          }
        });
  </script> -->
<?
  $i = 0;
  $distances = array();
  $stations_job = array();
  $stations_coords = array();
  $loop = new WP_Query( array( 'post_type' => 'jobs', 'posts_per_page' => '-1') );
  while ( $loop->have_posts() ) : $loop->the_post(); // LOOP JOBS
    $postid = $post->ID;
    $posts = get_field('job-attached-to-station');
    if($posts){
      foreach( $posts as $post){ // LOOP STATIONS FROM JOBS
        setup_postdata($post);
        if(get_field('city_geoloc', $post->ID) != ""){
          $city_geoloc = get_field('city_geoloc',$post->ID);
          preg_match(("/(.*),(.*)/"), $city_geoloc, $matches);

          $sta2lat =(float)$matches[1];
          $sta2lon = (float)$matches[2];
        }else{


        $sta2lat = get_post_meta($post->ID, 'station_latitude', true);
        $sta2lon = get_post_meta($post->ID, 'station_longitude', true);
        }
        // Calcul de distance
        // Distance calc
        if (isset($address_search)){

          // Get distance with lat and long between 2 points
          $distancesearch = getDistance("$lat_search", "$long_search", "$sta2lat", "$sta2lon");

          if ($distancesearch < $distance){
            // echo $distancesearch . "///";
            $distancesearch_array = (array)$distancesearch;
            $distances[$post->ID] = $distancesearch_array[0];
            $stations_job[$postid] = $post->ID;
            // echo $stations_job[$postid] . "u";

          }

        }

        // $loopCount++;

      }
      wp_reset_postdata();
    }
  endwhile;

  asort($distances);

  $i = 0;
  $j = 0;

  foreach ($distances as $key => $val) { // LOOP DISPLAY RESULTS
    $id_station = $key;
    $distancesearch = $val;
    // echo $distancesearch;
    $servicekraft = false;
    $technik = false;
    $ausbildung = false;
    $reinigungskraft = false;
    foreach ($stations_job as $jobkey => $station) { // LOOP JOBS CATEGORIES

      if ($station == $id_station){
        $typesjob = get_the_terms( $jobkey, 'jobscategories');

        // ADD control for selected category in SELECT ($search_type value)
          foreach( $typesjob as $job){
            $slugjob = $job->slug;
            if ($slugjob == 'servicemitarbeiter'){
              $servicekraft = true;
              $permalink_servicekraft = get_permalink($jobkey);
              $id_job_service = $jobkey;
            }
            elseif ($slugjob == 'servicetechniker'){
              $technik = true;
              $permalink_technik = get_permalink($jobkey);
              $id_job_technik = $jobkey;
            }
            elseif ($slugjob == 'auszubildende'){
              $ausbildung = true;
              $permalink_ausbildung = get_permalink($jobkey);
              $id_job_bildung = $jobkey;
            }
            elseif ($slugjob == 'reinigungskraft'){
              $reinigungskraft = true;
              $permalink_reinigungskraft = get_permalink($jobkey);
              $id_job_reinig = $jobkey;
            }
          }
        }
      }

      if ((($search_type == 'Servicemitarbeiter')&&($servicekraft))||(($search_type == 'Servicetechniker')&&($technik))||(($search_type == 'Auszubildende')&&($ausbildung))||(($search_type == 'Reinigungskraft')&&($reinigungskraft))||($search_type == 'Alle')){
        $i++;
        $j++;
        $address = get_post_meta($id_station, 'station_adress', true);
        $zip = get_post_meta($id_station, 'station_postcode', true);
        $city = get_post_meta($id_station, 'station_city', true);
        $lat = get_post_meta($id_station, 'station_latitude', true);
        $long = get_post_meta($id_station, 'station_longitude', true);
        $latlong = $lat.",".$long;
        $stations_coords[] = array('lat'=>$lat,'lng'=>$long); // LAT & LONG FOR MAP MARKERS

        $distancesearch_display = $distancesearch; // DISTANCE FOR DISPLAY
        $distancesearch_display = ceil($distancesearch_display); ?>
<!--         <div data-sort="<?php echo $distancesearch ?>" class="FinderResult-post row <?php echo str_replace(" ", "", $city); ?>" data-id="<?php echo $key; ?>">
          <div class="FinderResult-post-content">
            <div class="clearfix">
            </div>
            <div class="FinderResult-action"> -->
              <?php
              if ($search_type == "Servicemitarbeiter") {
                $j++;

                $region = get_field('region', $id_job_service);
                ?>
                <div data-sort="<?php echo $distancesearch ?>" class="FinderResult-post row <?php echo str_replace(" ", "", $city); ?>" data-id="<?php echo $key; ?>">
                  <div class="FinderResult-post-content">
                    <div class="clearfix">
                    </div>
                    <div class="FinderResult-action">
                <a href=<?php echo $permalink_servicekraft; ?> class='service' >
                  <div class="col-xs-12 col-sm-4 job"> Servicemitarbeiter (m/w/d)</div>
                  <?php if ($region) { ?>
                    <div class="col-xs-12 col-sm-4 region city"><?php echo $region; ?></div>

                  <?php } else { ?>
                    <div class="col-xs-12 col-sm-4 city <?php echo str_replace(" ", "", $city); ?>"><?php echo $city; ?> </div>
                    <div class="col-xs-12 col-sm-4"><p class="light"><?php echo $address; ?></p></div>
                  <?php } ?>
                </a>
                <hr>
                </div>
                          </div>
                        </div>
              <?php }

              elseif ($search_type == "Servicetechniker") {
                $j++;
                $region = get_field('region', $id_job_technik);
                ?>
                <div data-sort="<?php echo $distancesearch ?>" class="FinderResult-post row <?php echo str_replace(" ", "", $city); ?>" data-id="<?php echo $key; ?>">
                  <div class="FinderResult-post-content">
                    <div class="clearfix">
                    </div>
                    <div class="FinderResult-action">
                <a href=<?php echo $permalink_technik; ?> class="technik" >
                  <div class="col-xs-12 col-sm-4 job"> Servicetechniker (m/w/d)</div>
                   <?php if ($region) { ?>
                    <div class="col-xs-12 col-sm-4 region city"><?php echo $region; ?></div>


                  <?php } else { ?>
                    <div class="col-xs-12 col-sm-4 city <?php echo str_replace(" ", "", $city); ?>"><?php echo $city; ?> </div>
                    <div class="col-xs-12 col-sm-4"><p class="light"><?php echo $address; ?></p></div>
                  <?php } ?>
                </a>
                <hr>
                </div>
                          </div>
                        </div>
              <?php }
              elseif ($search_type == "Auszubildende") {
                $j++;
                $region = get_field('region', $id_job_bildung);
                ?>
                <div data-sort="<?php echo $distancesearch ?>" class="FinderResult-post row <?php echo str_replace(" ", "", $city); ?>" data-id="<?php echo $key; ?>">
                  <div class="FinderResult-post-content">
                    <div class="clearfix">
                    </div>
                    <div class="FinderResult-action">
                <a href=<?php echo $permalink_ausbildung; ?> class="ausbildung" >
                  <div class="col-xs-12 col-sm-4 job"> Auszubildende (m/w/d)</div>
                   <?php if ($region) { ?>
                    <div class="col-xs-12 col-sm-4 region city"><?php echo $region; ?></div>


                    </div>
                  <?php } else { ?>
                    <div class="col-xs-12 col-sm-4 city <?php echo str_replace(" ", "", $city); ?>"><?php echo $city; ?> </div>
                    <div class="col-xs-12 col-sm-4"><p class="light"><?php echo $address; ?></p></div>
                  <?php } ?>
                </a>
                <hr>
                <?php }
              elseif ($search_type == "Reinigungskraft") {
                $j++;
                $region = get_field('region', $id_job_reinig);
                ?>
                <div data-sort="<?php echo $distancesearch ?>" class="FinderResult-post row <?php echo str_replace(" ", "", $city); ?>" data-id="<?php echo $key; ?>">
                  <div class="FinderResult-post-content">
                    <div class="clearfix">
                    </div>
                    <div class="FinderResult-action">
                <a href=<?php echo $permalink_reinigungskraft; ?> class="reinigungskraft">
                  <div class="col-xs-12 col-sm-4 job"> Reinigungskraft (m/w/d)</div>
                   <?php if ($region) { ?>
                    <div class="col-xs-12 col-sm-4 region city"><?php echo $region; ?></div>

                    </div>
                  <?php } else { ?>
                    <div class="col-xs-12 col-sm-4 city <?php echo str_replace(" ", "", $city); ?>"><?php echo $city; ?> </div>
                    <div class="col-xs-12 col-sm-4"><p class="light"><?php echo $address; ?></p></div>
                  <?php } ?>
                </a>
                <hr>
                <?php }
              else {
                if ($servicekraft){
                $j++;
                $region = get_field('region', $id_job_service);
                ?>
                <div data-sort="<?php echo $distancesearch ?>" class="FinderResult-post row <?php echo str_replace(" ", "", $city); ?>" data-id="<?php echo $key; ?>">
                  <div class="FinderResult-post-content">
                    <div class="clearfix">
                    </div>
                    <div class="FinderResult-action">
                <a href=<?php echo $permalink_servicekraft; ?> class='service'>
                  <div class="col-xs-12 col-sm-4 job"> Servicemitarbeiter (m/w/d)</div>
                  <?php if ($region) { ?>
                    <div class="col-xs-12 col-sm-4 region city"><?php echo $region; ?></div>

                  <?php } else { ?>
                    <div class="col-xs-12 col-sm-4 city <?php echo str_replace(" ", "", $city); ?>"><?php echo $city; ?> </div>
                    <div class="col-xs-12 col-sm-4"><p class="light"><?php echo $address; ?></p></div>
                  <?php } ?>
                </a>
                <hr>
                </div>
                          </div>
                        </div>
              <?php }
              if($technik){
                $j++;
                $region = get_field('region', $id_job_technik);
                $jats = get_field('job-attached-to-station', $id_job_technik);
                ?>
                <div data-sort="<?php echo $distancesearch ?>" class="FinderResult-post row <?php echo str_replace(" ", "", $city); ?>" data-id="<?php echo $key; ?>">
                  <div class="FinderResult-post-content">
                    <div class="clearfix">
                    </div>
                    <div class="FinderResult-action">
                <a href=<?php echo $permalink_technik; ?> class='technik' >
                  <div class="col-xs-12 col-sm-4 job"> Servicetechniker (m/w/d)</div>
                   <?php if ($region) { ?>
                    <div class="col-xs-12 col-sm-4 region city"><?php echo $region; ?></div>

                                <!--  </div> -->
                  <?php } else { ?>
                    <div class="col-xs-12 col-sm-4 city <?php echo str_replace(" ", "", $city); ?>"><?php echo $city; ?> </div>
                    <div class="col-xs-12 col-sm-4"><p class="light"><?php echo $address; ?></p></div>
                  <?php } ?>
                </a>
                <hr>
                </div>
                          </div>
                        </div>
              <?php }
              if($ausbildung){
                $j++;
                $region = get_field('region', $id_job_bildung);
                ?>
                <div data-sort="<?php echo $distancesearch ?>" class="FinderResult-post row <?php echo str_replace(" ", "", $city); ?>" data-id="<?php echo $key; ?>">
                  <div class="FinderResult-post-content">
                    <div class="clearfix">
                    </div>
                    <div class="FinderResult-action">
                <a href=<?php echo $permalink_ausbildung; ?> class='ausbildung' >
                  <div class="col-xs-12 col-sm-4 job"> Auszubildende (m/w/d)</div>
                   <?php if ($region) { ?>
                    <div class="col-xs-12 col-sm-4 region city"><?php echo $region; ?></div>


                    </div>
                  <?php } else { ?>
                    <div class="col-xs-12 col-sm-4 city <?php echo str_replace(" ", "", $city); ?>"><?php echo $city; ?> </div>
                    <div class="col-xs-12 col-sm-4"><p class="light"><?php echo $address; ?></p></div>
                  <?php } ?>
                </a>
                <hr>
                </div>
                          </div>
                        </div>
              <?php }
              if ($reinigungskraft){
                $j++;
                $region = get_field('region', $id_job_reinig);
                ?>
                <div data-sort="<?php echo $distancesearch ?>" class="FinderResult-post row <?php echo str_replace(" ", "", $city); ?> " data-id="<?php echo $key; ?>">
                  <div class="FinderResult-post-content">
                    <div class="clearfix">
                    </div>
                    <div class="FinderResult-action">
                <a href=<?php echo $permalink_reinigungskraft; ?> class="reinigungskraft" >
                  <div class="col-xs-12 col-sm-4 job"> Reinigungskraft (m/w/d)</div>
                   <?php if ($region) { ?>
                    <div class="col-xs-12 col-sm-4 region city"><?php echo $region; ?></div>



                    </div>
                  <?php } else { ?>
                    <div class="col-xs-12 col-sm-4 city <?php echo str_replace(" ", "", $city); ?>"><?php echo $city; ?> </div>
                    <div class="col-xs-12 col-sm-4"><p class="light"><?php echo $address; ?></p></div>
                  <?php } ?>
                </a>
                <hr>
                </div>
                          </div>
                        </div>
              <?php }
              }
               ?>



        <div class="MapRoute-form clearfix" data-id="<?php echo $key; ?>">
          <form action="<?php echo get_page_link(880);?>" method="POST">
            <div >
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


      <?php } ?>

    <?php }

    if (isset($address_search)){ ?>
    <?php if ($j == 0) {// DISPLAY THE JOBS COUNTER?>
      <script type="text/javascript">
      document.getElementById("found").innerHTML = <?php echo $j; ?>+' Jobs wurden gefunden';
      document.getElementById("found").classList.remove('hidden');
      document.getElementById("table-title1").classList.add('hidden');
      document.getElementById("table-title2").classList.add('hidden');
      document.getElementById("table-title3").classList.add('hidden');
      </script>
      </div>

    </section>
    <?php  } else {?>
       </div>


    </section>
    <?php } } ?>
    <?php if (isset($_GET['job_search_plz'])){ ?>

    <div class="SearchForm SearchForm--purple clearfix col-xs-12 col-sm-5 col-lg-3 hidden-lg-down">
      <div >
        <div class="col-xs-12">
          <div class="initiativJob">
            <div class="initiativJob-block">
              <div class="initiativJob-blockTitle">INITIATIVBEWERBUNG -4</div>
              <div class="initiativJob-blockDesc">
                Nicht das Passende dabei?<br/>
                Hier geht es zu unseren Initiativbewerbungen.
              </div>
              <div class="initiativJob-blockBtns">
                <a href="<?php bloginfo('url'); ?>/jobs/auszubildender-m-w/" class="btn btn--purple">Ausbildung</a>
                <a href="<?php bloginfo('url'); ?>/jobs/servicetechniker-mw/" class="btn btn--purple">Technik</a>
              </div>
            </div>
            <div class="initiativJob-link">
              <a href="https://www.schmidtgruppe.de/karriere.html" target="_blank"> <span class="no-underline">></span> <u>Weitere Jobs innerhalb der <span class="txt-bold">SCHMIDT.</span>GRUPPE</u></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- <hr class="col-xs-12 hidden-lg-spiel hidden-sm hidden-md" style="width: 90vw "> -->
    <div class="col-xs-12 hidden-lg-spiel hidden-sm hidden-md" style=" background: #ece8de;">
      <div class="initiativJob">
        <div class="initiativJob-block">
          <div class="initiativJob-blockTitle">INITIATIVBEWERBUNG -7</div>
          <div class="initiativJob-blockDesc">
            Nicht das Passende dabei?<br/>
            Hier geht es zu unseren Initiativbewerbungen.
          </div>
          <div class="initiativJob-blockBtns">
            <a href="<?php bloginfo('url'); ?>/jobs/auszubildender-m-w/" class="btn btn--purple">Ausbildung</a>
            <a href="<?php bloginfo('url'); ?>/jobs/servicetechniker-mw/" class="btn btn--purple">Technik</a>
          </div>
        </div>
        <div class="initiativJob-link">
          <a href="https://www.schmidtgruppe.de/karriere.html" target="_blank"> <span class="no-underline">></span> <u>Weitere Jobs innerhalb der <span class="txt-bold">SCHMIDT.</span>GRUPPE</u></a>
        </div>
      </div>
    </div>
    <?php }else{ ?>
        <div class="SearchForm SearchForm--purple clearfix col-xs-12 col-sm-5 col-lg-3 hidden-md hidden-sm hidden-lg">
      <div class="">
      <!-- <hr class="col-xs-12" style="width: 90vw "> -->

        <div class="col-xs-12 hidden-sm hidden-md hidden-lg">
          <div class="initiativJob">
            <div class="initiativJob-block background">
              <div class="initiativJob-blockTitle">INITIATIVBEWERBUNG -5</div>
              <div class="initiativJob-blockDesc">
                Nicht das Passende dabei?<br/>
                Hier geht es zu unseren Initiativbewerbungen.
              </div>
              <div class="initiativJob-blockBtns">
                <a href="<?php bloginfo('url'); ?>/jobs/auszubildender-m-w/" class="btn btn--purple">Ausbildung</a>
                <a href="<?php bloginfo('url'); ?>/jobs/servicetechniker-mw/" class="btn btn--purple">Technik</a>
              </div>
            </div>
            <div class="initiativJob-link">
              <a href="https://www.schmidtgruppe.de/karriere.html" target="_blank"> <span class="no-underline">></span> <u>Weitere Jobs innerhalb der <span class="txt-bold">SCHMIDT.</span>GRUPPE</u></a>
            </div>
          </div>
        </div>
      </div>
    </div>
    <?php } ?>


  <? get_footer(); ?>

  <?php
    function produce_XML_object_tree($raw_XML) {
        libxml_use_internal_errors(true);
        try {
            $xmlTree = new SimpleXMLElement($raw_XML);
        } catch (Exception $e) {
            // Something went wrong.
            $error_message = 'SimpleXMLElement threw an exception.';
            foreach(libxml_get_errors() as $error_line) {
                $error_message .= "\t" . $error_line->message;
            }
            trigger_error($error_message);
            return false;
        }
        return $xmlTree;
    }

    function getXmlCoordsFromAdress($address) {

      $coords=array();
      $base_url="https://maps.googleapis.com/maps/api/geocode/xml?region=DE&key=AIzaSyAGhZ8ADdTHqSzZrZt7h_BSzcJZFCFfpdU";

      $request_url = $base_url . "&address=" . urlencode($address) . "+deutschland";

      $xml = simplexml_load_file($request_url) or die ("url not loading");
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
      if ($theta != 0){
        $dist = sin(deg2rad($lat1)) * sin(deg2rad($lat2)) +  cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta));
        // echo 'dist1'.$dist
        $dist = acos($dist);
        // echo 'dist2'.$dist

        $dist = rad2deg($dist);
        // echo 'dist3'.$dist
        $distanceToStation = $dist * 60 * 1.1515 * 1.609344;
      }else{
        $distanceToStation = 0;
      }



      return $distanceToStation;

    }

  ?>


<!--  -->
<!--   <script async defer type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBdDdjJKT1JfzPTpDHOR_fUconIeRNwbcY&libraries=geometry&language=de&callback=initMap"></script> -->

</div>

<script>

  $(document).ready(function() {

    // OPEN DIV SEARCH ROUTE
    $('.js-ApplyBox').on('click', function() {
      $parentBox = $(this).closest('.FinderResult-post');
      $parentBox.siblings().find('.MapRoute-form').slideUp();
      $parentBox.find('.MapRoute-form').slideToggle();
    });


    // CSS CUSTOM SELECT
    // if ($('.basic').length > 0) {
    //   $('.basic').fancySelect();
    // };
    // options.on('click', 'li', function(e) {
    //     options.find('.selected').removeClass('selected');
    //     $(e.currentTarget).addClass('selected');
    //     return sel.val($(this).data('value')).trigger('change').trigger('blur').trigger('focus');
    // });
  });
</script>
