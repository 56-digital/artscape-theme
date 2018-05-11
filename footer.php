</main>

<aside class='c12 asfe'>
  <footer class='c12 x xw xac xjb bt1lg'>
    <section class='c4 tac px2 py2'>
      <div class='logo'>
        <a href='<?php echo get_bloginfo('url');?>'><img class='c12' src='<?php echo get_template_directory_uri(); ?>/assets/logo.png' alt='Artscape Daniels Launchpad'></a>
      </div>
    </section>

    <section class='c4'>
      <nav class='x xw xac xjb c12'>
        <?php 
          $mainNav = wp_get_nav_menu_items('footer'); 

          foreach ($mainNav as $navItem) {
            echo '<div class="nav-item"><a href="' . $navItem->url . '">' . $navItem->title . '</a></div>';
          }
        ?>
      </nav>
    </section>

    <section class='c4 px4 py2'>
      <div class='c12 ttu'>
        <label for='submit'>Enter your email for updates</label>
        <input class='c12' type='email' />
        <button type='submit'>Submit</button>
      </div>
    </section>
  </footer>
</aside>

</div>

<?php wp_footer(); ?>
</body>
</html>
