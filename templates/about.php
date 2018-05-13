<?php /* Template Name: About */
get_header();
?>

<section class='c12 pb4 bb1lg'>
  <div class='c12 psr mb2 about-intro oh'>

    <?php
      $cover_photo = get_field('cover_photo');

      $intro = get_field('intro');
      $intro_title = $intro['title'];
      $intro_text = $intro['text'];    

    ?>
    <picture>
      <source media="(max-width: 799px)" srcset="<?php echo $cover_photo['sizes']['medium'] ?>" type="image/jpeg" />
      <source media="(min-width: 800px)" srcset="<?php echo $cover_photo['url'] ?>" type="image/jpeg" /> 
      <img class='c12 h100 ofc' src='<?php echo $cover_photo['url'] ?>' alt="<?php echo $cover_photo['caption'] ?>" />
    </picture> 
  </div>
  
  <div sm='pb0' class='c12 tac pb3 '>
    <div class='mxa mw50 px2'>
      <h1><?php echo $intro_title; ?></h1>  
      <div sm='fsC' class='c12 fsB'>
        <?php echo $intro_text; ?>
      </div>
    </div>
  </div>
</section>

<section class='imageL_textR py2 bb1lg'>
  <div sm='px1 py1' class='c12 x xw xac xjc px2 py4 mw70 mxa'>
    <?php 
      $iLtR = get_field('textL_imageR');
      $iLtRImage = $iLtR['image'];
      $iLtRText = $iLtR['text'];
    ?>
    
    <div sm='c12 pr0 mb1' class='c6 pr2'>
      <picture>
        <source media="(max-width: 799px)" srcset="<?php echo $iLtRImage['sizes']['medium'] ?>" type="image/jpeg" />
        <source media="(min-width: 800px)" srcset="<?php echo $iLtRImage['url'] ?>" type="image/jpeg" /> 
        <img class='c12' src='<?php echo $iLtRImage['url'] ?>' alt="<?php echo $iLtRImage['caption'] ?>" />
      </picture> 
    </div>
    
    <div sm='c12 px0' class='c6 px2'>
      <?php echo $iLtRText; ?>
    </div>
  </div>
</section>

<section class='c12 bb1lg'>
  <?php 
    $two_text = get_field('two_text');

    $ttl_title = $two_text['title_left'];
    $ttl_text = $two_text['text_left'];
    $ttr_title = $two_text['title_right'];
    $ttr_text = $two_text['text_right'];
  ?>
  <div class='c12 x xw xjc'>
    <div sm='c12 px1 py2 bb1lg' class='c6 px4 py3 br1lg'>
      <h2 sm='tal' class='c12 tac'><?php echo $ttl_title; ?></h2> 
      <div class='c12'><?php echo $ttl_text; ?></div>
    </div>

    <div sm='c12 px1 py2' class='c6 px4 py3'>
      <h2 sm='tal' class='c12 tac'><?php echo $ttr_title; ?></h2> 
      <div class='c12'><?php echo $ttr_text; ?></div>
    </div>
  </div> 
</section>

<section sm='py3' class='c12 tac bgc-g py4'>
  <?php 
    $text_grey = get_field('full_text_grey');
    $grey_title = $text_grey['title'];
    $grey_text = $text_grey['text'];
    $grey_btn_title = $text_grey['button_title'];
    $grey_btn_url = $text_grey['button_url']; 
  ?>
  <div>
    <h2 class='c12'><?php echo $grey_title; ?></h2>
      <div sm='px1 py1 tal' class='mw50 mxa px4 py2 mb1'><?php echo $grey_text; ?></div> 
      <div class='c12 db'>
        <a class='btn dib' href='<?php echo $grey_btn_url; ?>'><?php echo $grey_btn_title; ?></a> 
      </div>
  </div>
</section>

<section sm='py0' class='imageL_textR py2 bb1lg'>
  <div sm='px1 py2' class='c12 x xw xac xjc px2 py4 mw70 mxa'>
    <?php 
      $iRtL = get_field('imageL_textR');
      $iRtLImage = $iRtL['image'];
      $iRtLText = $iRtL['text'];
    ?>

    <div sm='c12 px0 mb0 xo2' class='c6 px2'>
      <?php echo $iRtLText; ?>
    </div>

    <div sm='c12 pr0 xo1 mb1' class='c6 pr2'>
      <picture>
        <source media="(max-width: 799px)" srcset="<?php echo $iRtLImage['sizes']['medium'] ?>" type="image/jpeg" />
        <source media="(min-width: 800px)" srcset="<?php echo $iRtLImage['url'] ?>" type="image/jpeg" /> 
        <img class='c12' src='<?php echo $iRtLImage['url'] ?>' alt="<?php echo $iRtLImage['caption'] ?>" />
      </picture> 
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
