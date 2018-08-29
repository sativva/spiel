<?php
/**
 * The template for displaying route.
 *
 *
 *
 * @package spiestation
 */
/*
Template Name: Route
*/
get_header(); ?>

<div id ="js-Map" class="Map"></div>

    <div class="SearchForm SearchForm--yellow">
      <form action="<?php echo get_page_link(871); ?>" method="POST">
        <input type="text" name="start" value="<?php if (isset($address_search)){ echo $address_search; }?>" placeholder="Stadt oder PLZ eingeben" required>
        <input type="submit" value="Suchen">
      </form>
    </div>

    <section class="Route">
      <div class="Container--small">


        <div class="row">
          <div class="Route-title col-xs-12 clearfix">
            Fahrplan
            <div class="Route-return pull-right">
              <?php
                $url = htmlspecialchars($_SERVER['HTTP_REFERER']);
              ?>
              <a class="btn btn--turquoise" href="<?php echo $url; ?>">Zurück</a>
            </div>
          </div>
        </div>

        <div class="Route-infos col-xs-12">
          <div id="js-Route-duration" class="Route-infos-details"></div>
          <div id="js-Route-distance" class="Route-infos-details"></div>
        </div>

        <div class="Route-result col-xs-12">
          <div class="Route-result-title">
            <div class="Route-result-title--bold"><?php echo $_POST['city'];?></div>
            SPIELSTATION<br/>
            <?php echo $_POST['adress'];?>
            <?php echo $_POST['postcode'];?><br/>
          </div>

          <div class="Route-result-startAdresse">
            Abfahrt : <?php echo $_POST['start'];?>

            <div class="Route-result--right">
              <!-- <a class="Route-result-action" href="#">
                <img src="<?php // echo get_template_directory_uri();?>/assets/img/route/target.svg" alt="" />
                Export GPS
              </a> -->
              <a class="Route-result-action" href="javascript:window.print()">
                <img src="<?php echo get_template_directory_uri();?>/assets/img/route/printer.svg" alt="" />
                Drucken
              </a>
            </div>

          </div>

          <div id="js-Route" class="Route-result-route"></div>
        </div>

      </div>

    </section>


    <script>
      function initMap() {
        
        var directionsService = new google.maps.DirectionsService;

        var directionsDisplay = new google.maps.DirectionsRenderer;


        var map = new google.maps.Map(document.getElementById('js-Map'), {
          zoom: 7,
          center: {lat: 51.165691, lng: 10.451526},
          scrollwheel: false
        });

        var control = document.getElementById('floating-panel');


        var onChangeHandler = function() {
          calculateAndDisplayRoute(directionsService, directionsDisplay);
        };
        window.addEventListener('load', onChangeHandler);
      }

      function calculateAndDisplayRoute(directionsService, directionsDisplay) {
        var start = "<?php echo $_POST['start'];?>";
        var end = "<?php echo $_POST['end'];?>";
        directionsService.route({
          origin: start,
          destination: end,
          avoidTolls: true,
          travelMode: google.maps.TravelMode.DRIVING
        }, function(response, status) {
          if (status === google.maps.DirectionsStatus.OK) {
            directionsDisplay.setDirections(response);


            var distance = response.routes[0].legs[0].distance.text;
            var duration = response.routes[0].legs[0].duration.text;
            var latitude = response.routes[0].legs[0].end_location.lat();
            var longitude = response.routes[0].legs[0].end_location.lng();

            var map = new google.maps.Map(document.getElementById('js-Map'), {
              zoom: 7,
              center: {lat: latitude, lng: longitude},
              scrollwheel: false
            });

            var myLatlng = new google.maps.LatLng(latitude,longitude);
            var image = '<?php echo get_template_directory_uri();?>/assets/img/pin-map.svg';
            var marker = new google.maps.Marker({
                position: myLatlng,
                icon: image
            });
            marker.setMap(map);


            var steps = response.routes[0].legs[0].steps;

            function afficherRoute(steps) {
              var result = "";
              for (var i in steps) {
                result += '<div class="Route-steps">' +
                            '<div class="row">' +
                              '<div class="col-xs-12 col-sm-8">'+
                                '<div class="col-xs-2 col-sm-1 Route-icon Route-icon--'+ steps[i].maneuver +'"></div>' +
                                '<div class="col-xs-10 col-sm-11">' + steps[i].instructions + '</div>' +
                              '</div>'+
                              '<div class="Route-steps--right col-xs-12 col-sm-2">' + steps[i].duration.text + '</div>' +
                              '<div class="Route-steps--right col-xs-12 col-sm-2">' + steps[i].distance.text + '</div>' +
                            '</div>' +
                          '</div>' ;

              }
              return result;
            }

            var stepsDetails = afficherRoute(steps);

            document.getElementById("js-Route-duration").innerHTML =  '<span class="Route-infos-title"> Dauer : </span>' + duration;
            document.getElementById("js-Route-distance").innerHTML =  '<span class="Route-infos-title"> Entfernung : </span>' + distance;
            document.getElementById("js-Route").innerHTML = stepsDetails ;

            console.log();
          } else {

            window.alert('Directions request failed due to ' + status);
          }
        });
      }

    </script>
    <script type="text/javascript" src="https://maps.googleapis.com/maps/api/js?region=de&key=AIzaSyAGhZ8ADdTHqSzZrZt7h_BSzcJZFCFfpdU&libraries=geometry&signed_in=true&callback=initMap"></script>

<?php
get_footer();
