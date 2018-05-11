<?php
  $cta_title = get_sub_field('button_title');
  $cta_url = get_sub_field('button_url');
?>
<section class='c12 py2 px2 '>
  <div class='c12 tac'>
    <a class='btn btn-large btn-dark dib' href='<?php echo $cta_url; ?>'><?php echo $cta_title; ?></a> 
  </div>
</section>
