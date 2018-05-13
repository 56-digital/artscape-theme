<?php 
  $ID = get_the_ID();
  $post = get_field('intro');
 
  $post_url = get_the_permalink($ID);

  if ($post) {
    $post_title = $post['title']; 
    $post_photo = $post['cover_photo'] ? $post['cover_photo'] : false;
    $post_desc = $post['short_description'] ? $post['short_description'] : false;
  }

  $post_real_title = get_the_title($ID);
  ?>
<div sm='c12 px0' class='c6 px2 py2'>
  <a href='<?php echo $post_url; ?>'>
    <div class='mb1 img c12 oh'>
      <?php 
      if ($post_photo) : ?>
        <picture>
          <source media="(max-width: 799px)" srcset="<?php echo $post_photo['sizes']['medium'] ?>" type="image/jpeg" />
          <source media="(min-width: 800px)" srcset="<?php echo $post_photo['url'] ?>" type="image/jpeg" /> 
          <img class='c12 h100 ofc' src='<?php echo $post_photo['url'] ?>' alt="<?php echo $post_photo['caption'] ?>" />
        </picture> 

      <?php else : ?>
        <div class='blank-img h100 c12'></div>
      <?php endif; ?>
    </div> 
    <h2 class='c12 ttu mb1'><?php if ($post_title) : echo $post_title; elseif ($post_real_title) : echo $post_real_title; endif; ?></h2>
    <p class='c12 pb1 mb1'><?php echo $post_desc; ?></p>
    <div class='c12'>
      <div class='btn dib ttu'>Learn More</div>
    </div>
  </a>
</div>
