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
  <h3 sm='mb0' class='c12 mb1 tac'>OUR PROGRAMS</h3>
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

<section class='footer-linx tac x xac xw'>
  <?php
    $footer_left = get_field('footer_left');
    $fl_title = $footer_left['title'];
    $fl_btn_title = $footer_left['button_title'];
    $fl_btn_url = $footer_left['button_url'];

    $footer_right = get_field('footer_right');
    $fr_title = $footer_right['title'];
    $fr_btn_title = $footer_right['button_title'];
    $fr_btn_url = $footer_right['button_url'];
    
  ?> 
  <div sm='c12' class='c6 h100 br1lg'>
    <a sm='px2 py0 bb1lg' class='py4 px4 db h100 c12' href='<?php echo $fl_btn_url; ?>'>
      <h2 sm='mb2 lh1' class='fsA mb3 px2 pt4'><?php echo $fl_title; ?></h2>
      <div class='c12 pb4'>
        <div class='btn dib'><?php echo $fl_btn_title; ?></div> 
      </div>
    </a>
  </div> 

  <div sm='c12' class='c6 h100'>
    <a sm='px2 py0' class='py4 px4 db c12 h100' href='<?php echo $fr_btn_url; ?>'>
      <h2 sm='mb2 lh1' class='fsA mb3 px2 pt4'><?php echo $fr_title; ?></h2>
      <div class='c12 pb4'>
        <div class='btn dib'><?php echo $fr_btn_title; ?></div> 
      </div>
    </a>
  </div> 
</section>


<?php get_footer(); ?>
