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

<aside class='mob-nav-btn curp psf r0 t0'>
  <svg class='vam' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
    <path d="M0 0h24v24H0z" fill="none"/>
    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
  </svg>
</aside>

<div class='x xw parent'>

<main class='c12 asfs'>
  <header class='c12'>
    <section class='c12 psr'>
      <div class='logo z2 psa t0 l0'>
        <a href='<?php echo get_bloginfo('url');?>'><img class='c12' src='<?php echo get_template_directory_uri(); ?>/assets/logo.png' alt='Artscape Daniels Launchpad'></a>
      </div>
      
      <div class='header-img bgc-g psr c12'></div>
    </section>

  </header>

  <nav class='x xw xjb nav z4 bb1lg bt1lg psr xjb c12'>
    <aside class='mob-nav-btn mob-nav-btn2 curp psa'>
      <svg class='vam' xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24">
          <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
          <path d="M0 0h24v24H0z" fill="none"/>
      </svg>
    </aside>

    <div class='mob-logo db'>
      <div class='logo z2 psa t0 l0'>
        <a href='<?php echo get_bloginfo('url');?>'><img class='c12' src='<?php echo get_template_directory_uri(); ?>/assets/logo.png' alt='Artscape Daniels Launchpad'></a>
      </div>
    </div>
  

    <div class='c12 nav-container mxa x xw xjb xac'>

      <ul class='nav-ul x xw xjb xac br1lg h100'>
        <?php 
          $main_nav = wp_get_nav_menu_items('main'); 

          foreach ($main_nav as $nav_item) {
            if ($nav_item->menu_item_parent == 0) {
              $bool = false;
              $parent = $nav_item->ID;
              $menu_array = array();
       
              foreach ($main_nav as $submenu) {
                if ($submenu->menu_item_parent == $parent) {
                  $bool = true;
                  array_push($menu_array, '<div class="nav-child"><a class=" db " href="' . $submenu->url . '">' . $submenu->title . '</a></div>');
                }
              }
            
              if ($bool == true && count($menu_array) > 0) {
                $menu_item = '<li class="nav-item nav-parent psr tac">';
                $menu_item .= '<a class="" href="' . $nav_item->url . '">' . $nav_item->title . '</a>';     
                $menu_item .= '<ul class="nav-sub psa cx bgc-w z4 rounded b1lg">';
                $menu_item .= implode($menu_array);
                $menu_item .= '</ul>';
                $menu_item .= '</li>';
              } else {
                $menu_item = '<li class="nav-item"><a class="" href="' . $nav_item->url . '">' . $nav_item->title . '</a></li>';
              }

              echo $menu_item;
            }
          }
        ?>
        <li class='nav-item search search-btn curp'>
          <span>Search</span>
          <span class='search-icon '>
            <svg class='vam' viewBox="0 0 24 24">
              <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
              <path d="M0 0h24v24H0z" fill="none"/>
            </svg>
          </span>
        </li>
      </ul>

      <div class='header-links'>
        <?php 
          $header_links = get_field('header_links', 6);
          $hl1_title = $header_links['link1_title'];
          $hl1_url = $header_links['link1_url'];
          $hl2_title = $header_links['link2_title'];
          $hl2_url = $header_links['link2_url'];

          if ($hl1_title) { 
            echo '<a class="dib btn-nav btn btn-dark" href="' . $hl1_url . '">' . $hl1_title . '</a>';
          }

          if ($hl2_title) { 
            echo '<a class="dib btn-nav btn-nav2 btn btn-dark" href="' . $hl2_url . '">' . $hl2_title . '</a>';
          }
        ?>
      </div>
    </div>
  </nav>

