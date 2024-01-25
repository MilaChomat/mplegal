<?php



/*



Template Name: Kontakt



*/



?>



<?php get_header(); ?>

<?php $id = get_the_ID(); ?>

<main id="up">

    <section class="contact">

        <div id="map">

        </div>
        
        <script>
            if(jQuery(window).width() > 977) {
                var targetZoom = 14;
                var latPos = 50.073075;
                var lngPos = 14.403768;
            } else if(jQuery(window).width() > 767) {
                var targetZoom = 13;
                var latPos = 50.073075;
                var lngPos = 14.403768;
            } else {
                var targetZoom = 14;
                var latPos = 50.086493;
                var lngPos = 14.430709;
            }
//            if(jQuery(window).width() > 977) {
//                var targetZoom = 14;
//                var latPos = 50.088769;
//                var lngPos = 14.383768;
//            } else if(jQuery(window).width() > 767) {
//                var targetZoom = 13;
//                var latPos = 50.088769;
//                var lngPos = 14.383768;
//            } else {
//                var targetZoom = 14;
//                var latPos = 50.100769;
//                var lngPos = 14.417709;
//            }
              var map;
              var marker;
              var styleArray = [{"featureType":"water","elementType":"geometry","stylers":[{"color":"#e9e9e9"},{"lightness":17}]},{"featureType":"landscape", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 20}]}, {"featureType": "road.highway", "elementType": "geometry.fill", "stylers": [{"color": "#ffffff"}, {"lightness": 17}]}, {"featureType": "road.highway", "elementType": "geometry.stroke", "stylers": [{"color": "#ffffff"}, {"lightness": 29}, {"weight": 0.2}]}, {"featureType": "road.arterial", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 18}]}, {"featureType": "road.local", "elementType": "geometry", "stylers": [{"color": "#ffffff"}, {"lightness": 16}]}, {"featureType": "poi", "elementType": "geometry", "stylers": [{"color": "#f5f5f5"}, {"lightness": 21}]}, {"featureType": "poi.park", "elementType": "geometry", "stylers": [{"color": "#dedede"}, {"lightness": 21}]}, {"elementType": "labels.text.stroke", "stylers": [{"visibility": "on"}, {"color": "#ffffff"}, {"lightness": 16}]}, {"elementType": "labels.text.fill", "stylers": [{"saturation": 36}, {"color": "#333333"}, {"lightness": 40}]}, {"elementType": "labels.icon", "stylers": [{"visibility": "off"}]}, {"featureType": "transit", "elementType": "geometry", "stylers": [{"color": "#f2f2f2"}, {"lightness": 19}]}, {"featureType": "administrative", "elementType": "geometry.fill", "stylers": [{"color": "#fefefe"}, {"lightness": 20}]}, {"featureType": "administrative", "elementType": "geometry.stroke", "stylers": [{"color": "#fefefe"}, {"lightness": 17}, {"weight": 1.2}]}];
            function initMap() {
                map = new google.maps.Map(document.getElementById('map'), {
                    center: {lat: latPos, lng: lngPos},
                    styles: styleArray,
                    zoom: targetZoom,
                    disableDefaultUI: true
                });
                marker = new google.maps.Marker({
                    map: map,
                    position: new google.maps.LatLng(50.075528, 14.434874),
                    icon: '<?php echo get_template_directory_uri(); ?>/data/images/marker.png'
                });
            }


        </script>
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyClkwSIfiALSPWllgxbfHwIr41wTb3VBuc&callback=initMap"
        async defer></script>

        <div class="container">
            <div class="contact-content">
                <h2 class="title">
                    <?php echo get_the_title(); ?>
                </h2>
                <ul>
                    <?php if (get_post_meta($id, 'phone', true) && strlen(get_post_meta($id, 'phone', true)) > 1): ?>  
                        <?php $phone = get_post_meta($id, 'phone', true); ?>
                        <li class="phone">
                            <a href="tel:<?php echo preg_replace('/\s+/', '', $phone); ?>"><?php echo $phone; ?></a>
                        </li>
                    <?php endif; ?>
                        
                    <?php if (get_post_meta($id, 'fax', true) && strlen(get_post_meta($id, 'fax', true)) > 1): ?>                          
                        <li class="fax">
                            <?php echo get_post_meta($id, 'fax', true); ?>
                        </li>
                    <?php endif; ?>
                        
                    <?php if (get_post_meta($id, 'email', true) && strlen(get_post_meta($id, 'email', true)) > 1): ?>       
                        <?php $email = get_post_meta($id, 'email', true); ?>
                        <li class="email">
                            <a href='mailto:<?php echo $email; ?>'><?php echo $email; ?></a>
                        </li>
                    <?php endif; ?>
                        
                    <?php if (get_post_meta($id, 'address', true) && strlen(get_post_meta($id, 'address', true)) > 1): ?>                               
                        <li class="place">
                            <?php echo nl2br(get_post_meta($id, 'address', true)); ?>
                        </li>
                    <?php endif; ?>                    
                </ul>
            </div>
        </div>

    </section>

</main>

<?php get_footer(); ?>