<?php /* Template Name: Events */
get_header();
?>


<section class='c12 py4 '>
  <?php 
    $intro = get_field('intro');
    $intro_title = $intro['title'];
    $intro_text = $intro['text'];    
  ?>

  <div class='c12 tac pb1'>
    <div class='mxa mw50 px2'>
      <h1><?php echo $intro_title; ?></h1>  
      <div class='c12 fsB'>
        <?php echo $intro_text; ?>
      </div>
    </div>
  </div>
</section>

<section class='c12 pb2 px2 '>
  <?php 
    $round = get_field('rounded_text_block');
    $r_title = $round['title'];
    $r_text = $round['text'];

  ?>
  <div class='x xw xac xjc mb1 mw70 mxa '>
    <div class='c6 px2 py2 rounded b1lg'>
      <h3 class='c12 tac mb2'><?php echo $r_title; ?></h3> 
      <div class='c12'>
        <?php echo $r_text; ?>
      </div>
     </div>
    </div>
  </div>
</section>

<section class='c12 mb2'>
  <div class='c12 mxa mw70 px2 py4'>
    <div class='x xw bb1b'>
      <h3 class='c3'>TITLE</h3>
      <h3 class='c3'>DATE</h3>
      <h3 class='c3'>LOCATION</h3>
      <h3 class='c3'>TICKETS</h3>
    </div> 
    <?php 
      $args = array(
        'post_type' => 'events',
        'posts_per_page' => -1 
      );

      $newsQuery = new WP_Query($args);
      
      if ($newsQuery->have_posts() ) : while ($newsQuery->have_posts() ) : $newsQuery->the_post(); 
        $title = get_the_title();
        $date = get_field('date');
        $loc_name = get_field('location_name');
        $btn_text = get_field('button_text');
        $btn_url = get_field('button_url');
        $cur_url = get_the_permalink();
?>
        <div class='x xw bb1lg py1 fsC xac'>
          <div class='c3 mb0 pr1'><?php echo $title; ?></div>
          <div class='c3 mb0 pr1'><?php echo $date; ?></div>
          <div class='c3 mb0 pr1'><?php echo $loc_name; ?></div>
          <div class='c3 mb0'>
            <a class='btn dib mr1' href='<?php echo $btn_url; ?>'><?php echo $btn_text; ?></a> 
            <a class='btn dib' href='<?php echo $cur_url; ?>'>MORE INFO</a> 
            
          </div>
        </div> 
<?php
      endwhile; endif;

      wp_reset_query();
    ?>
    
  </div>
</section>

<section class='footer-linx tac x xac xw bt1lg'>
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
  <div class='c6 h100 br1lg'>
    <a class='py4 px2 db h100 c12' href='<?php echo $fl_btn_url; ?>'>
      <h2 class='fsA mb3 px2 pt4'><?php echo $fl_title; ?></h2>
      <div class='c12 pb4'>
        <div class='btn dib'><?php echo $fl_btn_title; ?></div> 
      </div>
    </a>
  </div> 

  <div class='c6 h100'>
    <a class='py4 px2 db c12 h100' href='<?php echo $fr_btn_url; ?>'>
      <h2 class='fsA mb3 px2 pt4'><?php echo $fr_title; ?></h2>
      <div class='c12 pb4'>
        <div class='btn dib'><?php echo $fr_btn_title; ?></div> 
      </div>
    </a>
  </div> 
</section>
<?php get_footer(); ?>
