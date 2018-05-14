<?php
  $r_title = get_sub_field('title');
  $r_text = get_sub_field('text');
?>

<section sm='c12 py1' class='c6 dib py4'>
  <div sm='px1 mb0' class='x xw xac xjc mb1 c12 px2'>
    <div class='px2 py2 b1lg rounded'>
      <h3 sm='mb1' class='c12 tac mb2'><?php echo $r_title; ?></h3> 
      <div class='c12 mb2'>
        <?php echo $r_text; ?>
      </div>
    </div>
  </div>
</section>
