<?php
  $video_file = get_sub_field('file');
  $video_image = get_sub_field('video_placeholder');
?>

<section class='c12 py4'>
  <div class='mxa mw70 px4'>
    <div class='video h100 c12 psr'>
      <video src='<?php echo $video_file; ?>' muted loop class='c12 h100 ofc'></video>
      <div class='psa t0 l0 c12 h100 oh curp'>
        <picture>
          <source media="(max-width: 799px)" srcset="<?php echo $video_image['sizes']['medium'] ?>" type="image/jpeg" />
          <source media="(min-width: 800px)" srcset="<?php echo $video_image['url'] ?>" type="image/jpeg" /> 
          <img class='c12 h100 ofc' src='<?php echo $video_image['url'] ?>' alt="<?php echo $videoImage['caption'] ?>" />
        </picture> 
      </div>
    </div> 
  </div>
</section>
