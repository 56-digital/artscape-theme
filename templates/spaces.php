<?php /* Template Name: Spaces */
get_header();
?>

<section class='c12 py4 bb1lg'>
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

<section class='imageL_textR py2 bb1lg'>
  <div class='c12 x xw xac xjc px2 py4 mw70 mxa'>
    <?php 
      $iLtR = get_field('imageL_textR');
      $iLtRImage = $iLtR['image'];
      $iLtRText = $iLtR['text'];
    ?>
    
    <div class='c6 pr2'>
      <picture>
        <source media="(max-width: 799px)" srcset="<?php echo $iLtRImage['sizes']['medium'] ?>" type="image/jpeg" />
        <source media="(min-width: 800px)" srcset="<?php echo $iLtRImage['url'] ?>" type="image/jpeg" /> 
        <img class='c12' src='<?php echo $iLtRImage['url'] ?>' alt="<?php echo $iLtRImage['caption'] ?>" />
      </picture> 
    </div>
    
    <div class='c6 px2'>
      <?php echo $iLtRText; ?>
    </div>
  </div>
</section>

<section class='c12 py4 px2 tac'>
  <div class='c12 mxa mw70'>
    <?php
      $facilities = get_field('our_facilities', 6);
      $fac_title = $facilities['title'];
      $fac_elements = $facilities['repeating_elements'];
      $fac_link = $facilities['link'];
    ?>
    <h3><?php echo $fac_title; ?></h3>
    <div class='x xw xac xjb py2 mb2 lh1-5'>
      <?php 
        foreach($fac_elements as $fac_el) { ?>
        <div class='c4 fsB'><?php echo $fac_el['title']; ?></div>
      <?php } ?>
    </div>
    <div class='c12 psr mb2'>
      <a class='btn dib' href='<?php echo $fac_link; ?>'>LEARN MORE ABOUT OUR SPACES</a> 
    </div>
  </div>
</section>

<section class='py4 px4 bb1lg'>
  <div class='c12 mxa x xw xjc'>
    <?php 
      $args = array(
        'post_type' => 'spaces',
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

<section class='c12 tac bgc-g py4 bb1lg'>
  <?php 
    $text_grey = get_field('text_block_grey');
    $grey_title = $text_grey['title'];
    $grey_btn_title = $text_grey['button_title'];
    $grey_btn_url = $text_grey['button_url']; 
  ?>
  <div class='mw50 mxa px2'>
      <h2 class='c12 mb2'><?php echo $grey_title; ?></h2>
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
</section><?php get_footer(); ?>
