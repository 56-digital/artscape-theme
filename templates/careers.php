<?php /* Template Name: Careers */
get_header();
?>

<section sm='pt2 pb0' class='c12 pt4 pb1 '>
  <?php 
    $intro = get_field('intro');
    $intro_title = $intro['title'];
    $intro_text = $intro['text'];    
  ?>

  <div class='c12 tac'>
    <div class='mxa mw50 px2'>
      <h1><?php echo $intro_title; ?></h1>  
      <div sm='fsC' class='c12 fsB'>
        <?php echo $intro_text; ?>
      </div>
    </div>
  </div>
</section>

<section sm='pb1' class='imageL_textR py2'>
  <div sm='px1 py2' class='c12 x xw xac xjc px2 py4 mw70 mxa'>
    <?php 
      $iLtR = get_field('imageL_textR');
      $iLtRImage = $iLtR['image'];
      $iLtRText = $iLtR['text'];

      $i_btn = $iLtR['button'];
      if ($i_btn) {
        $i_btn_title = $i_btn['title'] ? $i_btn['title'] : $i_btn['url'];
        $i_btn_url = $i_btn['url'];
        $i_btn_target = $i_btn['target'] ? $i_btn['target'] : '_self';
      }
    ?>

    
    <div sm='c12 pr0 mb1' class='c6 pr2'>
      <picture>
        <source media="(max-width: 799px)" data-srcset="<?php echo $iLtRImage['sizes']['medium'] ?>" type="image/jpeg" />
        <source media="(min-width: 800px)" data-srcset="<?php echo $iLtRImage['url'] ?>" type="image/jpeg" /> 
        <img class='c12' data-src='<?php echo $iLtRImage['url'] ?>' alt="<?php echo $iLtRImage['caption'] ?>" />
      </picture> 
    </div>
    
    <div sm='c12 px0' class='c6 px2'>
      <?php echo $iLtRText; ?>
      <?php if ($i_btn) : ?>
        <a class='btn dib mt1' target='<?php echo $i_btn_target; ?>' href='<?php echo $i_btn_url; ?>'><?php echo $i_btn_title; ?></a> 
      <?php endif; ?> 
    </div>
  </div>
</section>

<section class='c12 pb4'>
  <div sm='px1 py1' class='c12 mxa mw70 px2 py2'>
  <?php 
    if (have_rows('careers')) : while (have_rows('careers')) : the_row(); 
    $title = get_sub_field('title');
    $loc = get_sub_field('location');
    $pos = get_sub_field('position');
    $text = get_sub_field('text');
    $url = get_sub_field('apply_url');
  ?>
    <div class='py1 bb1lg career-post oh'>
      <div class='c12 x xw xac curp'>
        <div sm='c12' class='c6 pr1'><h3 class='mb0'><?php echo $title; ?></h3></div> 
        <div sm='c12' class='c3 pr1'><h3 class='mb0'><?php echo $loc; ?></h3></div> 
        <div sm='c12' class='c3 pr1'><h3 class='mb0'><?php echo $pos; ?></h3></div> 
      </div>
      
      <div class='c12 career-content'>
        <div sm='c12 pt1' class='pt2 c6 fsC mb1'>
          <?php echo $text; ?>
        </div> 
        <div class='c12 pb2'>
          <a class='btn btn-large btn-dark dib ttu' href='<?php echo $url; ?>'>Apply</a> 
        </div>
      </div>
    </div> 
  <?php 
    endwhile; endif; ?>
  </div>
</section>  

<?php get_footer(); ?>
