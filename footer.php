</article>
</main>

<aside class='c12 asfe'>
  <footer class='c12 x xw xac xjb bt1lg'>
    <section sm='c12 xo3' class='c4 tac footer-logo br1lg'>
      <div class='logo mb1 dib tac'>
        <a class='dib' href='<?php echo get_bloginfo('url');?>'><img class='c12' src='<?php echo get_template_directory_uri(); ?>/assets/logo.png' alt='Artscape Daniels Launchpad'></a>
      </div>
      <div class='c12 tac ttu footer-text'>
        Artscape Daniels Launchpad All Rights Reserved
      </div>
    </section>

    <section sm='c12 xo1' class='c4 br1lg'>
      <nav class='x xw xac h100 xjb c12'>
        <?php 
          $mainNav = wp_get_nav_menu_items('footer'); 

          foreach ($mainNav as $navItem) {
            echo '<div class="footer-nav-item"><a href="' . $navItem->url . '">' . $navItem->title . '</a></div>';
          }
        ?>
      </nav>
    </section>

    <section sm='c12 xo2' class='c4 nl h100'>
      <div class='c12 ttu x xw xjb xac'>
        <label class='c12' for='submit'>Enter your email for updates</label>
        <input class='xg c9 vam' type='email' />
        <button type='submit' class='c3 vam ttu h100'>Submit</button>
      </div>
    </section>
  </footer>
</aside>

</div>

<?php wp_footer(); ?>

<script defer src='<?php echo get_bloginfo('template_url'); ?>/dist/bundle.js'></script>

<?php
  if (is_page_template('templates/about.php')) : ?>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBKd10xCE-LiZwYLc238rIOXYz4sXjM32w&callback=initMap" async defer></script>

<script> 
function initMap () {
  var pos = {lat: 43.643291, lng: -79.372381}

  map = new google.maps.Map(document.getElementById('map'), {
    center: pos,
    zoom: 12,
    styles: [
          {
              "featureType": "water",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#e9e9e9"
                  },
                  {
                      "lightness": 17
                  }
              ]
          },
          {
              "featureType": "landscape",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#f5f5f5"
                  },
                  {
                      "lightness": 20
                  }
              ]
          },
          {
              "featureType": "road.highway",
              "elementType": "geometry.fill",
              "stylers": [
                  {
                      "color": "#ffffff"
                  },
                  {
                      "lightness": 17
                  }
              ]
          },
          {
              "featureType": "road.highway",
              "elementType": "geometry.stroke",
              "stylers": [
                  {
                      "color": "#ffffff"
                  },
                  {
                      "lightness": 29
                  },
                  {
                      "weight": 0.2
                  }
              ]
          },
          {
              "featureType": "road.arterial",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#ffffff"
                  },
                  {
                      "lightness": 18
                  }
              ]
          },
          {
              "featureType": "road.local",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#ffffff"
                  },
                  {
                      "lightness": 16
                  }
              ]
          },
          {
              "featureType": "poi",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#f5f5f5"
                  },
                  {
                      "lightness": 21
                  }
              ]
          },
          {
              "featureType": "poi.park",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#dedede"
                  },
                  {
                      "lightness": 21
                  }
              ]
          },
          {
              "elementType": "labels.text.stroke",
              "stylers": [
                  {
                      "visibility": "on"
                  },
                  {
                      "color": "#ffffff"
                  },
                  {
                      "lightness": 16
                  }
              ]
          },
          {
              "elementType": "labels.text.fill",
              "stylers": [
                  {
                      "saturation": 36
                  },
                  {
                      "color": "#333333"
                  },
                  {
                      "lightness": 40
                  }
              ]
          },
          {
              "elementType": "labels.icon",
              "stylers": [
                  {
                      "visibility": "off"
                  }
              ]
          },
          {
              "featureType": "transit",
              "elementType": "geometry",
              "stylers": [
                  {
                      "color": "#f2f2f2"
                  },
                  {
                      "lightness": 19
                  }
              ]
          },
          {
              "featureType": "administrative",
              "elementType": "geometry.fill",
              "stylers": [
                  {
                      "color": "#fefefe"
                  },
                  {
                      "lightness": 20
                  }
              ]
          },
          {
              "featureType": "administrative",
              "elementType": "geometry.stroke",
              "stylers": [
                  {
                      "color": "#fefefe"
                  },
                  {
                      "lightness": 17
                  },
                  {
                      "weight": 1.2
                  }
              ]
          }
      ] 
  })
  
  var marker = new google.maps.Marker({
    position: pos,
    map: map
  })
} 
</script>
<?php endif ?>
</body>
</html>
