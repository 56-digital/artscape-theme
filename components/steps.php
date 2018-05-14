<?php
  $s_title = get_sub_field('title');
  $s_text = get_sub_field('text');
?>
<section class='c12'>
  <div class='c12 mxa mw70'>
    <section sm='pt3 pb0' class='tac px1 pt4 pb0 mw30 mxa'>
      <h3 class='c12 tac'><?php echo $s_title; ?></h3>
<?php if ($s_text) : ?><div class='c12'><?php echo $s_text; ?></div><?php endif; ?>
    </section>
    
    <section sm='px0' class='steps c12 px4 py2 x xw'>
      <?php 
        if (have_rows('steps')) : while (have_rows('steps')) : the_row(); 
        $ss_title = get_sub_field('title');
        $ss_text = get_sub_field('text');
      ?>
        <div sm='c12 pt0 pb3' class='step px4 py4 c6'>
          <div class='rounded b1lg px2 py2'>
            <span class='db fsC'>STEP</span>
            <h3><?php echo $ss_title ?></h3>
            <div class='fsC'><?php echo $ss_text; ?></div>
          </div>
        </div> 
      <?php endwhile; endif; ?>    
    </section>
  </div>
</section>

