<?php get_header(); ?>

<article sm='pb1' class='c12 pb4 x xw xjc'>
  <section sm='py2' class='c12 pt4 pb2'>
    <?php 
      $intro = get_field('intro');
      $intro_title = $intro['title'] ? $intro['title'] : get_the_title();
      $intro_text = $intro['text'] ? $intro['text'] : $intro['short_description'];    
      $intro_img = $intro['cover_photo'];
    ?>

    <div class='c12 tac pb1'>
      <div class='mxa mw50 px2'>
        <h1><?php echo $intro_title; ?></h1>  
        <div sm='fsC mb2' class='c12 fsB'>
          <?php echo $intro_text; ?>
        </div>
      </div>

      <?php if ($intro_img) : ?>
        <div sm='px1' class='c12 mw70 mxa px4 mt4'>
       
          <figure class='c12'> 
            <picture>
              <source media="(max-width: 799px)" data-srcset="<?php echo $intro_img['sizes']['medium'] ?>" type="image/jpeg" />
              <source media="(min-width: 800px)" data-srcset="<?php echo $intro_img['url'] ?>" type="image/jpeg" /> 
              <img class='c12' data-src='<?php echo $intro_img['url'] ?>' alt="<?php echo $intro_img['caption'] ?>" />
            </picture> 
            <?php if ($intro_img['caption']) : ?>
              <figcaption class='py1 fsC tal'><?php echo $intro_img['caption']; ?></figcaption> 
            <?php endif; ?>
          </figure>

        </div>
      <?php endif; ?> 

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
  if (get_field('footer_left')['title']) {
    get_template_part('components/footer');
  }
?>
<?php get_footer(); ?>
