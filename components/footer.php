  <?php
    $footer_left = get_field('footer_left');
    $fl_title = $footer_left['title'];
    $fl_btn = $footer_left['button'];
    $fl_btn_title = $fl_btn['title'] ? $fl_btn['title'] : $fl_btn['url'];
    $fl_btn_target = $fl_btn['target'] ? $fl_btn['target'] : '_self';


    $footer_right = get_field('footer_right');
    $fr_title = $footer_right['title'];
    $fr_btn = $footer_right['button'];
    $fr_btn_title = $fr_btn['title'] ? $fr_btn['title'] : $fr_btn['url'];
    $fr_btn_target = $fr_btn['target'] ? $fr_btn['target'] : '_self';
  
  ?> 
<section class='footer-linx tac x xac xw'>
  <div sm='c12' class='c6 h100 br1lg'>
    <a sm='px2 py0 bb1lg' target='<?php echo $fl_btn_target ; ?>' class='py4 px4 db h100 c12' href='<?php echo $fl_btn['url'] ;?>'>
      <h2 sm='mb2 lh1' class='fsA mb3 px2 pt4'><?php echo $fl_title; ?></h2>
      <div class='c12 pb4'>
        <div class='btn dib ttu'><?php echo $fl_btn_title; ?></div> 
      </div>
    </a>
  </div> 

  <div sm='c12' class='c6 h100'>
    <a sm='px2 py0' target='<?php echo $fr_btn_target ; ?>' class='py4 px4 db c12 h100' href='<?php echo $fr_btn['url']; ?>'>
      <h2 sm='mb2 lh1' class='fsA mb3 px2 pt4'><?php echo $fr_title; ?></h2>
      <div class='c12 pb4'>
        <div class='btn dib ttu'><?php echo $fr_btn_title; ?></div> 
      </div>
    </a>
  </div> 
</section>

