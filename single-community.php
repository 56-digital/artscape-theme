<?php get_header(); ?>

<section sm='pt2' class='c12 pt4 pb2 '>
  <?php 
    $intro = get_field('intro');
    $intro_title = $intro['title'] ? $intro['title'] : get_the_title();
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

<section class='c12'>
  <div class='mxa mw70 px2 pt2 pb4 x xw xjb'>
    <?php 
      $mems = get_field('members');
      if (have_rows('members')) : while (have_rows('members')) : the_row(); 
        $m_image = get_sub_field('image'); 
        $m_title = get_sub_field('title');
        $m_name = get_sub_field('name');
        $m_text = get_sub_field('text');
        $m_links = get_sub_field('links');
    ?>
        <div sm='c12' class='person c4 px1 py1'>
          <picture>
            <source media="(max-width: 799px)" data-srcset="<?php echo $m_image['sizes']['medium'] ?>" type="image/jpeg" />
            <source media="(min-width: 800px)" data-srcset="<?php echo $m_image['url'] ?>" type="image/jpeg" /> 
            <img class='c12 mb1' data-src='<?php echo $m_image['url'] ?>' alt="<?php echo $m_image['caption'] ?>" />
          </picture> 
          <div class='c12 mb1'>
            <h2 class='mb0'><?php echo $m_name; ?></h2>
            <span class='db fsC'><?php echo $m_title; ?></span>
          </div>

          <div class='c12 fsC mb1'><?php echo $m_text; ?></div>
          
          <?php 

          if ($m_links && count($m_links) > 0) { 
            echo '<div class="c12">';
            foreach ($m_links as $m_link) { ?>
              <a class='btn mb1 dib mr1 ttu' href='<?php echo $m_link['button_url']; ?>'><?php echo $m_link['button_title']; ?></a>
    <?php
            } 
            echo '</div>';
          } 
          ?>
        </div> 
     
    <?php
      endwhile; endif;
    ?>
  </div>
</section>

  <?php
    $footer_left = get_field('footer_left');
    $fl_title = $footer_left['title'];
    $fl_btn_title = $footer_left['button_title'];
    $fl_btn_url = $footer_left['button_url'];

    $footer_right = get_field('footer_right');
    $fr_title = $footer_right['title'];
    $fr_btn_title = $footer_right['button_title'];
    $fr_btn_url = $footer_right['button_url'];
    
    if ($fl_title && $fr_title) :
  ?> 
<section class='footer-linx tac x xac xw'>
  <div class='c6 h100 br1lg'>
    <a class='py4 px4 db h100 c12' href='<?php echo $fl_btn_url; ?>'>
      <h2 class='fsA mb3 px2 pt4'><?php echo $fl_title; ?></h2>
      <div class='c12 pb4'>
        <div class='btn dib'><?php echo $fl_btn_title; ?></div> 
      </div>
    </a>
  </div> 

  <div class='c6 h100'>
    <a class='py4 px4 db c12 h100' href='<?php echo $fr_btn_url; ?>'>
      <h2 class='fsA mb3 px2 pt4'><?php echo $fr_title; ?></h2>
      <div class='c12 pb4'>
        <div class='btn dib'><?php echo $fr_btn_title; ?></div> 
      </div>
    </a>
  </div> 
</section>
<?php endif; ?>
<?php get_footer(); ?>
