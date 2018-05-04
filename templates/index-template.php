<?php /* Template Name: Homepage */
get_header();

?>

<article>
  <section class='c12 x xw xac xjb px2 py2'>
    <?php 
      $dark_link = get_field('dark_link');
      $darkTitle = $dark_link['title'];
      $darkBtnTitle = $dark_link['button_title'];
      $darkBtnUrl = $dark_link['button_url'];

      $light_link = get_field('light_link');
      $lightTitle = $light_link['title'];
      $lightBtnTitle = $light_link['button_title'];
      $lightBtnUrl = $light_link['button_url'];
    ?>

    <div class='c4'>

    </div>
    
    <div class='c8'>
  
    </div>
  </section>
</article>

<?php get_footer(); ?>
