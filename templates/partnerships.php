<?php /* Template Name: Partnerships */
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

<section sm='py2' class='imageL_textR py2'>
  <div sm='px1 py1' class='c12 x xw xac xjc px2 py4 mw70 mxa'>
    <?php 
      $iLtR = get_field('imageL_textR');
      $iLtRImage = $iLtR['image'];
      $iLtRText = $iLtR['text'];
      $iLtR_video = $iLtR['video'];

      $i_btn = $iLtR['button'];
      if ($i_btn) {
        $i_btn_title = $i_btn['title'] ? $i_btn['title'] : $i_btn['url'];
        $i_btn_url = $i_btn['url'];
        $i_btn_target = $i_btn['target'] ? $i_btn['target'] : '_self';
      }
    ?>
    
    <?php if ($iLtR_video) : ?>
    <div sm='c12 pr0 mb1' class='c6 pr2'>
      <div class='video h100 oh c12 psr'>
        <video data-src="<?php echo $iLtR_video; ?>" loop class='c12'></video>
        <figure class='psa t0 l0 c12 h100 oh curp'>
          <picture>
            <source media="(max-width: 799px)" data-srcset="<?php echo $iLtRImage['sizes']['medium'] ?>" type="image/jpeg" />
            <source media="(min-width: 800px)" data-srcset="<?php echo $iLtRImage['url'] ?>" type="image/jpeg" /> 
            <img class='c12 vam' data-src='<?php echo $iLtRImage['url'] ?>' alt="<?php echo $iLtRImage['caption'] ?>" />
          </picture> 
        </figure>
        <div class='play-btn psa c curp'>
          <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
              <path d="M8 5v14l11-7z"/>
              <path d="M0 0h24v24H0z" fill="none"/>
          </svg>
        </div>
      </div>
    </div>

    <?php else : ?>
    <div sm='c12 pr0 mb1' class='c6 pr2'>
      <picture>
        <source media="(max-width: 799px)" data-srcset="<?php echo $iLtRImage['sizes']['medium'] ?>" type="image/jpeg" />
        <source media="(min-width: 800px)" data-srcset="<?php echo $iLtRImage['url'] ?>" type="image/jpeg" /> 
        <img class='c12' data-src='<?php echo $iLtRImage['url'] ?>' alt="<?php echo $iLtRImage['caption'] ?>" />
      </picture> 
    </div>
  <?php endif; ?>
    
    <div sm='c12 px0 mb1' class='c6 px2'>
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
      $rl_btn_title = $rl_btn['title'] ? $rl_btn['title'] : $rl_btn['url'];
      $rl_btn_url = $rl_btn['url'];
      $rl_btn_target = $rl_btn['target'] ? $rl_btn['target'] : '_self';

    ?>
    <div sm='c12 px1' class='x xw xac xjc mb1 c6 px2'>
      <div class='px2 py2 b1lg rounded c12'>
        <h3 sm='mb1' class='c12 tac mb2'><?php echo $rl_title; ?></h3> 
        <div sm='mb0' class='c12 mb2'>
          <?php echo $rl_text; ?>
        </div>
        <div class='c12 tac'>
          <a sm='mt1' class='btn dib' target='<?php echo $rl_btn_target; ?>' href='<?php echo $rl_btn_url; ?>'><?php echo $rl_btn_title; ?></a> 

        </div>
      </div>
    </div>

    <?php 
      $roundR = get_field('rounded_text_block_right');
      $rr_title = $roundR['title'];
      $rr_text = $roundR['text'];

      $rr_btn = $roundR['button'];
      $rr_btn_title = $rr_btn['title'] ? $rr_btn['title'] : $rr_btn['url'];
      $rr_btn_url = $rr_btn['url'];
      $rr_btn_target = $rr_btn['target'] ? $rr_btn['target'] : '_self';

    ?>
    <div sm='c12 px1 mb0' class='x xw xac xjc mb1 c6 px2'>
      <div class='px2 py2 rounded b1lg c12'>
        <h3 sm='mb1' class='c12 tac mb2'><?php echo $rr_title; ?></h3> 
        <div sm='mb0' class='c12 mb2'>
          <?php echo $rr_text; ?>
        </div>
        <div class='c12 tac'>
          <a sm='mt1' class='btn dib' target='<?php echo $rr_btn_target; ?>' href='<?php echo $rr_btn_url; ?>'><?php echo $rr_btn_title; ?></a> 

        </div>
      </div>
    </div>

  </div>
</section>

<?php 
  $tiers = get_field('tiers'); 

  if (have_rows('tiers')) : while (have_rows('tiers')) : the_row();   
  
  $tier_title = get_sub_field('tier_title');
  $tier_text = get_sub_field('text');
  $logos = get_sub_field('logos');
?>
  <section class='c12 px2 py2 tierz bb1lg'>
    <h3 class='c12 tac mb0'><?php echo $tier_title; ?></h3>
    <?php 
      if ($tier_text) : ?>
    <div sm='px0' class='c12 mw50 mxa px2 pt2 pb1'><?php echo $tier_text; ?></div>
    <?php endif; ?> 
    <div sm='pt1 pb0' class='c12 mxa mw70 py2 x xw xac xjc'>
      <?php 
        if (have_rows('logos')) : while (have_rows('logos')) : the_row(); 
          $icon = get_sub_field('logo');
      ?>
          <div sm='px1 py2' class='dib twenty px2 py2 vam'><img class='c12 vam' data-src='<?php echo $icon['sizes']['large']; ?>'/></div> 
              
      <?php
        endwhile; endif;
      ?>
    </div> 
  </section>
<?php
  endwhile; endif;
?>
<?php 
  if (get_field('footer_left')) {
    get_template_part('components/footer-expand');
  }
?>

<?php get_footer(); ?>
