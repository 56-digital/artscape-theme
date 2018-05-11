<?php 
get_header(); 
$s = get_search_query();
$args = array(
  's' => $s,
  'posts_per_page' => -1,
  'post_type' => array('news', 'media-labs', 'events', 'spaces', 'memberships', 'programs', 'community')
);
?>

<section class='c12 py4  '>
  <?php 
  ?>

  <div class='c12 tac '>
    <div class='mxa mw50 px2'>
      <h1 class='fsB mb0'>Searching for: '<?php echo get_query_var('s'); ?>'</h1>  
    </div>
  </div>
</section>

<section class='c12 px4 pb4'>
  <div class='c12 x xw xjc'>
    <?php
      $qq = new WP_Query($args);
      
      if ($qq->have_posts() ) : while ($qq->have_posts() ) : $qq->the_post();
        get_template_part('components/feed-post'); 
      endwhile;
      else : 
?>
      <div class='c12 fsA px2 tac'>
        No posts found
      </div>
<?php
      endif;

      wp_reset_query();
    ?>  
  </div>
</section>

<?php get_footer(); ?>
