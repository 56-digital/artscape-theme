<?php
  $cta_btn = get_sub_field('button');
  $cta_btn_title = $cta_btn['title'] ? $cta_btn['title'] : $cta_btn['url'];
  $cta_btn_url = $cta_btn['url'];
  $cta_btn_target = $cta_btn['target'] ? $cta_btn['target'] : '_self';
?>
<section sm='px1' class='c12 py2 px2 '>
  <div class='c12 tac'>
    <a class='btn dib btn-large btn-dark' target='<?php echo $cta_btn_target; ?>' href='<?php echo $cta_btn_url; ?>'><?php echo $cta_btn_title; ?></a>
  </div>
</section>
