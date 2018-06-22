<?php /* Template Name: Community */
get_header();
?>

<section sm='py2' class='c12 pt4 pb4 '>
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
    <section sm='py1' class='c12 py2 bt1lg'>
      <div sm='px1' class='mxa mw70 px2 py2'>
        <h3 class='ttu c12 tac'><?php echo $cp_title; ?></h3>
        <div sm='px0' class='c12 mw50 px2 tac mxa'><?php echo $cp_text; ?></div>
  
        <div sm='pb0' class='c12 x xw xjb py2'>
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
              <div sm='c12 px2 pt1 pb2' class='person c4 px1 py1'>
                <picture>
                  <source media="(max-width: 799px)" data-srcset="<?php echo $m_image['sizes']['medium'] ?>" type="image/jpeg" />
                  <source media="(min-width: 800px)" data-srcset="<?php echo $m_image['url'] ?>" type="image/jpeg" /> 
                  <img class='c12 mb1' data-src='<?php echo $m_image['url'] ?>' alt="<?php echo $m_image['caption'] ?>" />
                </picture> 
                <div class='c12 mb1'>
                  <h2 class='mb0'><?php echo $m_name; ?></h2>
                  <span class='db fsC'><?php echo $m_title; ?></span>
                </div>

                <div class='c12 fsC mb1'><?php echo $m_text; ?></div>
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
  
          <div class='c12 tac mb1'>
            <a class='btn btn-dark btn-large dib ttu' href='<?php echo $cp_url ?>'>View All</a> 
          </div>  

        
        <?php if ($cp_title == 'Program Alumni') : ?>
          <div class='c12 tac'>
            <a class='btn btn-dark btn-large dib ttu' href='<?php echo get_bloginfo('url'); ?>/programs'>View Programs</a> 
          </div>
        <?php endif; ?>
      
      </div>
    </section>
  <?php
    endwhile; endif;
  ?>
</section>


<section sm='py3 px1' class='imageL_textR bgc-g bt1lg bb1lg c12 px2 py4 mb2'>
  <div class='c12 x xw xac xjc mxa mw70'>
    <?php 
      $iLtRG = get_field('imageL_textR_grey');
      $iLtRGImage = $iLtRG['image'];
      $iLtRGText = $iLtRG['text'];
    ?>
    
    <div sm='c12 mb2' class='c5 px2'>
      <picture>
        <source media="(max-width: 799px)" data-srcset="<?php echo $iLtRGImage['sizes']['medium'] ?>" type="image/jpeg" />
        <source media="(min-width: 800px)" data-srcset="<?php echo $iLtRGImage['sizes']['large'] ?>" type="image/jpeg" /> 
        <img class='c12 px4 op0 t-o' data-src='<?php echo $iLtRGImage['sizes']['medium'] ?>' alt="<?php echo $iLtRGImage['caption'] ?>" />
      </picture> 
    </div>
    
    <div sm='c12 px0' class='c7 px2'>
      <?php echo $iLtRGText; ?>
    </div>
  </div>
</section>




<?php 
  if (get_field('footer_left')) {
    get_template_part('components/footer');
  }
?>


<?php get_footer(); ?>
