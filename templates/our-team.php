<?php /* Template Name: Our Team */
get_header();
?>

<section sm='py2' class='c12 py4 '>
  <?php 
    $intro = get_field('intro');
    $intro_title = $intro['title'];
    $intro_text = $intro['text'];    
    $intro_btn = $intro['button'];

    if ($intro_btn) {
      $intro_btn_title = $intro_btn['title'] ? $intro_btn['title'] : $intro_btn['url'];
      $intro_btn_url = $intro_btn['url'];
      $intro_btn_target = $intro_btn['target'] ? $intro_btn['target'] : '_self';
    }
  ?>

  <div class='c12 tac pb1'>
    <div class='mxa mw50 px2'>
      <h1><?php echo $intro_title; ?></h1>  
      <div sm='fsC' class='c12 fsB'>
        <?php echo $intro_text; ?>
        <?php if ($intro_btn) : ?>
          <a class='btn dib btn-large btn-dark mt2' target='<?php echo $intro_btn_target; ?>' href='<?php echo $intro_btn_url; ?>'><?php echo $intro_btn_title; ?></a>
        <?php endif; ?>
      </div>
    </div>
  </div>
</section>


<section class='ppl c12 pb4 bb1lg'>
  <div class='c12 mw70 mxa x xw xjc px2'>
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
          <source media="(max-width: 799px)" data-srcset="<?php echo $m_image['sizes']['medium'] ?>" type="image/jpeg" />
          <source media="(min-width: 800px)" data-srcset="<?php echo $m_image['url'] ?>" type="image/jpeg" /> 
          <img class='c12 mb1' data-src='<?php echo $m_image['url'] ?>' alt="<?php echo $m_image['caption'] ?>" />
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


<?php 
  if (get_field('footer_left')) {
    get_template_part('components/footer');
  }
?>


<?php get_footer(); ?>
