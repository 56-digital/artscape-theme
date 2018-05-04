<?php /* Template Name: Homepage */
get_header();

?>

<article>
  <section class='c12 x xw xac xjb px2 py2'>
    <?php 
      $dark_link = get_field('dark_link');
      $darkTitle = $dark_link['title'];
      $darkText = $dark_link['text'];
      $darkBtnTitle = $dark_link['button_title'];
      $darkBtnUrl = $dark_link['button_url'];

      $light_link = get_field('light_link');
      $lightTitle = $light_link['title'];
      $lightText = $light_link['text'];
      $lightBtnTitle = $light_link['button_title'];
      $lightBtnUrl = $light_link['button_url'];

      $video = get_field('video');
      $videoImage = $video['placeholder_image'];
      $videoFile = $video['video_file'];
    ?>

    <div class='c4'>
      <div class='c12 px2 py2 rounded bgc-b c-w tac'>
        <h2 class='mb1'><?php echo $darkTitle; ?></h2>
        <div class='mb1 db'><?php echo $darkText; ?></div>
        <div class='c12 psr'>
          <a class='btn btn-light dib' href='<?php echo $darkBtnUrl; ?>'><?php echo $darkBtnTitle; ?></a> 
        </div>
      </div>

      <div class='c12 px2 py2 rounded tac'>
        <h2 class='mb1'><?php echo $lightTitle; ?></h2>
        <div class='mb1 db'><?php echo $lightText; ?></div>
        <div class='c12 psr'>
          <a class='btn dib' href='<?php echo $lightBtnUrl; ?>'><?php echo $lightBtnTitle; ?></a> 
        </div>
      </div>
    </div>
    
    <div class='c8'>
      <div class='video'>
        <video src='<?php echo $videoFile; ?>' muted autoplay loop class='c12'></video>
      </div> 
    </div>
  </section>

  <section class='marquee c12 psr py4'>
    <h2><?php echo get_field('marquee_text'); ?></h2>
  </section>

  <section class='imageL_textR c12 x xw xac xjc px2 py2'>
    <?php 
      $iLtR = get_field('imageL_textR');
      $iLtRImage = $iLtR['image'];
      $iLtRText = $iLtR['text'];
    ?>
    
    <div class='c6'>
      <picture>
        <source media="(max-width: 799px)" srcset="<?php echo $iLtRImage['sizes']['medium'] ?>" type="image/jpeg" />
        <source media="(min-width: 800px)" srcset="<?php echo $iLtRImage['sizes']['medium'] ?>" type="image/jpeg" /> 
        <img class='c12' src='<?php echo $iLtRImage['sizes']['medium'] ?>' alt="<?php echo $iLtRImage['caption'] ?>" />
      </picture> 
    </div>
    
    <div class='c6 px4'>
      <?php echo $iLtRText; ?>
    </div>
  </section>


  <section class='c12 x xw xac xjc tac'>
    <?php
      $CTAL = get_field('cta_bar_left');
      $CTAL_title = $CTAL['title'];
      $CTAL_hover = $CTAL['hover_text'];
      $CTAL_link = $CTAL['link'];

      $CTAR = get_field('cta_bar_right');
      $CTAR_title = $CTAR['title'];
      $CTAR_hover = $CTAR['hover_text'];
      $CTAR_link = $CTAR['link'];
    ?>
    <div class='c6 psr'>
      <a class='py3 db' href='<?php echo $CTAL_link; ?>'> 
        <div class='fs3-2'><?php echo $CTAL_title; ?></div> 
        <span><?php echo $CTAL_hover ?></span>
      </a>
    </div>

    <div class='c6 psr'>
      <a class='py3 db' href='<?php echo $CTAR_link; ?>'> 
        <div class='fs3-2'><?php echo $CTAR_title; ?></div> 
        <span><?php echo $CTAR_hover ?></span>
      </a>
    </div>
  </section>


  <section class='c12 py4 px2 tac'>
    <?php
      $facilities = get_field('our_facilities');
      $fac_title = $facilities['title'];
      $fac_elements = $facilities['repeating_elements'];
      $fac_link = $facilities['link'];
    ?>
    <h3><?php echo $fac_title; ?></h3>
    <div class='x xw xac xjb py3 lh1-5'>
      <?php 
        foreach($fac_elements as $fac_el) { ?>
        <div class='c4'><?php echo $fac_el['title']; ?></div>
      <?php } ?>
    </div>
    <div class='c12 psr'>
      <a class='btn dib' href='<?php echo $fac_link; ?>'>LEARN MORE ABOUT OUR SPACES</a> 
    </div>
  </section>

  <section class='imageL_textR bgc-g c12 x xw xac xjc px2 py4'>
    <?php 
      $iLtRG = get_field('imageL_textR_grey');
      $iLtRGImage = $iLtRG['image'];
      $iLtRGText = $iLtRG['text'];
    ?>
    
    <div class='c6 px2'>
      <picture>
        <source media="(max-width: 799px)" srcset="<?php echo $iLtRGImage['sizes']['medium'] ?>" type="image/jpeg" />
        <source media="(min-width: 800px)" srcset="<?php echo $iLtRGImage['sizes']['large'] ?>" type="image/jpeg" /> 
        <img class='c12 px4' src='<?php echo $iLtRGImage['sizes']['medium'] ?>' alt="<?php echo $iLtRGImage['caption'] ?>" />
      </picture> 
    </div>
    
    <div class='c6 px2'>
      <?php echo $iLtRGText; ?>
    </div>
  </section>


  <section class='py4 px4'>
    <h3 class='c12 mb1 tac'>RECENT NEWS & UPDATES</h3>
    <div class='c12 x xw xjc xac'>
      <?php 
        $args = array(
          'post_type' => 'news',
          'posts_per_page' => 6
        );

        $newsQuery = new WP_Query($args);
        
        if ($newsQuery->have_posts() ) : while ($newsQuery->have_posts() ) : $newsQuery->the_post();
          get_template_part('components/feed-post'); 
        endwhile; endif;
        if ($newsQuery->have_posts() ) : while ($newsQuery->have_posts() ) : $newsQuery->the_post();
          get_template_part('components/feed-post'); 
        endwhile; endif;
        if ($newsQuery->have_posts() ) : while ($newsQuery->have_posts() ) : $newsQuery->the_post();
          get_template_part('components/feed-post'); 
        endwhile; endif;

        wp_reset_query();
      ?>
    </div> 
    
    <div class='c12 py2 tac'>
      <div class='btn dib btn-dark btn-large curp'>LOAD MORE</div>
    </div>
  </section>
</article>

<?php get_footer(); ?>
