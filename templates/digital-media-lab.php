<?php /* Template Name: Digital Media Lab */
get_header();
?>

<section sm='py2' class='c12 py4 bb1lg'>
  <?php 
    $intro = get_field('intro');
    $intro_title = $intro['title'];
    $intro_text = $intro['text'];    
  ?>

  <div class='c12 tac pb1'>
    <div class='mxa mw50 px2'>
      <h1><?php echo $intro_title; ?></h1>  
      <div sm='fsC' class='c12 fsB'>
        <?php echo $intro_text; ?>
      </div>
    </div>
  </div>
</section>

<section sm='px1 py2' class='py4 px4 bb1lg'>
  <h3 sm='mb0' class='c12 mb1 tac'>OUR DIGITAL LAB SPACES</h3>
  <div class='c12 mxa x xw xjc'>
    <?php 
      $args = array(
        'post_type' => 'media-labs',
        'posts_per_page' => -1 
      );

      $newsQuery = new WP_Query($args);
      
      if ($newsQuery->have_posts() ) : while ($newsQuery->have_posts() ) : $newsQuery->the_post();
        get_template_part('components/feed-post'); 
      endwhile; endif;

      wp_reset_query();
    ?>
  </div> 
</section>

<?php 
  if (get_field('footer_left')) {
    get_template_part('components/footer');
  }
?>

<?php get_footer(); ?>
