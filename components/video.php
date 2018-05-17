<?php
  $video_file = get_sub_field('file');
  $video_image = get_sub_field('video_placeholder');
?>

<section sm='py2' class='c12 py4'>
  <div sm='px1' class='mxa mw70 px4'>
    <div class='video h100 c12 oh psr'>
      <video data-src='<?php echo $video_file; ?>' muted loop class='c12 h100 ofc'></video>
        <figure class='psa t0 l0 c12 h100 oh curp'>
          <picture>
            <source media="(max-width: 799px)" data-srcset="<?php echo $video_image['sizes']['medium'] ?>" type="image/jpeg" />
            <source media="(min-width: 800px)" data-srcset="<?php echo $video_image['url'] ?>" type="image/jpeg" /> 
            <img class='c12 h100 ofc' data-src='<?php echo $video_image['url'] ?>' alt="<?php echo $videoImage['caption'] ?>" />
          </picture> 
          <div class='play-btn psa c curp'>
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
                <path d="M8 5v14l11-7z"/>
                <path d="M0 0h24v24H0z" fill="none"/>
            </svg>
          </div>
      </figure>
    </div> 
  </div>
</section>

