<?php /* Template Name: Careers */
get_header();
?>

<section class='c12 pt4 pb1 '>
  <?php 
    $intro = get_field('intro');
    $intro_title = $intro['title'];
    $intro_text = $intro['text'];    
  ?>

  <div class='c12 tac'>
    <div class='mxa mw50 px2'>
      <h1><?php echo $intro_title; ?></h1>  
      <div class='c12 fsB'>
        <?php echo $intro_text; ?>
      </div>
    </div>
  </div>
</section>

<section class='imageL_textR py2'>
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

<section class='c12'>
  <div class='c12 mxa mw70 px2 py2'>
  <?php 
    if (have_rows('careers')) : while (have_rows('careers')) : the_row(); 
    $title = get_sub_field('title');
    $loc = get_sub_field('location');
    $pos = get_sub_field('position');
    $text = get_sub_field('text');
    $url = get_the_permalink();
  ?>
    <div class='py1 bb1lg'>
      <div class='c12 x xw xac curp'>
        <div class='c6 pr1'><h3 class='mb0'><?php echo $title; ?></h3></div> 
        <div class='c3 pr1'><h3 class='mb0'><?php echo $loc; ?></h3></div> 
        <div class='c3 pr1'><h3 class='mb0'><?php echo $pos; ?></h3></div> 
      </div>
      
      <div class=c12'>
        <div class='pt2 c6 fsC'>
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
