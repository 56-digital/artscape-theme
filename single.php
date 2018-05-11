<?php get_header(); ?>

<article class='c12'>
  <section class='c12 py4 bb1lg'>
    <?php 
      $intro = get_field('intro');
      $intro_title = $intro['title'] ? $intro['title'] : get_the_title();
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

</article>

<?php get_footer(); ?>
