<?php
  $h1 = get_sub_field('header_1');
  $h2 = get_sub_field('header_2');
  $h3 = get_sub_field('header_3');
?>

<section sm='py1' class='c12 py4'>
  <div sm='px1' class='mw70 mxa px4'>
    <div sm='fsC' class='x xw xac xjb pb1 mb1 bb1lg fsB'>
      <h3 sm='fsC' class='db mb0 c4'><?php echo $h1; ?></h3>
      <h3 sm='fsC' class='db mb0 c3'><?php echo $h2; ?></h3>
      <h3 sm='fsC' class='db mb0 c3'><?php echo $h3; ?></h3>
    </div> 
    <?php 
      if (have_rows('table')) : while (have_rows('table')) : the_row();
        $c1 = get_sub_field('column_1');
        $c2 = get_sub_field('column_2');
        $c3 = get_sub_field('column_3'); ?>
        <div sm='fsC' class='x xw xac xjb lh1-5 fsB'>
          <div class='db mb0 c4'><?php echo $c1; ?></div>
          <div class='db mb0 c3'><?php echo $c2; ?></div>
          <div class='db mb0 c3'><?php echo $c3; ?></div>
        </div>
<?php 
      endwhile; endif;
    ?>
  </div>
</section>
