<?php /* Template Name: Community */
get_header();
?>

<section class='c12 pt4 pb4 '>
  <?php 
    $intro = get_field('intro');
    $intro_title = $intro['title'];
    $intro_text = $intro['text'];    
  ?>

  <div class='c12 tac pb1'>
    <div class='mxa mw50 px2'>
      <h1><?php echo $intro_title; ?></h1>  
      <div class='c12 fsB'>
        <?php echo $intro_text; ?>
      </div>
    </div>
  </div>
</section>


<section class='c12'>
  <?php
    if (have_rows('community_posts')) : while (have_rows('community_posts')) : the_row(); 
      $id = get_sub_field('community_post');
      $cp = get_field('intro', $id);
      $cp_title = $cp['title'] ? $cp['title'] : get_the_title($id); 
      $cp_text = $cp['text'];
      $cp_url = get_the_permalink($id);
      $cp_mem = get_field('members', $id);
  ?>
    <section class='c12 py3 bt1lg'>
      <div class='mxa mw70 px2 py2'>
        <h3 class='ttu c12 tac'><?php echo $cp_title; ?></h3>
        <div class='c12 mw50 px2 tac mxa'><?php echo $cp_text; ?></div>
  
        <div class='c12 x xw xjb py2'>
          <?php 
            $i = 0;

            foreach ($cp_mem as $mem) { 
              $i++;
              $m_image = $mem['image'];
              $m_name = $mem['name'];
              $m_title = $mem['title'];
              $m_text = $mem['text'];
              $m_links = $mem['links'] ? $mem['links'] : false;
    
              if ($i < 4) { 
            ?>
              <div class='person c4 px1 py1'>
                <picture>
                  <source media="(max-width: 799px)" srcset="<?php echo $m_image['sizes']['medium'] ?>" type="image/jpeg" />
                  <source media="(min-width: 800px)" srcset="<?php echo $m_image['url'] ?>" type="image/jpeg" /> 
                  <img class='c12 mb1' src='<?php echo $m_image['url'] ?>' alt="<?php echo $m_image['caption'] ?>" />
                </picture> 
                <div class='c12 mb1'>
                  <h2 class='mb0'><?php echo $m_name; ?></h2>
                  <span class='db fsC'><?php echo $m_title; ?></span>
                </div>

                <div class='c12 fsC'><?php echo $m_text; ?></div>
                
                <?php 

                if ($m_links && count($m_links) > 0) { 
                  echo '<div class="c12">';
                  foreach ($m_links as $m_link) { ?>
                    <a class='btn mb1 dib mr1 ttu' href='<?php echo $m_link['button_url']; ?>'><?php echo $m_link['button_title']; ?></a>
          <?php
                  } 
                  echo '</div>';
                } 
                ?>
              </div> 
   
          <?php 
            }
          } ?>
        </div>
  
        <?php if (count($cp_mem) > 3) : ?>
          <div class='c12 tac mb1'>
            <a class='btn btn-dark btn-large dib ttu' href='<?php echo $cp_url ?>'>View All</a> 
          </div>  
        <?php endif ?>

        <div class='c12 tac'>
          <a class='btn btn-dark btn-large dib ttu' href='<?php echo get_bloginfo('url'); ?>/programs'>View Programs</a> 
        </div>

      
      </div>
    </section>
  <?php
    endwhile; endif;
  ?>
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

<section class='c12 pb4 px2 bb1lg'>
  <div class='c12 x xw xjc'>
    <?php 
      $roundL = get_field('rounded_text_block_left');
      $rl_title = $roundL['title'];
      $rl_text = $roundL['text'];

    ?>
    <div class='x xw xac xjc mb1 c6 px2'>
      <div class='px2 py2 b1lg rounded'>
        <h3 class='c12 tac mb2'><?php echo $rl_title; ?></h3> 
        <div class='c12 mb2'>
          <?php echo $rl_text; ?>
        </div>
      </div>
    </div>

    <?php 
      $roundR = get_field('rounded_text_block_right');
      $rr_title = $roundR['title'];
      $rr_text = $roundR['text'];

    ?>
    <div class='x xw xac xjc mb1 c6 px2'>
      <div class='px2 py2 rounded b1lg'>
        <h3 class='c12 tac mb2'><?php echo $rr_title; ?></h3> 
        <div class='c12 mb2'>
          <?php echo $rr_text; ?>
        </div>
      </div>
    </div>

  </div>
</section>

<section class='imageL_textR py2 bb1lg'>
  <div class='c12 x xw xac xjc px2 py4 mw70 mxa'>
    <?php 
      $iLtR2 = get_field('imageL_textR2');
      $iLtRImage2 = $iLtR2['image'];
      $iLtRText2 = $iLtR2['text'];
    ?>
    
    <div class='c6 pr2'>
      <picture>
        <source media="(max-width: 799px)" srcset="<?php echo $iLtRImage2['sizes']['medium'] ?>" type="image/jpeg" />
        <source media="(min-width: 800px)" srcset="<?php echo $iLtRImage2['url'] ?>" type="image/jpeg" /> 
        <img class='c12' src='<?php echo $iLtRImage2['url'] ?>' alt="<?php echo $iLtRImage2['caption'] ?>" />
      </picture> 
    </div>
    
    <div class='c6 px2'>
      <?php echo $iLtRText2; ?>
    </div>
  </div>
</section>

<section class='footer-linx tac x xac xw'>
  <?php
    $footer_left = get_field('footer_left');
    $fl_title = $footer_left['title'];
    $fl_btn_title = $footer_left['button_title'];
    $fl_btn_url = $footer_left['button_url'];

    $footer_right = get_field('footer_right');
    $fr_title = $footer_right['title'];
    $fr_btn_title = $footer_right['button_title'];
    $fr_btn_url = $footer_right['button_url'];
    
  ?> 
  <div class='c6 h100 br1lg'>
    <a class='py4 px4 db h100 c12' href='<?php echo $fl_btn_url; ?>'>
      <h2 class='fsA mb3 px2 pt4'><?php echo $fl_title; ?></h2>
      <div class='c12 pb4'>
        <div class='btn dib'><?php echo $fl_btn_title; ?></div> 
      </div>
    </a>
  </div> 

  <div class='c6 h100'>
    <a class='py4 px4 db c12 h100' href='<?php echo $fr_btn_url; ?>'>
      <h2 class='fsA mb3 px2 pt4'><?php echo $fr_title; ?></h2>
      <div class='c12 pb4'>
        <div class='btn dib'><?php echo $fr_btn_title; ?></div> 
      </div>
    </a>
  </div> 
</section>
<?php get_footer(); ?>
