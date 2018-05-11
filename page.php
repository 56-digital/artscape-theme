<?php get_header(); ?>

<article class='c12 pb4 x xw xjc'>
  <section class='c12 pt4 pb2'>
    <?php 
      $intro = get_field('intro');
      $intro_title = $intro['title'] ? $intro['title'] : get_the_title();
      $intro_text = $intro['text'] ? $intro['text'] : $intro['short_description'];    
      $intro_img = $intro['cover_photo'];
    ?>

    <div class='c12 tac pb1'>
      <div class='mxa mw50 px2'>
        <h1><?php echo $intro_title; ?></h1>  
        <?php if ($intro_text) : ?>
          <div class='c12 fsB mb4'>
            <?php echo $intro_text; ?>
          </div>
        <?php endif; ?>
      </div>

    <?php
      if ($intro_img) : ?>
      <div class='c12 mw70 mxa px4'>
        <figure class='c12'> 
          <picture>
            <source media="(max-width: 799px)" srcset="<?php echo $intro_img['sizes']['medium'] ?>" type="image/jpeg" />
            <source media="(min-width: 800px)" srcset="<?php echo $intro_img['url'] ?>" type="image/jpeg" /> 
            <img class='c12' src='<?php echo $intro_img['url'] ?>' alt="<?php echo $intro_img['caption'] ?>" />
          </picture> 
          <?php if ($intro_img['caption']) : ?>
            <figcaption class='py1 fsC tal'><?php echo $intro_img['caption']; ?></figcaption> 
          <?php endif; ?>
        </figure>
      </div>
    <?php
      endif; ?>

    </div>
  </section>

<?php
  if (have_rows('content')) : while (have_rows('content')) : the_row(); 
    if (get_row_layout() == 'image_block') :
      get_template_part('components/image-block');
    elseif (get_row_layout() == 'text_block') :
      get_template_part('components/text-block');
    elseif (get_row_layout() == 'call_to_action') :
      get_template_part('components/cta');
    elseif (get_row_layout() == 'video') :
      get_template_part('components/video');
    elseif (get_row_layout() == 'rounded_block') :
      get_template_part('components/rounded-block');
    elseif (get_row_layout() == 'table_block') :
      get_template_part('components/table-block');
    elseif (get_row_layout() == 'steps_block') :
      get_template_part('components/steps');
    endif;
  endwhile; endif;
?>

</article>

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
