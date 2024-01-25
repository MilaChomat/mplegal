<!DOCTYPE html>

<html>

    <head>

        <title><?php echo get_the_title(); ?></title>               

        <meta http-equiv="Content-Type" content="text/html; charset=utf-8">

        <meta name="viewport" content="width=device-width, initial-scale=1.0">   
        
        <meta name="author" content="slovencik.cz">
        
        <link rel="icon" href="/favicon.png" sizes="32x32" />
        <link rel="icon" href="/favicon.png" sizes="192x192" />
        
        <link href="https://fonts.googleapis.com/css?family=Playfair+Display:400,700&subset=latin-ext" rel="stylesheet">
        
        <link href="<?php echo get_template_directory_uri(); ?>/data/css/styles.css" rel="stylesheet" type="text/css">

        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/data/js/jquery-1.11.1.min.js"></script> 

        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/data/js/modernizr.custom.90907.min.js"></script>

        <!--[if lt IE 9]> <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/data/js/selectivizr.min.js"></script><![endif]-->

        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/data/js/respond.min.js"></script>    

        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/data/js/swipe.min.js"></script> 

        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/data/js/slider.js"></script> 

        <script type="text/javascript" src="<?php echo get_template_directory_uri(); ?>/data/js/scripts.js"></script>
        
        
        
        <?php wp_head(); ?>

    </head>
    
    <body>
    
    <header class="header">
               
        
        <h1 style="display: none;"><?php echo get_the_title(); ?></h1>            
        
        <div class="container">
            
            <a href="/" class="logo">
                <img src="<?php echo get_template_directory_uri(); ?>/data/images/logo.png" alt="<?php echo get_the_title(); ?>" />
            </a>
            
            <span class="menu-burger"></span>
            
            <nav>
                <?php dynamic_sidebar("main-menu"); ?>
            </nav>
            
        </div>
        
        
    </header>