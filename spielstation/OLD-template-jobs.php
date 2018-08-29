<?php
/**
 * The template for displaying jobs.
 *
 *
 * @package spiestation
 */
/*
Template Name: J!!!!obs
*/
get_header(); ?>

<?php 

  //echo "job_search_plz : " . $_POST['job_search_plz']; 

  // ALGO
 // Je récupère le code postal entré à l'étape précédente, sur la Home du site (OU) sur la page en question

  // On récupère d'abord les salles répondant à ce code postal

  // On cherche les jobs qui sont rattachés à la salle
  // 

?>


<div id="js-Map--stations" class="Map"></div>

<!-- <div id="js-Map" class="Map"></div> -->

    <div class="SearchForm SearchForm--purple clearfix">

      <div class="container">
        <div class="row">

          <div class="col-xs-12 col-md-6">

            <div class="searchJob-wrap">

              <form action="<?php echo get_page_link(896); ?>" method="POST">
                
                <div class="searchJob-formItem">
                  <label for="job_search_plz">Umkreissuche um PLZ : </label>
                  <input type="text" name="job_search_plz" value="<?php echo $_POST['job_search_plz']; ?>" placeholder="Stadt order PLZ eingeben" required>
                </div>

                <div class="searchJob-formItem">
                  <label for="job_search_distance">Umkreisdistanz : </label>
                  <select name="job_search_distance" id="" class="basic">
                    <option value="Alle">Alle</option>
                    <option value="20">20 km</option>
                    <option value="50">50 km</option>
                    <option value="100">100 km</option>
                  </select>
                </div>

                <div class="searchJob-formItem">
                  <label for="job_search_type">Aufgabengebiet : </label>
                  <select name="job_search_type" id="" class="basic">
                    <option value="Alle">Alle</option>
                    <option value="Servicekraft">Servicekraft</option>
                    <option value="Technik">Technik</option>
                    <option value="Ausbildung">Ausbildung</option>
                  </select>
                </div>

                <div class="searchJob-formItem">
                  <input type="submit" value="Suchen">
                </div>

              </form>

            </div>

          </div>

          <div class="col-xs-12 col-md-5 col-md-offset-1">

            <div class="initiativJob">

              <div class="initiativJob-block">
                <div class="initiativJob-blockTitle">Initiativ</div>
                <div class="initiativJob-blockDesc">
                  Nicht das Passende debai?<br/>
                  Hier geht es zu unseren Initiativbewerbungen.
                </div>
                <div class="initiativJob-blockBtns">
                  <a href="#" class="btn btn--purple">Ausbildung</a>
                  <a href="#" class="btn btn--purple">Technik</a>
                </div>
              </div>

              <div class="initiativJob-link">
                <a href="#">Weitere Jobs innerhlab der Schmidtgruppe</a>
              </div>

            </div>

          </div>
        
        </div>
      </div>

      
    </div>

    <section class="FinderResult">
        <div class="Container--small">
          <div class="FinderResult-title">7 Jobs wurden gefunden</div>

          <div class="row">
            <div class="FinderResult-link col-xs-12 col-sm-6">
              Bitte wählen Sie eine Kategorie aus :
              <ul>
                <li>Alle</li>
                <li>Servicekraft</li>
                <li>Technik</li>
                <li>Ausbildung</li>
              </ul>
            </div>

            <a class="FinderResult-linkRight col-xs-12 col-sm-6" href="#">Weitere Jobs innerhlab der Schmidtgruppe</a>
          </div>

          <?php 

            // 
            // Query to get all stations
              // All stations that have attached jobs


              $args = array(
                'post_type' => 'stations',
                'posts_per_page'=>'7',
                //'connected_type' => 'jobs_to_stations',
                //'connected_to' => 'any',
                //'connected_query' => array(
                //   'category_name' => 'servicekraft',
                // ),
                );
              query_posts( $args );

              // LOOP COUNT
                $i = 1;
              //





              while(have_posts()) : the_post();



              // GET ATTACHED STATIONS INFOS
              

            ?>

                <div class="FinderResult-post">
            
                  <div class="FinderResult-post-img" data-id="0">
                    <div style="background-image: url(<?php the_post_thumbnail_url();?>);"></div>
                  </div>
                  <div class="FinderResult-post-content col-xs-12 col-sm-7">
                    <div class="clearfix">
                      <div class="pull-left">
                        <div class="FinderResult-post-title"><?php the_title(); ?></div>

                        <?php
                          $address = get_post_meta($post->ID, 'station_adress', true);
                          $zip = get_post_meta($post->ID, 'station_postcode', true);
                          $city = get_post_meta($post->ID, 'station_city', true);
                        ?>
                        Spielstation <?php the_title(); ?><br />
                        <?php echo $address; ?><br />
                        <?php echo $zip; ?> <?php echo $city; ?>
                      </div>

                      <div class="FinderResult-mapMarker pull-right">
                        <div class="FinderResult-mapMarker-pin">
                          <img src="<?php echo get_template_directory_uri();?>/assets/img/pin.svg" alt="" />
                          <div class="FinderResult-mapMarker-number"><?php echo $i; ?></div>
                        </div>
                        <div class="FinderResult-mapMarker-distance">300 km</div>
                      </div>
                    </div>

                    <div class="FinderResult-action">  
                      <a href="<?php bloginfo('home'); ?>/jobs/bremen-servicekraft/" class="btn btn--purple">Servicekraft</a>
                      <a href="<?php bloginfo('home'); ?>/jobs/bremen-technik/" class="btn btn--purple">Technik</a>                  

                      <?php

                      // Show category 
                        // $terms = get_terms( 'jobscategories' );
                        // if ( ! empty( $terms ) && ! is_wp_error( $terms ) ){
                        //     foreach ( $terms as $term ) {
                        //         echo '<a href="'.get_page_link(21).'" class="btn btn--purple">' . $term->name . '</a>';
                        //     }
                        // }

                      ?>

                      <div class="pull-right btn btn--turquoise btn--disabled js-ApplyBox" disabled>Anfahrt</div>
                      
                      
                    </div>
                  </div>
                 
                </div>

                <!-- <div class="MapRoute-form clearfix" data-id="'+ i +'">
                      <form action="<?php //echo get_page_link(880);?>" method="POST">
                        <div class="row">
                          <div class="MapRoute-form-adresse col-xs-12 col-sm-6">
                            <p>Anfhart</p>
                            <input type="text" id="start" name="start" placeholder="Ort eingeben" required />
                            <input type="hidden" name="end" value="'+ data[i].station_adress + ' ' + data[i].station_city +'" />
                            <input type="hidden" name="city" value="'+ data[i].station_city + '" />
                            <input type="hidden" name="adress" value="'+ data[i].station_adress + '" />
                            <input type="hidden" name="postcode" value="'+ data[i].station_postcode + ' ' + data[i].station_city + '" />
                            <img class="MapRoute-form-arrow " src="<?php //echo get_template_directory_uri();?>/assets/img/arrow.svg" alt="" />
                          </div>
                          <div class="MapRoute-form-station col-xs-12 col-sm-4">
                            <div class="MapRoute-form-station col-xs-12 col-sm-4">' +
                              data[i].title.rendered + '<br/> Spielstation ' + data[i].station_city + '<br/>' +
                              data[i].station_adress + ', ' + data[i].station_postcode + ' ' + data[i].station_city +
                            </div>
                          </div>
                          <div class="MapRoute-form-button col-xs-12 col-sm-2">
                            <input id="submit" type="submit" name="submit" value="Suchen">
                          </div>
                        </div>
                      </form>
                  </div> -->



            <?php  
              $i++;

              endwhile;

          ?>



          <!-- <div class="FinderResult-post">
            
              <div class="FinderResult-post-img" data-id="0">
                <div style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/375x250.png);"></div>
              </div>
              <div class="FinderResult-post-content col-xs-12 col-sm-7">
                <div class="clearfix">
                  <div class="pull-left">
                    <div class="FinderResult-post-title">Mechernich</div>
                    Spielstation Mechernich <br/>
                    Georges-Girard-Ring 23 <br/>
                    53894 Mechemich
                  </div>

                  <div class="FinderResult-mapMarker pull-right">
                    <div class="FinderResult-mapMarker-pin">
                      <img src="<?php echo get_template_directory_uri();?>/assets/img/pin.svg" alt="" />
                      <div class="FinderResult-mapMarker-number">1</div>
                    </div>
                    <div class="FinderResult-mapMarker-distance">300 km</div>
                  </div>
                </div>

                <div class="FinderResult-action">
                  <a class="btn btn--purple" href="">Servicekraft</a>
                  <a class="btn btn--purple" href="">Technik</a>
                  <a class="btn btn--purple" href="">Ausbildung</a>
                  <a class="btn btn--turquoise" href="">Anfahrt</a>
                </div>
              </div>
           
          </div>

          
          <div class="FinderResult-post">
            
              <div class="FinderResult-post-img" data-id="0">
                <div style="background-image: url(<?php echo get_template_directory_uri();?>/assets/img/375x250.png);"></div>
              </div>
              <div class="FinderResult-post-content col-xs-12 col-sm-7">
                <div class="clearfix">
                  <div class="pull-left">
                    <div class="FinderResult-post-title">Mechernich</div>
                    Spielstation Mechernich <br/>
                    Georges-Girard-Ring 23 <br/>
                    53894 Mechemich
                  </div>

                  <div class="FinderResult-mapMarker pull-right">
                    <div class="FinderResult-mapMarker-pin">
                      <img src="<?php echo get_template_directory_uri();?>/assets/img/pin.svg" alt="" />
                      <div class="FinderResult-mapMarker-number">1</div>
                    </div>
                    <div class="FinderResult-mapMarker-distance">300 km</div>
                  </div>
                </div>

                <div class="FinderResult-action">
                  <a class="btn btn--purple" href="">Servicekraft</a>
                  <a class="btn btn--purple" href="">Technik</a>
                  <a class="btn btn--purple" href="">Ausbildung</a>
                  <a class="btn btn--turquoise" href="">Anfahrt</a>
                </div>
              </div>
           
          </div> -->


        </div>
    </section>




<?php
get_footer();

?>


<script type="text/javascript">

  function initMap() {
  // INIT MAP CENTER DEUTSCHLAND
  var map = new google.maps.Map(document.getElementById('js-Map--stations'), {
    zoom: 6,
    center: {lat: 51.165691, lng: 10.451526},
    scrollwheel: false
  });

  // CALL FILE JSON STATIONS
  $.ajax({
    type: "GET",
    dataType: "json",
    cache: false,
    url: "<?php bloginfo('home'); ?>/wp-json/wp/v2/stations?filter[posts_per_page]=-1",
    success: function(data) {

      //********* METHODE COMPTUTE DISTANCE BETWEEN **********************//

      // FOR EACH STATION DISPLAY MARKER
      var markers = [];

      var geocoder = new google.maps.Geocoder();

      var start = "<?php echo $_POST['job_search_plz'];?>";
      var post_code = "<?php echo $_POST['job_search_plz'];?>";
      geocoder.geocode( {'address': start, 'componentRestrictions': {'country' : 'DE' }},  function(results, status) {
        if (status == google.maps.GeocoderStatus.OK)
        {
          var startLat = results[0].geometry.location.lat();
          var startLng = results[0].geometry.location.lng();


          // GET ADRESS FROM SEARCH
          var adress = new google.maps.LatLng(startLat, startLng);

          var map = new google.maps.Map(document.getElementById('js-Map--stations'), {
            zoom: 7,
            center: {lat: startLat, lng: startLng},
            scrollwheel: false
          });


          for (i in data) {
            var Lat = data[i].station_latitude;
            var Lng = data[i].station_longitude;
            var myLatlng = new google.maps.LatLng(Lat,Lng);
            var image = '<?php echo get_template_directory_uri();?>/assets/img/pin-map.svg';

            var marker = new google.maps.Marker({
                position: myLatlng,
                icon: image,
                url: "#"
            });
            marker.setMap(map);

            // SET EACH MARKER IN ARRAY
            markers.push(marker);


            // DISPLAY MARKER ON MAP WITH RADIUS 50 KM
            for (var j=0; j<markers.length;j++) {
              var radius = 50000 // DISTANCE IN METRES
              var distance_from_location = google.maps.geometry.spherical.computeDistanceBetween(markers[j].getPosition(), adress);
              if (distance_from_location < radius) {
                markers[j].setMap(map);
              } else {
                markers[j].setMap(null);
              }
            }

            // ADD LINK TO EACH MARKER
            google.maps.event.addListener(marker, 'click', function() {
                console.log("go");
                window.location.href = this.url;
            });  

          }



          // DISPLAY STATIONS IN RADIUS
          function afficherDetailsStations () {

            var result = "";
            for (var i in data) {
              var Lat = data[i].station_latitude;
              var Lng = data[i].station_longitude;
              var myLatlng = new google.maps.LatLng(Lat,Lng);
              var adress = new google.maps.LatLng(startLat, startLng);

              var radius = 50000 // DISTANCE METRES
              var distance_from_location = google.maps.geometry.spherical.computeDistanceBetween(myLatlng, adress);
              if (distance_from_location < radius) {


                var service = new google.maps.DistanceMatrixService();
                var city = data[i].station_city;


                // CALCUL DISTANCE BETWEEN STATIONS AND CITY
                service.getDistanceMatrix({
                    origins: ["<?php echo $_POST['job_search_plz'];?>"],
                    destinations: [city],
                    travelMode: google.maps.TravelMode.DRIVING,
                    unitSystem: google.maps.UnitSystem.METRIC,
                    avoidHighways: false,
                    avoidTolls: false
                }, function (response, status) {
                    if (status == google.maps.DistanceMatrixStatus.OK) {
                        distanceCity = response.rows[0].elements[0].distance.value;
                        console.log("lorem : "+ distanceCity);
                    } else {
                        alert('Error was: ' + status);
                    }
                });



                var distance = Math.round(distance_from_location / 1000);
                result +=
                  '<div class="FinderResult-post">' +
                    '<div class="row">' +
                    '<img class="img-responsive col-xs-12 col-sm-5" src="' + data[i].station_image + '" alt="">'+
                      // '<img class="img-responsive col-xs-12 col-sm-5" src="<?php echo get_template_directory_uri();?>/assets/img/375x280.png" alt="">'+
                      '<div class="FinderResult-post-content col-xs-12 col-sm-7">'+
                        '<div class="clearfix">' +
                          '<div class="pull-left">' +
                            '<div class="FinderResult-post-title">'+ data[i].title.rendered +'</div>'+
                            '<p> Spielstation ' + data[i].station_city + '<br/>' + data[i].station_adress + '<br/>' + data[i].station_postcode + ' ' + data[i].station_city +'</p>' +
                            '<p> Eröffnungszeiten : <br/> Lun-Ven : 9am - 12am <br/> Sat : 9am - 2am </p>' +
                          '</div>' +
                          '<div class="FinderResult-mapMarker pull-right">' +
                            '<div class="FinderResult-mapMarker-pin">' +
                              '<img src="<?php echo get_template_directory_uri();?>/assets/img/pin.svg" alt="" />' +
                            '</div>' +
                            '<div class="FinderResult-mapMarker-distance">' + distance +' km</div>' +
                          '</div>' +
                        '</div>' +
                        '<div class="FinderResult-action FinderResult-action--right">' +
                          '<a class="js-ApplyBox btn btn--turquoise" >Anfahrt</a>' +
                        '</div>' +
                      '</div>' +
                    '</div>' +
                    '<div class="MapRoute-form clearfix">' +
                      '<form action="<?php echo get_page_link(880);?>" method="POST">' +
                        '<div class="row">' +
                          '<div class="MapRoute-form-adresse col-xs-12 col-sm-6">' +
                            '<p>Abfhart</p>' +
                            '<input type="text" id="start" name="start" placeholder="Ort eingeben" required />' +
                            '<input type="hidden" name="end" value="'+ data[i].station_adress + ' ' + data[i].station_city +'" />' +
                            '<input type="hidden" name="city" value="'+ data[i].station_city + '" />' +
                            '<input type="hidden" name="adress" value="'+ data[i].station_adress + '" />' +
                            '<input type="hidden" name="postcode" value="'+ data[i].station_postcode + ' ' + data[i].station_city + '" />' +
                            '<img class="MapRoute-form-arrow " src="<?php echo get_template_directory_uri();?>/assets/img/arrow.svg" alt="" />' +
                          '</div>'+
                          '<div class="MapRoute-form-station col-xs-12 col-sm-4">' +
                            data[i].title.rendered + '<br/>' +
                            'Spielstation ' + data[i].station_city + '<br/>' +
                            data[i].station_adress + ', ' + data[i].station_postcode + ' ' + data[i].station_city +
                          '</div>' +
                          '<div class="MapRoute-form-button col-xs-12 col-sm-2">' +
                            '<input id="submit" type="submit" name="submit" value="Suchen">' +
                          '</div>' +
                        '</div>' +
                      '</form>' +
                    '</div>' +
                  '</div>';

              }
            }
            //return result;
          }

          var stationsDetails = afficherDetailsStations ();


          document.getElementById("js-finder").innerHTML = '<div class="FinderResult-title"> Spielstationen werden hier angezeigt</div><div class="FinderResult-subtitle">Die angegebenen Entfernungen entsprechen der Luftlinie berechnet, in einem Umkreis von 50 km von dem gesuchten Ort beginnend.</div>' + stationsDetails ;


          // SHOW - HIDE FORM ROUTE
          $('.js-ApplyBox').on('click', function() {
           $parentBox = $(this).closest('.FinderResult-post');
           $parentBox.siblings().find('.MapRoute-form').slideUp();
           $parentBox.find('.MapRoute-form').slideToggle();
          })

        }
      });
    }
  });
}

</script>
<script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAGhZ8ADdTHqSzZrZt7h_BSzcJZFCFfpdU&libraries=geometry&signed_in=true&callback=initMap&language=fr"></script>





















