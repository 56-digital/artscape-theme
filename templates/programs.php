<?php /* Template Name: Programs */
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

<section class='imageL_textR py2'>
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
    
    <div sm='c12 px0 mb1' class='c6 pr2'>
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


<section sm='px0' class='c12 pb4 px2 bb1lg'>
  <div class='c12 x xw xjc'>
    <?php 
      $roundL = get_field('rounded_text_block_left');
      $rl_title = $roundL['title'];
      $rl_text = $roundL['text'];

      $rl_btn = $roundL['button'];
      if ($rl_btn) {
        $rl_btn_title = $rl_btn['title'] ? $rl_btn['title'] : $rl_btn['url'];
        $rl_btn_url = $rl_btn['url'];
        $rl_btn_target = $rl_btn['target'] ? $rl_btn['target'] : '_self';
      }

    ?>
    <div sm='c12 px1' class='x xw xac xjc mb1 c6 px2'>
      <div class='px2 py2 b1lg rounded'>
        <h3 sm='mb1' class='c12 tac mb2'><?php echo $rl_title; ?></h3> 
        <div sm='mb0' class='c12 mb2'>
          <?php echo $rl_text; ?>
        </div>
        <div class='c12 tac'>
          <?php if ($rl_btn) : ?>
            <a class='btn dib mt1' target='<?php echo $rl_btn_target; ?>' href='<?php echo $rl_btn_url; ?>'><?php echo $rl_btn_title; ?></a> 
          <?php endif; ?> 
        </div>
      </div>
    </div>

    <?php 
      $roundR = get_field('rounded_text_block_right');
      $rr_title = $roundR['title'];
      $rr_text = $roundR['text'];

      $rr_btn = $roundL['button'];
      if ($rr_btn) {
        $rr_btn_title = $rr_btn['title'] ? $rr_btn['title'] : $rr_btn['url'];
        $rr_btn_url = $rr_btn['url'];
        $rr_btn_target = $rr_btn['target'] ? $rr_btn['target'] : '_self';
      }

    ?>
    <div sm='c12 px1 mb0' class='x xw xac xjc mb1 c6 px2'>
      <div class='px2 py2 rounded b1lg'>
        <h3 sm='mb1' class='c12 tac mb2'><?php echo $rr_title; ?></h3> 
        <div sm='mb0' class='c12 mb2'>
          <?php echo $rr_text; ?>
        </div>
        <div class='c12 tac'>
          <?php if ($rr_btn) : ?>
            <a class='btn dib mt1' target='<?php echo $rr_btn_target; ?>' href='<?php echo $rr_btn_url; ?>'><?php echo $rr_btn_title; ?></a> 
          <?php endif; ?> 
        </div>
      </div>
    </div>

  </div>
</section>
<!--  -->

<section sm='px1 py2' class='py4 px4 bb1lg'>
  <h3 sm='mb0' class='c12 mb1 tac'>OUR PROGRAMS</h3>
  <div class='c12 mxa x xw xjc'>
    <?php 
      $args = array(
        'post_type' => 'programs',
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

<section class='c12 tac bgc-g py4 bt1lg bb1lg'>
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

<section class='c12 bb1lg'>
  <?php
    $video = get_field('video');

    $video_file = $video['video_file'];
    $video_img = $video['video_placeholder'];
    
 ?>
  <div sm='py1 px1' class='mw50 c12 px4 py4 my2 mxa'>

    <?php if ($video_file) : ?>
      <div class='video h100 c12 psr'>
        <video data-src='<?php echo $video_file; ?>' muted loop class='c12 h100 ofc'></video>
        <div class='psa t0 l0 c12 h100 oh curp'>
          <picture>
            <source media="(max-width: 799px)" data-srcset="<?php echo $video_img['sizes']['medium'] ?>" type="image/jpeg" />
            <source media="(min-width: 800px)" data-srcset="<?php echo $video_img['url'] ?>" type="image/jpeg" /> 
            <img class='c12 h100 ofc vam' data-src='<?php echo $video_img['url'] ?>' alt="<?php echo $video_img['caption'] ?>" />
          </picture> 
          <div class='play-btn psa c curp'>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z"/>
                <path d="M0 0h24v24H0z" fill="none"/>
            </svg>
          </div>

        </div>
      </div> 
    <?php else : ?>
      <div class='video-no-vid h100 oh c12 psr'>
        <figure class='psa t0 l0 c12 h100 oh'>
          <picture>
            <source media="(max-width: 799px)" data-srcset="<?php echo $video_img['sizes']['medium'] ?>" type="image/jpeg" />
            <source media="(min-width: 800px)" data-srcset="<?php echo $video_img['url'] ?>" type="image/jpeg" /> 
            <img class='c12 h100 ofc op0 t-o' data-src='<?php echo $video_img['url'] ?>' alt="<?php echo $video_img['caption'] ?>" />
          </picture> 
        </figure>
      </div> 
    <?php endif; ?>
  </div>
</section>

<?php 
  if (get_field('footer_left')) {
    get_template_part('components/footer');
  }
?>


<?php get_footer(); ?>
