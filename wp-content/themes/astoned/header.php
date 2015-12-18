<?php 
/**
 * @package Astoned
 */
?>
<!DOCTYPE html>
<html <?php language_attributes(); ?>>
    <head>
        <meta charset="<?php bloginfo( 'charset' ); ?>">
         <title><?php wp_title('|', true, 'right'); ?></title>
       
         <link rel="profile" href="http://gmpg.org/xfn/11" />
        
        <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
        <?php if ( is_singular() ) wp_enqueue_script( 'comment-reply' );?>
        <?php wp_head(); ?>
     </head>
    <body <?php body_class(); ?>>
       
        <div class='main-header'>
            <div id='headimg'>
                <h1 class="site-title">
                    <a href="<?php // echo get_option(); ?>">
                        <?php bloginfo('name'); ?></a>
                </h1>
                <div class='site-description'>
                    <?php bloginfo('description');?>
                </div>
            
            </div>
            
        </div>
        
       
   
       <nav id="menu-links">
<?php wp_nav_menu( array( 'theme_location' => 'primary' ) ); ?>
        </nav>
           
	  
  