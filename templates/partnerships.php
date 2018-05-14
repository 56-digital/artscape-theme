<?php /* Template Name: Partnerships */
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

<section sm='py2' class='imageL_textR py2'>
  <div sm='px1 py1' class='c12 x xw xac xjc px2 py4 mw70 mxa'>
    <?php 
      $iLtR = get_field('imageL_textR');
      $iLtRImage = $iLtR['image'];
      $iLtRText = $iLtR['text'];
    ?>
    
    <div sm='c12 pr0 mb1' class='c6 pr2'>
      <picture>
        <source media="(max-width: 799px)" data-srcset="<?php echo $iLtRImage['sizes']['medium'] ?>" type="image/jpeg" />
        <source media="(min-width: 800px)" data-srcset="<?php echo $iLtRImage['url'] ?>" type="image/jpeg" /> 
        <img class='c12' data-src='<?php echo $iLtRImage['url'] ?>' alt="<?php echo $iLtRImage['caption'] ?>" />
      </picture> 
    </div>
    
    <div sm='c12 px0 mb1' class='c6 px2'>
      <?php echo $iLtRText; ?>
    </div>
  </div>
</section>

<section sm='pb3 px1' class='c12 pb4 px2 bb1lg'>
  <?php 
    $round = get_field('rounded_text_block');
    $r_title = $round['title'];
    $r_text = $round['text'];
    $r_btn_title = $round['button_title'];
    $r_btn_url = $round['button_url'];

  ?>
  <div class='x xw xac xjc mb1 mw70 mxa '>
    <div sm='c12' class='c6 px2 py2 rounded b1lg'>
      <h3 sm='mb1' class='c12 tac mb2'><?php echo $r_title; ?></h3> 
      <div class='c12 mb2'>
        <?php echo $r_text; ?>
      </div>
      <div class='c12 tac'>
        <a class='btn dib' href='<?php echo $r_btn_url; ?>'><?php echo $r_btn_title; ?></a> 
      </div>
    </div>
  </div>
</section>

<?php 
  $tiers = get_field('tiers'); 

  if (have_rows('tiers')) : while (have_rows('tiers')) : the_row();   
  
  $tier_title = get_sub_field('tier_title');
  $logos = get_sub_field('logos');
?>
  <section class='c12 px2 py2 tierz bb1lg'>
    <h3 class='c12 tac mb0'><?php echo $tier_title; ?></h3>
    <div sm='pt1 pb0' class='c12 mxa mw70 py2 x xw xac'>
      <?php 
        if (have_rows('logos')) : while (have_rows('logos')) : the_row(); 
          $icon = get_sub_field('logo');
      ?>
          <div sm='px1 py2' class='dib twenty px2 py2 vam'><img class='c12 vam' data-src='<?php echo $icon['sizes']['large']; ?>'/></div> 
              
      <?php
        endwhile; endif;
      ?>
    </div> 
  </section>
<?php
  endwhile; endif;
?>

<section class='footer-linx tac x xac xw'>
  <?php
    $footer_left = get_field('footer_left');
    $fl_title = $footer_left['title'];
    $fl_text = $footer_left['text'];
    $fl_btn_title = $footer_left['button_title'];
    $fl_btn_url = $footer_left['button_url'];

    $footer_right = get_field('footer_right');
    $fr_title = $footer_right['title'];
    $fr_text = $footer_right['text'];
    $fr_btn_title = $footer_right['button_title'];
    $fr_btn_url = $footer_right['button_url'];
    
  ?> 
  <div sm='c12' class='c6 h100 br1lg'>
    <a sm='px2 py0 bb1lg' class='py4 px4 db h100 c12' href='<?php echo $fl_btn_url; ?>'>
      <h2 sm='mb0 pt3' class='fsB px2 pt4 mb0'><?php echo $fl_title; ?></h2>
      <div class='c12 py2'><?php echo $fl_text; ?></div>
      <div class='c12 pb4'>
        <div class='btn dib'><?php echo $fl_btn_title; ?></div> 
      </div>
    </a>
  </div> 

  <div sm='c12' class='c6 h100'>
    <a sm='px2 py0' class='py4 px4 db c12 h100' href='<?php echo $fr_btn_url; ?>'>
      <h2 sm='mb0 pt3' class='fsB px2 pt4 mb0'><?php echo $fr_title; ?></h2>
      <div class='c12 py2'><?php echo $fr_text; ?></div>
      <div class='c12 pb4'>
        <div class='btn dib'><?php echo $fr_btn_title; ?></div> 
      </div>
    </a>
  </div> 
</section>

<?php get_footer(); ?>
