<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">

  <title>Artscape Launchpad</title>
  <meta name="robots" content="index,follow">
  <meta name="googlebot" content="index,follow">
  <meta name="referrer" content="no-referrer">

  <link rel="stylesheet" href="<?php echo get_template_directory_uri(); ?>/dist/main.css">
  <meta name="theme-color" content="#000">

  <link rel="apple-touch-icon-precomposed" sizes="57x57" href="/assembly/apple-touch-icon-57x57.png" />
  <link rel="apple-touch-icon-precomposed" sizes="114x114" href="/assembly/apple-touch-icon-114x114.png" />
  <link rel="apple-touch-icon-precomposed" sizes="72x72" href="/assembly/apple-touch-icon-72x72.png" />
  <link rel="apple-touch-icon-precomposed" sizes="144x144" href="/assembly/apple-touch-icon-144x144.png" />
  <link rel="apple-touch-icon-precomposed" sizes="60x60" href="/assembly/apple-touch-icon-60x60.png" />
  <link rel="apple-touch-icon-precomposed" sizes="120x120" href="/assembly/apple-touch-icon-120x120.png" />
  <link rel="apple-touch-icon-precomposed" sizes="76x76" href="/assembly/apple-touch-icon-76x76.png" />
  <link rel="apple-touch-icon-precomposed" sizes="152x152" href="/assembly/apple-touch-icon-152x152.png" />
  <link rel="icon" type="image/png" href="/assembly/favicon-196x196.png" sizes="196x196" />
  <link rel="icon" type="image/png" href="/assembly/favicon-96x96.png" sizes="96x96" />
  <link rel="icon" type="image/png" href="/assembly/favicon-32x32.png" sizes="32x32" />
  <link rel="icon" type="image/png" href="/assembly/favicon-16x16.png" sizes="16x16" />
  <link rel="icon" type="image/png" href="/assembly/favicon-128.png" sizes="128x128" />
  <meta name="application-name" content="&nbsp;" />
  <meta name="msapplication-TileColor" content="#FFFFFF" />
  <meta name="msapplication-TileImage" content="mstile-144x144.png" />
  <meta name="msapplication-square70x70logo" content="/assembly/mstile-70x70.png" />
  <meta name="msapplication-square150x150logo" content="/assembly/mstile-150x150.png" />
  <meta name="msapplication-wide310x150logo" content="/assembly/mstile-310x150.png" />
  <meta name="msapplication-square310x310logo" content="/assembly/mstile-310x310.png" />
  <?php wp_head(); ?>
</head>

<body>

<header>
  <section class='c12 px1 py1'>
    <div class='logo'>
      <a href='<?php echo get_bloginfo('url');?>'><img class='c12' src='<?php echo get_template_directory_uri(); ?>/assets/logo.png' alt='Artscape Daniels Launchpad'></a>
    </div>
  </section>
  
  <section class='c12'>
    <nav class='x xw xac xjb c12 px2 py1'>
      <?php 
        $mainNav = wp_get_nav_menu_items('main'); 

        foreach ($mainNav as $navItem) {
          echo '<div class="nav-item"><a href="' . $navItem->url . '">' . $navItem->title . '</a></div>';
        }
      ?>
      <div class='search search-btn curp'>Search</div>
    </nav>
  </section>
</header>
