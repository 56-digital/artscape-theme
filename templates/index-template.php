<?php /* Template Name: Homepage */
get_header();

?>

  <section class='c12 '>
    <?php 
      $dark_link = get_field('dark_link');
      $darkTitle = $dark_link['title'];
      $darkText = $dark_link['text'];

      $d_btn = $dark_link['button'];
      $d_btn_title = $d_btn['title'] ? $d_btn['title'] : $d_btn['url'];
      $d_btn_url = $d_btn['url'];
      $d_btn_target = $d_btn['target'] ? $d_btn['target'] : '_self';

      $light_link = get_field('light_link');
      $lightTitle = $light_link['title'];
      $lightText = $light_link['text'];
      $light_img = $light_link['image'];

      $l_btn = $light_link['button'];
      $l_btn_title = $l_btn['title'] ? $l_btn['title'] : $l_btn['url'];
      $l_btn_url = $l_btn['url'];
      $l_btn_target = $l_btn['target'] ? $l_btn['target'] : '_self';


      $video = get_field('video');
      $videoImage = $video['placeholder_image'];
      $videoFile = $video['video_file'];
    ?>
    <div sm='px0 py1' class='x xw xjb px2 py2 mw70 mxa'>
      <div sm='c12 px1 pr0' class='c4 pr2'>

        <a href='<?php echo $d_btn_url; ?>' target='<?php echo $d_btn_target; ?>' class='c12 db px2 py2 rounded mb1 bgc-b c-w tac'>
          <h2 class='mb1'><?php echo $darkTitle; ?></h2>
          <div class='mb1 db'><?php echo $darkText; ?></div>
          <div class='c12 psr'>
            <div class='btn btn-light dib'><?php echo $d_btn_title; ?></div> 
          </div>
        </a>

        <a href='<?php echo $l_btn_url ?>' target='<?php echo $l_btn_target; ?>' sm='mb2' class='c12 db px2 py2 b1lg rounded tac'>
          <h2 class='mb1'><?php echo $lightTitle; ?></h2>
          <div class='c12'><img class='c12 mb1 light-img' src='<?php echo $light_img; ?>'/></div>
          <div class='mb1 db'><?php echo $lightText; ?></div>
          <div class='c12 psr'>
            <div class='btn dib'><?php echo $l_btn_title; ?></div> 
          </div>
        </a>
      </div>
      
      <div sm='c12' class='c8'>
        
        <?php if ($videoFile) : ?>
          <div class='video h100 oh c12 psr'>
            <video data-src='<?php echo $videoFile; ?>' loop class='c12 h100 ofc'></video>
            <figure class='psa t0 l0 c12 h100 oh curp'>
              <picture>
                <source media="(max-width: 799px)" data-srcset="<?php echo $videoImage['sizes']['medium'] ?>" type="image/jpeg" />
                <source media="(min-width: 800px)" data-srcset="<?php echo $videoImage['url'] ?>" type="image/jpeg" /> 
                <img class='c12 h100 ofc op0 t-o' data-src='<?php echo $videoImage['url'] ?>' alt="<?php echo $videoImage['caption'] ?>" />
              </picture> 
              <div class='play-btn psa c curp'>
                <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                    <path d="M8 5v14l11-7z"/>
                    <path d="M0 0h24v24H0z" fill="none"/>
                </svg>
              </div>
            </figure>
          </div> 
        <?php else : ?>
          <div class='video-no-vid h100 oh c12 psr'>
            <figure class='psa t0 l0 c12 h100 oh'>
              <picture>
                <source media="(max-width: 799px)" data-srcset="<?php echo $videoImage['sizes']['medium'] ?>" type="image/jpeg" />
                <source media="(min-width: 800px)" data-srcset="<?php echo $videoImage['url'] ?>" type="image/jpeg" /> 
                <img class='c12 h100 ofc op0 t-o' data-src='<?php echo $videoImage['url'] ?>' alt="<?php echo $videoImage['caption'] ?>" />
              </picture> 
            </figure>
          </div> 
        <?php endif; ?>
      </div>
    </div>
  </section>

  <section sm='pt2 pb0' class='marquee marquee3k c12 psr pt4 pb2 oh' data-speed='5'>
    <h2 sm='fsB'><?php echo get_field('marquee_text'); ?></h2>
  </section>

  <section class='imageL_textR mb2'>
    <div sm='px1 py2' class='c12 x xw xac xjc px2 py4 mw70 mxa'>
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
          <img class='c12 op0 t-o' data-src='<?php echo $iLtRImage['url'] ?>' alt="<?php echo $iLtRImage['caption'] ?>" />
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
    <div class='c6 psr bt1lg bb1lg br1lg'>
      <a class='py3 db psr h-parent' href='<?php echo $CTAL_link; ?>'> 
        <div class='fsA'><?php echo $CTAL_title; ?></div> 
        <span class='psa c c12 op0 h-child'><?php echo $CTAL_hover ?></span>
      </a>
    </div>

    <div class='c6 psr bt1lg bb1lg'>
      <a class='py3 db psr h-parent' href='<?php echo $CTAR_link; ?>'> 
        <div class='fsA'><?php echo $CTAR_title; ?></div> 
        <span class='psa c c12 op0 h-child'><?php echo $CTAR_hover ?></span>
      </a>
    </div>
  </section>


  <section sm='mt0 px1 py3' class='c12 py4 mt2 px2 tac bb1lg'>
    <div class='c12 mxa mw70'>
      <?php
        $facilities = get_field('our_facilities');
        $fac_title = $facilities['title'];
        $fac_text = $facilities['text'];
        $fac_elements = $facilities['repeating_elements'];

        $fac_btn = $facilities['button'];
        if ($fac_btn) {
          $fac_btn_title = $fac_btn['title'] ? $fac_btn['title'] : $fac_btn['url'];
          $fac_btn_url = $fac_btn['url'];
          $fac_btn_target = $fac_btn['target'] ? $fac_btn['target'] : '_self';
        }
      ?>
      <h3><?php echo $fac_title; ?></h3>
      <div sm='px0' class='c12 tac mw50 mb1 mxa px2'><?php echo $fac_text; ?></div>
      <div sm='py1' class='x xw xac xjb py2 mb lh1-5'>
        <?php 
          foreach($fac_elements as $fac_el) { ?>
          <div sm='c12' class='c4 fsB'><?php echo $fac_el['title']; ?></div>
        <?php } ?>
      </div>
      <div class='c12 psr mb2'>
        <a class='btn dib mt1' target='<?php echo $fac_btn_target; ?>' href='<?php echo $fac_btn_url; ?>'><?php echo $fac_btn_title; ?></a>
      </div>
    </div>
  </section>

  
  <section sm='py2 px1' class='py4 px4 bb1lg'>
    <h3 class='c12 mb1 tac'>RECENT NEWS & UPDATES</h3>
    <div class='c12 x xw xjc'>
      <?php 
        $args = array(
          'post_type' => 'news',
          'posts_per_page' => 6,
        );

        $newsQuery = new WP_Query($args);
        
        if ($newsQuery->have_posts() ) : while ($newsQuery->have_posts() ) : $newsQuery->the_post();
          get_template_part('components/feed-post'); 
        endwhile; endif;

        wp_reset_query();
      ?>
    </div> 
    
<!--     <div class='c12 py2 tac'>
      <div class='btn dib btn-dark btn-large curp'>LOAD MORE</div>
    </div> -->
  </section>


  <section class='c12 bgc-g bb1lg'>
    <div sm='px1' class='mw50 mxa px4 py4'> 
      <form class='form-footer tac mb1' action='https://artscapedanielslaunchpad.us2.list-manage.com/subscribe/post' method='POST'>
        <h3 class='c12 tac mb2'>GET THE LATEST ON ALL LAUNCHPAD HAPPENINGS. </br> SIGN UP FOR OUR NEWSLETTER.
        </h3>
        <label class='c12 tac ttu index-label mb1' for='MERGE0'>Enter your email for updates</label>
        <input type="hidden" name="u" value="acd254ffeee86eb9309101abc">
        <input type="hidden" name="id" value="f15f612599">
        <input class='xg 12 vam mb1 db c9 mxa tac' name='MERGE0' id='MERGE0' type='email' />
        <button type='submit' class='btn btn-dark btn-large tac mt1 mxa' name='submit' value='Subscribe to list' class='c3 vam ttu h100'>Submit</button>
      </form>
    </div>
  </section>

  <section sm='py1' class='py2 px2 tac '>
    <h3 class='pt2'>OUR PARTNERS & SPONSORS</h3>
    <div sm='py1' class='c12 mxa mw70 sponsors-logos py2'>
      <?php
        $sponsors = get_field('sponsors');
        $icons = $sponsors['icons'];

        $s_btn = $sponsors['button'];
        if ($s_btn) {
          $s_btn_title = $s_btn['title'] ? $s_btn['title'] : $s_btn['url'];
          $s_btn_url = $s_btn['url'];
          $s_btn_target = $s_btn['target'] ? $s_btn['target'] : '_self';
        }
        
        foreach($icons as $icon) {  ?>
          <div class='dib px1 py1'><img class='h100 op0 t-o' data-src='<?php echo $icon['icon']['sizes']['large']; ?>'/></div> 
        <?php } ?>
    </div>
    <div class='c12 py2 px2 tac'>
      <a class='btn dib' target='<?php echo $s_btn_target; ?>' href='<?php echo $s_btn_url; ?>'><?php echo $s_btn_title; ?></a
    </div>
  </section>

<?php get_footer(); ?>
