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
  <h2 sm='mb3' class='c12 px2 pt1 ttu tac'><?php echo get_field('links_title');?> </h2>
  <div sm='px0' class='mw70 mxa x xw xjc px2'>
    <?php
      if (have_rows('links')) : while (have_rows('links')) : the_row(); ?>
        <div sm='c12 px1 pt0 pb1' class='c6 px2 py2'>
            <?php 
              $title = get_sub_field('title');
              $desc = get_sub_field('text');
              $btn = get_sub_field('button');
              $btn_title = $btn['title'] ? $btn['title'] : $btn['url'];
              $btn_url = $btn['url'];
              $btn_target = $btn['target'] ? $btn['target'] : '_self';
 
            ?>
          <a sm='px1' href='<?php echo $btn_url; ?>' target='<?php echo $btn_target; ?>' class='rounded tac dib bgc-g px2 py2'>
            <h3 class='c12 ttu'><?php echo $title; ?></h3>
            <div class='c12 mb2 fsC'><?php echo $desc; ?></div>
            <div class='c12'>
              <div class='btn dib ttu'>Read More</div>
            </div>
          </a>
        </div>
<?php
      endwhile; endif;
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

      $btn1 = get_sub_field('button_1');
      if ($btn1) {
        $btn1_title = $btn1['title'] ? $btn1['title'] : $btn1['url'];
        $btn1_url = $btn1['url'];
        $btn1_target = $btn1['target'] ? $btn1['target'] : '_self';
      }

      $btn2 = get_sub_field('button_2');
      if ($btn2) {
        $btn2_title = $btn2['title'] ? $btn2['title'] : $btn2['url'];
        $btn2_url = $btn2['url'];
        $btn2_target = $btn2['target'] ? $btn2['target'] : '_self';
      }
     
      $mem_text = get_sub_field('text'); 
  ?>
        <section sm='px mb1' class='c12 bgc-b px2 py2 x xw mb2 rounded'>
          <div sm='c12 mb2' class='c6'>
            <h3 class='mb0'><?php echo $mem_title; ?></h3>
            <div class='c12 mb1 fsB'>
              <span><?php echo $mem_price; ?></span>
<!-- <span><?php echo $mem_price; ?></span><span class='dib subscript'>billed annually</span> -->
            </div>
            
            <div class='c12 '>
              <?php if ($btn1) : ?>
                <a class='btn btn-large btn-light dib' target='<?php echo $btn2_target; ?>' href='<?php echo $btn2_url; ?>'><?php echo $btn2_title; ?></a> 
              <?php endif; ?>

              <?php if ($btn2) : ?>
                <a class='btn btn-large btn-light dib' target='<?php echo $btn2_target; ?>' href='<?php echo $btn2_url; ?>'><?php echo $btn2_title; ?></a> 
              <?php endif; ?>

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


<section sm='py2 bb1lg' class='c12 tac bgc-g py4 bb1lg bt1lg'>
  <?php 
    $text_booking = get_field('booking_grey_block');
    $booking_title = $text_booking['text'];

    $btn1 = $text_booking['button_1'];
    if ($btn1) {
      $btn1_title = $btn1['title'] ? $btn1['title'] : $btn1['url'];
      $btn1_url = $btn1['url'];
      $btn1_target = $btn1['target'] ? $btn1['target'] : '_self';
    }

    $btn2 = $text_booking['button_2'];
    if ($btn2) {
      $btn2_title = $btn2['title'] ? $btn2['title'] : $btn2['url'];
      $btn2_url = $btn2['url'];
      $btn2_target = $btn2['target'] ? $btn2['target'] : '_self';
    }

  ?>
  <div class='mw50 mxa px2'>
    <h2 class='c12 mb2 pt2 mb0'><?php echo $booking_title; ?></h2>
    <div class='c12 db pb2'>
       <a class='btn dib' target='<?php echo $btn1_target; ?>' href='<?php echo $btn1_url; ?>'><?php echo $btn1_title; ?></a> 
       <a class='btn dib' target='<?php echo $btn2_target; ?>' href='<?php echo $btn2_url; ?>'><?php echo $btn2_title; ?></a> 
    </div>
  </div>
</section>

<section class='c12 bb1lg'>
  <?php 
    $textL = get_field('text_block_left');
    $textL_title = $textL['title'];
    $textL_text = $textL['text'];

    $tl_btn = $textL['button'];
    $tl_btn_title = $tl_btn['title'] ? $tl_btn['title'] : $tl_btn['url'];
    $tl_btn_url = $tl_btn['url'];
    $tl_btn_target = $tl_btn['target'] ? $tl_btn['target'] : '_self';
   

    $textR = get_field('text_block_right');
    $textR_title = $textR['title'];
    $textR_text = $textR['text'];

    $tr_btn = $textR['button'];
    $tr_btn_title = $tr_btn['title'] ? $tr_btn['title'] : $tr_btn['url'];
    $tr_btn_url = $tr_btn['url'];
    $tl_btn_target = $tl_btn['target'] ? $tl_btn['target'] : '_self';
 
  ?>
  <div class='c12 x xw xjc tac'>
    <div sm='c12 px1 py3 bb1lg' class='c6 px4 py3 br1lg'>
      <h2 class='c12 tac'><?php echo $textL_title; ?></h2> 
      <div class='c12 mb1'><?php echo $textL_text; ?></div>
      <div class='c12 tac'>
        <a class='btn dib' target='<?php echo $tl_btn_target; ?>' href='<?php echo $tl_btn_url; ?>'><?php echo $tl_btn_title; ?></a> 
      </div>
    </div>

    <div sm='c12 px1 py3' class='c6 px4 py3'>
      <h2 class='c12 tac'><?php echo $textR_title; ?></h2> 
      <div class='c12 mb1'><?php echo $textR_text; ?></div>
      <div class='c12 tac'>
        <a class='btn dib' target='<?php echo $tr_btn_target; ?>' href='<?php echo $tr_btn_url; ?>'><?php echo $tr_btn_title; ?></a> 
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
  <div class='c12 mxa'>
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

<section sm='py3 bb1lg' class='c12 tac bgc-g py4 bb1lg bt1lg'>
  <?php 
    $text_grey = get_field('text_centered_grey');
    $grey_title = $text_grey['title'];
    $grey_text = $text_grey['text'];
    $g_btn = $text_grey['button'];
    $g_btn_title = $g_btn['title'] ? $g_btn['title'] : $g_btn['url'];
    $g_btn_url = $g_btn['url'];
    $g_btn_target = $g_btn['target'] ? $g_btn['target'] : '_self';
 
  ?>
  <div>
      <h2 class='c12 mb0'><?php echo $grey_title; ?></h2>
      <div sm='py1 px2 mb1' class='mw50 mxa px4 py2'><?php echo $grey_text; ?></div> 
      <div class='c12 db'>
        <a class='btn dib' target='<?php echo $g_btn_target; ?>' href='<?php echo $g_btn_url; ?>'><?php echo $g_btn_title; ?></a> 
      </div>
  </div>
</section>

<?php 
  if (get_field('footer_left')) {
    get_template_part('components/footer');
  }
?>


<?php get_footer(); ?>
