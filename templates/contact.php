<?php /* Template Name: Contact */
get_header();
?>

<section sm='pt2 pb1' class='c12 py4 bb1lg'>
  <?php 
    $intro = get_field('intro');
    $intro_title = $intro['title'] ? $intro['title'] : get_the_title();
    $intro_text = $intro['text'];    
  ?>

  <div class='c12 tac pb1'>
    <div class='mxa mw50 px2'>
      <h1><?php echo $intro_title; ?></h1>  
      <div sm='fsC' class='c12 fsB'>
        <?php if ($intro_text) : echo $intro_text; endif; ?>
      </div>
    </div>
  </div>
</section>

<section class='c12'>
  <div sm='px1' class='c12 mw70 mxa px2'>
    <div class='py3'>
      <div class='c12 mw50 mxa px2 tac fsC'>
        <?php echo get_field('description'); ?>
      </div>
    </div>

    <div class='form py2'>
        <?php echo do_shortcode(get_field('form')); ?>
    </div>
  </div>
</section>

<?php 
  $text_grey = get_field('text_block_grey');
  $grey_title = $text_grey['title'];

  $grey_btn = $text_grey['button'];
  $grey_btn_title = $grey_btn['title'] ? $grey_btn['title'] : $grey_btn['url'];
  $grey_btn_url = $grey_btn['url'];
  $grey_btn_target = $grey_btn['target'] ? $grey_btn['target'] : '_self';
  if ($text_grey) :
?>
<section class='c12 tac bgc-g py4 bt1lg'>
  <div class='mw50 mxa px2'>
      <h2 class='c12 mb2'><?php echo $grey_title; ?></h2>
      <div class='c12 db'>
        <a class='btn dib' target='<?php echo $grey_btn_target; ?>' href='<?php echo $grey_btn_url; ?>'><?php echo $grey_btn_title; ?></a> 
      </div>
  </div>
</section>
<?php endif; ?>

<?php get_footer(); ?>
