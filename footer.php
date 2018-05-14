</main>

<aside class='c12 asfe'>
  <footer class='c12 x xw xac xjb bt1lg'>
    <section sm='c12 xo3' class='c4 tac footer-logo br1lg'>
      <div class='logo mb1 dib tac'>
        <a class='dib' href='<?php echo get_bloginfo('url');?>'><img class='c12' src='<?php echo get_template_directory_uri(); ?>/assets/logo.png' alt='Artscape Daniels Launchpad'></a>
      </div>
      <div class='c12 tac ttu footer-text'>
        Artscape Daniels Launchpad All Rights Reserved
      </div>
    </section>

    <section sm='c12 xo1' class='c4 br1lg'>
      <nav class='x xw xac h100 xjb c12'>
        <?php 
          $mainNav = wp_get_nav_menu_items('footer'); 

          foreach ($mainNav as $navItem) {
            echo '<div class="footer-nav-item"><a href="' . $navItem->url . '">' . $navItem->title . '</a></div>';
          }
        ?>
      </nav>
    </section>

    <section sm='c12 xo2' class='c4 nl h100'>
      <div class='c12 ttu x xw xjb xac'>
        <label class='c12' for='submit'>Enter your email for updates</label>
        <input class='xg c9 vam' type='email' />
        <button type='submit' class='c3 vam ttu h100'>Submit</button>
      </div>
    </section>
  </footer>
</aside>

</div>

<?php wp_footer(); ?>

<script defer src='<?php echo get_bloginfo('template_url'); ?>/dist/bundle.js'></script>
</body>
</html>
