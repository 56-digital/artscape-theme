<?php 
  $img_block = get_sub_field('image');
  $full_width = get_sub_field('full_width');
  $caption = get_sub_field('caption');
?>

<section class='c12'>
  <figure <?php if (!$full_width) { echo 'sm="mw70 mxa px1 py2"'; } else { echo 'sm="py1"'; } ?> class='c12 <?php if (!$full_width) { echo 'mw70 mxa px4'; } ?> py4'> 
    <picture>
      <source media="(max-width: 799px)" srcset="<?php echo $img_block['sizes']['medium'] ?>" type="image/jpeg" />
      <source media="(min-width: 800px)" srcset="<?php echo $img_block['url'] ?>" type="image/jpeg" /> 
      <img class='c12 vab' src='<?php echo $img_block['url'] ?>' alt="<?php echo $intro_img['caption'] ?>" />
    </picture> 
    <?php if ($caption) : ?>
      <figcaption class='<?php if ($full_width) { echo 'px1'; } ?> py1 fsC tal'><?php echo $caption; ?></figcaption> 
    <?php endif; ?>
  </figure>
</section>
