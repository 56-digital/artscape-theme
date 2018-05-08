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
  <section class='c12 psr'>
    <div class='logo px1 z2 py1 psa t0 l0'>
      <a href='<?php echo get_bloginfo('url');?>'><img class='c12' src='<?php echo get_template_directory_uri(); ?>/assets/logo.png' alt='Artscape Daniels Launchpad'></a>
    </div>
    
    <div class='header-img bgc-g psr c12'></div>
  </section>
</header>

<nav class='x xw xac nav z4 bb1lg bt1lg xjb fsC c12 px2 py1'>
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
            array_push($menu_array, '<div class="nav-item nav-child"><a class=" db " href="' . $submenu->url . '">' . $submenu->title . '</a></div>');
          }
        }
      
        if ($bool == true && count($menu_array) > 0) {
          $menu_item = '<div class="nav-item nav-parent psr tac">';
          $menu_item .= '<a class="px1 py1" href="' . $nav_item->url . '">' . $nav_item->title . '</a>';     
          $menu_item .= '<ul class="nav-sub psa cx bgc-w z4 rounded b1lg">';
          $menu_item .= implode($menu_array);
          $menu_item .= '</ul>';
          $menu_item .= '</div>';
        } else {
          $menu_item = '<div class="nav-item"><a class="px1 py1" href="' . $nav_item->url . '">' . $nav_item->title . '</a></div>';
        }

        echo $menu_item;
      }
    }
  ?>
  <div class='search search-btn curp'>Search</div>
</nav>

<main class='c12'>
