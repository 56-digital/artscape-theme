  <?php
    $footer_left = get_field('footer_left');
    $fl_title = $footer_left['title'];
    $fl_text = $footer_left['text'];
    $fl_btn = $footer_left['button'];
    $fl_btn_title = $fl_btn['title'] ? $fl_btn['title'] : $fl_btn['url'];
    $fl_btn_target = $fl_btn['target'] ? $fr_btn['target'] : '_self';


    $footer_right = get_field('footer_right');
    $fr_title = $footer_right['title'];
    $fr_text = $footer_right['text'];
    $fr_btn = $footer_right['button'];
    $fr_btn_title = $fr_btn['title'] ? $fr_btn['title'] : $fr_btn['url'];
    $fr_btn_target = $fr_btn['target'] ? $fr_btn['target'] : '_self';
  
  ?> 
<section class='footer-linx tac x xac xw'>
  <div sm='c12' class='c6 h100 br1lg'>
    <a sm='px2 py0 bb1lg' target='<?php echo $fl_btn_target ; ?>' class='py4 px4 db h100 c12' href='<?php echo $fl_btn_url; ?>'>
      <h2 sm='mb0 pt3' class='fsB px2 pt4 mb0'><?php echo $fl_title; ?></h2>
      <div class='c12 py2'><?php echo $fl_text; ?></div>
      <div class='c12 pb4'>
        <div class='btn dib'><?php echo $fl_btn_title; ?></div> 
      </div>
    </a>
  </div> 

  <div sm='c12' class='c6 h100'>
    <a sm='px2 py0' class='py4 px4 db c12 h100' target='<?php echo $fr_btn_target ; ?>' href='<?php echo $fr_btn_url; ?>'>
      <h2 sm='mb0 pt3' class='fsB px2 pt4 mb0'><?php echo $fr_title; ?></h2>
      <div class='c12 py2'><?php echo $fr_text; ?></div>
      <div class='c12 pb4'>
        <div class='btn dib'><?php echo $fr_btn_title; ?></div> 
      </div>
    </a>
  </div> 
</section>

