<?php /* Template Name: Our Team */
get_header();
?>

<section sm='py2' class='c12 py4 '>
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


<section class='ppl c12 pb4 bb1lg'>
  <div class='c12 mw70 mxa x xw xac xjc px2'>
    <?php 
      $members = get_field('members');
      
      if (have_rows('members')) : while (have_rows('members')) : the_row(); 
      $m_image = get_sub_field('image');
      $m_name = get_sub_field('name');
      $m_title = get_sub_field('title');
      $m_email = get_sub_field('email');
      $m_text = get_sub_field('text');
    ?>
      <div sm='c12 px2 pt1 pb2' class='person c4 px1 py1'>
        <picture>
          <source media="(max-width: 799px)" srcset="<?php echo $m_image['sizes']['medium'] ?>" type="image/jpeg" />
          <source media="(min-width: 800px)" srcset="<?php echo $m_image['url'] ?>" type="image/jpeg" /> 
          <img class='c12 mb1' src='<?php echo $m_image['url'] ?>' alt="<?php echo $m_image['caption'] ?>" />
        </picture> 
        <div class='c12 mb1'>
          <h2 class='mb0'><?php echo $m_name; ?></h2>
          <span class='db fsC'><?php echo $m_title; ?></span>
          <span class='db fsC'><a href='mailto:<?php echo $m_email ?>'><?php echo $m_email; ?></a></span>
        </div>

        <div class='c12 fsC'><?php echo $m_text; ?></div>
      </div> 
    <?php
      endwhile; endif;
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
