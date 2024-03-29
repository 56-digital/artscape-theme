<?php 
function create_post_type() {
  register_post_type( 'news',
    array(
      'labels' => array(
        'name' => __( 'News' ),
        'singular_name' => __( 'News Post' )
      ),
      'public' => true,
      'has_archive' => false,
      'taxonomies' => array('tags', 'category')
    )
  );

  register_post_type( 'media-labs',
    array(
      'labels' => array(
        'name' => __( 'Digital Media Labs' ),
        'singular_name' => __( 'Digital Media Lab' )
      ),
      'public' => true,
      'has_archive' => false,
      'taxonomies' => array('tags', 'category')
    )
  );

  register_post_type( 'events',
    array(
      'labels' => array(
        'name' => __( 'Events' ),
        'singular_name' => __( 'Event' )
      ),
      'public' => true,
      'has_archive' => false,
      'taxonomies' => array('tags', 'category')
    )
  );

  register_post_type( 'spaces',
    array(
      'labels' => array(
        'name' => __( 'Spaces' ),
        'singular_name' => __( 'Space' )
      ),
      'public' => true,
      'has_archive' => false,
      'taxonomies' => array('tags', 'category')
    )
  );

  register_post_type( 'memberships',
    array(
      'labels' => array(
        'name' => __( 'Memberships' ),
        'singular_name' => __( 'Membership' )
      ),
      'public' => true,
      'has_archive' => false,
      'taxonomies' => array('tags', 'category')
    )
  );

  register_post_type( 'programs',
    array(
      'labels' => array(
        'name' => __( 'Programs' ),
        'singular_name' => __( 'Program' )
      ),
      'public' => true,
      'has_archive' => false,
      'taxonomies' => array('tags', 'category')
    )
  );

  register_post_type( 'community',
    array(
      'labels' => array(
        'name' => __( 'Community Posts' ),
        'singular_name' => __( 'Community Post' )
      ),
      'public' => true,
      'has_archive' => false,
      'taxonomies' => array('tags', 'category')
    )
  );
}
add_action( 'init', 'create_post_type' );


register_nav_menus( array(
  'menu-1' => esc_html__( 'Primary' ),
) );

function my_login_logo() { ?>
    <style type="text/css">
    #login h1 a, .login h1 a {
        background-image: url(<?php echo get_stylesheet_directory_uri(); ?>/assets/logo.png);
    height:140px;
    width:320px;
    background-size: contain;
    background-position: center center;
    background-repeat: no-repeat;
          padding-bottom: 30px;
        }
    </style>
<?php }
add_action( 'login_enqueue_scripts', 'my_login_logo' );
?>
