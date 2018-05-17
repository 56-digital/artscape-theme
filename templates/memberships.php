<?php /* Template Name: Memberships */
get_header();
?>

<section sm='pt2 pb1' class='c12 py4'>
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

<section sm='border0 py1' class='c12 py3 b1lg'>
  <h2 sm='mb3' class='c12 px2 pt1 ttu tac'>What's included in a full-access membership</h2>
  <div sm='px0' class='mw70 mxa x xw xjc px2'>
    <?php
      $args = array(
        'post_type' => 'memberships',
        'posts_per_page' => -1,
      );
      $q = new WP_Query($args);

      if ($q->have_posts()) : while ($q->have_posts()) : $q->the_post(); ?>
        <div sm='c12 px1 pt0 pb1' class='c6 px2 py2'>
            <?php 
              $intro = get_field('intro');
              $title = $intro['title']; 
              $t = $title ? $title : get_the_title();
              $desc = $intro['short_description'] ? $intro['short_description'] : '';
              $url = get_the_permalink();
            ?>
          <a sm='px1' href='<?php echo $url; ?>' class='rounded tac dib bgc-g px2 py2'>
            <h3 class='c12 ttu'><?php echo $t; ?></h3>
            <div class='c12 mb2 fsC'><?php echo $desc; ?></div>
            <div class='c12'>
              <div class='btn dib ttu'>Read More</div>
            </div>
          </a>
        </div>
<?php
      endwhile; endif;
      wp_reset_query();
    ?>
  </div>
</section>

<section sm='pt3 pb0' class='c12 pt4 pb0'>
  <h2 class='c12 px2 tac ttu'>Membership Types</h2>
  <div class='c12 mw70 mxa c-w px1 py1'>
  <?php
    if (have_rows('membership_types')) : while (have_rows('membership_types')) : the_row();
      $mem_title = get_sub_field('title');
      $mem_price = get_sub_field('price'); 
      $mem_btn_title = get_sub_field('button_title'); 
      $mem_btn_url = get_sub_field('button_url'); 
      $mem_text = get_sub_field('text'); 
  ?>
        <section sm='px mb1' class='c12 bgc-b px2 py2 x xw mb2 rounded'>
          <div sm='c12 mb2' class='c6'>
            <h3 class='mb0'><?php echo $mem_title; ?></h3>
            <div class='c12 mb1 fsB'>
              <span><?php echo $mem_price; ?></span><span class='dib subscript'>billed annually</span>
            </div>
            
            <div class='c12 '>
              <a class='btn btn-large btn-light dib' href='<?php echo $mem_btn_url; ?>'><?php echo $mem_btn_title ?></a> 
            </div>
          </div> 
  
          <div sm='c12' class='c6'><?php echo $mem_text; ?></div>
        </section>
  <?php endwhile; endif; ?> 
  </div>
</section>

<section sm='pt0 px1' class='c12 pt1 pb4 px2'>
  <div sm='py1' class='py4 tac'>
    <?php 
      $mem_card = get_field('membership_rate_card');
      $mem_card_title = $mem_card['button_title'];
      $mem_card_file = $mem_card['button_file'] ? $mem_card['button_file'] : $mem_card['button_url'];
    ?>
    <a class='btn btn-dark btn-large dib' href='<?php echo $mem_card_file; ?>'><?php echo $mem_card_title; ?></a>
  </div>
</section>


<section sm='py2 bb1lg' class='c12 tac bgc-g py4 bb1lg'>
  <?php 
    $text_booking = get_field('booking_grey_block');
    $booking_title = $text_booking['text'];
    $booking_btn1_title = $text_booking['button_1_title'];
    $booking_btn1_url = $text_booking['button_1_url']; 
    $booking_btn2_title = $text_booking['button_2_title'];
    $booking_btn2_url = $text_booking['button_2_url']; 
  ?>
  <div class='mw50 mxa px2'>
    <h2 class='c12 mb2 pt2 mb0'><?php echo $booking_title; ?></h2>
    <div class='c12 db pb2'>
      <a class='btn dib' href='<?php echo $booking_btn1_url; ?>'><?php echo $booking_btn1_title; ?></a> 
      <a class='btn dib' href='<?php echo $booking_btn2_url; ?>'><?php echo $booking_btn2_title; ?></a> 
    </div>
  </div>
</section>

<section class='c12 bb1lg'>
  <?php 
    $textL = get_field('text_block_left');

    $textL_title = $textL['title'];
    $textL_text = $textL['text'];
    $textL_btn_title = $textL['button_title'];
    $textL_btn_url = $textL['button_url'];

    $textR = get_field('text_block_right');

    $textR_title = $textR['title'];
    $textR_text = $textR['text'];
    $textR_btn_title = $textR['button_title'];
    $textR_btn_url = $textR['button_url'];
    
  ?>
  <div class='c12 x xw xjc tac'>
    <div sm='c12 px1 py3 bb1lg' class='c6 px4 py3 br1lg'>
      <h2 class='c12 tac'><?php echo $textL_title; ?></h2> 
      <div class='c12 mb1'><?php echo $textL_text; ?></div>
      <div class='c12 tac'>
        <a class='btn' href='<?php echo $textL_btn_url; ?>'><?php echo $textL_btn_title; ?></a>
      </div>
    </div>

    <div sm='c12 px1 py3' class='c6 px4 py3'>
      <h2 class='c12 tac'><?php echo $textR_title; ?></h2> 
      <div class='c12 mb1'><?php echo $textR_text; ?></div>
      <div class='c12 tac'>
        <a class='btn' href='<?php echo $textR_btn_url; ?>'><?php echo $textR_btn_title; ?></a>
      </div>
    </div>
  </div> 
</section>


<section class='c12'>
  <?php
    $how = get_field('how_it_works');
    $how_title = $how['title'];
    $how_text = $how['text'];
    $how_steps = $how['steps'];
  ?>
  <div class='c12 mxa mw70'>
    <section sm='pt3 pb2' class='tac px1 pt4 pb0 mw30 mxa'>
      <h3 class='c12 tac'><?php echo $how_title; ?></h3>
      <div class='c12'><?php echo $how_text; ?></div>
    </section>
    
    <section sm='px0' class='steps psr c12 px4 py2 x xw'>
      <?php 
        foreach($how_steps as $how_step) { ?>
        <div sm='c12 pt0 pb3' class='step px4 py4 c6'>
          <div class='rounded b1lg px2 py2'>
            <span class='db fsC step-title'>STEP</span>
            <h3><?php echo $how_step['step_title']; ?></h3>
            <div class='fsC'><?php echo $how_step['step_text']; ?></div>
          </div>
        </div> 
      <?php } ?>    
    </section>
  </div>
</section>

<section sm='py3 bb1lg' class='c12 tac bgc-g py4'>
  <?php 
    $text_grey = get_field('text_centered_grey');
    $grey_title = $text_grey['title'];
    $grey_text = $text_grey['text'];
    $grey_btn_title = $text_grey['button_title'];
    $grey_btn_url = $text_grey['button_url']; 
  ?>
  <div>
      <h2 class='c12 mb0'><?php echo $grey_title; ?></h2>
      <div sm='py1 px2 mb1' class='mw50 mxa px4 py2'><?php echo $grey_text; ?></div> 
      <div class='c12 db'>
        <a class='btn dib' href='<?php echo $grey_btn_url; ?>'><?php echo $grey_btn_title; ?></a> 
      </div>
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
