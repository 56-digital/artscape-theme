<?php /* Template Name: Spaces */
get_header();
?>

<section sm='py2' class='c12 py4 bb1lg'>
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

<section class='imageL_textR py2 bb1lg'>
  <div sm='px1 py1' class='c12 x xw xac xjc px2 py4 mw70 mxa'>
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


<?php 
  $space = get_field('the_space_image');
?>
<div id='space-opened' class='psf curp t0 r0 c12 bgc-w os vh100 bgc-g'>
  <div class='psr x xw xac'>
    <aside class='x-btn space-close curp'>
      <svg class='vam' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
          <path d="M0 0h24v24H0z" fill="none"/>
      </svg>
    </aside>
    <div class='x xw xac xjb c12 h100'>
      <img class='c12' data-src='<?php echo $space['url']; ?>' alt='The Space Image'>
    </div>
  </div>
</div>



<section id='space' class='c12 curd'>

  <div class='space-container oh psr bgc-b'>
    <div class='space-open psa b0 r0 z1 curp'>
      <svg viewBox="0 0 24 24">
        <path d="M0 0h24v24H0z" fill="none"/>
        <path d="M7 14H5v5h5v-2H7v-3zm-2-4h2V7h3V5H5v5zm12 7h-3v2h5v-5h-2v3zM14 5v2h3v3h2V5h-5z"/>
      </svg>
    </div>

    <figure class='space-parent oh c12'>
      <picture>
        <source media="(max-width: 799px)" data-srcset="<?php echo $space['sizes']['medium'] ?>" type="image/jpeg" />
        <source media="(min-width: 800px)" data-srcset="<?php echo $space['url'] ?>" type="image/jpeg" /> 
        <img class='c12 h100 ofc op0 t-o' data-src='<?php echo $space['url'] ?>' alt="<?php echo $space['caption'] ?>" />
      </picture> 
    </figure>
  </div>
</section>

<section sm='px1 py2' class='py4 px4 bb1lg'>
  <div class='c12 mxa x xw xjc'>
    <?php 
      $args = array(
        'post_type' => 'spaces',
        'posts_per_page' => -1 
      );

      $newsQuery = new WP_Query($args);
      
      if ($newsQuery->have_posts() ) : while ($newsQuery->have_posts() ) : $newsQuery->the_post();
        get_template_part('components/feed-post'); 
      endwhile; endif;

      wp_reset_query();
    ?>
  </div> 
</section>

<section class='c12 tac bgc-g py4 bb1lg'>
  <?php 
    $text_grey = get_field('text_block_grey');
    $grey_title = $text_grey['title'];

    $g_btn = $text_grey['button'];
    $g_btn_title = $g_btn['title'] ? $g_btn['title'] : $g_btn['url'];
    $g_btn_url = $g_btn['url'];
    $g_btn_target = $g_btn['target'] ? $g_btn['target'] : '_self';
  ?>
  <div class='mw50 mxa px2'>
      <h2 class='c12 mb2'><?php echo $grey_title; ?></h2>
      <div class='c12 db'>
         <a class='btn dib mt1' target='<?php echo $g_btn_target; ?>' href='<?php echo $g_btn_url; ?>'><?php echo $g_btn_title; ?></a> 
      </div>
  </div>
</section>

<?php 
  if (get_field('footer_left')) {
    get_template_part('components/footer');
  }
?>

<?php get_footer(); ?>
