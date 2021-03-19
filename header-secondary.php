<!DOCTYPE html>
<html <?php language_attributes(); ?>>

<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>" />
    <meta name="viewport" content="width=device-width" />
    <?php wp_head(); ?>
    <link rel="preconnect" href="https://fonts.gstatic.com" />
    <link
        href="https://fonts.googleapis.com/css2?family=Lato:ital,wght@0,400;0,700;1,400;1,700&family=Poppins:wght@100;200;300;400;600;700;900&display=swap"
        rel="stylesheet" />
    <script src="https://kit.fontawesome.com/33391c5587.js" crossorigin="anonymous"></script>
</head>

<body <?php body_class(); ?>>
    <div id="wrapper" class="hfeed">
        <header id="top">
            <div class="top-bar">
                <div class="content-wrapper">
                    <a href="http://mowfni.org/" target="_blank">Back to <span id="mow-text">mowfni.org</span>
                        &#8250;</a>
                </div>
            </div>
            <div class="content-wrapper">
                <!-- Logo -->
                <a href="<?php echo get_home_url(); ?>"><img src="<?php echo get_template_directory_uri(); ?>/img/lime_logo.png"
                    alt="The Meals On Wheels Foundation of Northern Illinois Logo" /></a>
                <!-- Navigation links -->
                <nav id="menu" class="hide-menu">
                    <?php wp_nav_menu( array( 'theme_location' => 'secondary-menu' ) ); ?>
                </nav>
                <!-- Menu Toggler -->
                <i class="fas fa-bars fa-2x" id="menu-toggle-button" onclick="hamburger()"></i>
            </div>
        </header>