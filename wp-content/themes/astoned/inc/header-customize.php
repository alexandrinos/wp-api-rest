<?php

/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

function set_custom_header() {
	
	add_theme_support( 'custom-header', array(
		'default-text-color'     => '#000000',
		 'wp-head-callback'       => 'custom_header_style',
        ) );
}
add_action( 'after_setup_theme', 'set_custom_header' );


if ( ! function_exists( 'custom_header_style' ) ) :
function custom_header_style() {
	$color = get_header_textcolor();
        
	$default_color = get_theme_support( 'custom-header', 'default-text-color' );
	$header_image = get_header_image();

			
if ( $color == $default_color && empty( $header_image ) )
		return;
	?>
	<style type="text/css">
	<?php if ( 'blank' == $color ) : ?>
		.site-title,
        .site-description ,
        .title
        {
            position: absolute !important;
            clip: rect(1px 1px 1px 1px); /* IE6, IE7 */
            clip: rect(1px, 1px, 1px, 1px);
        }

        <?php if ( empty( $header_image ) ) : // blank *and* no header image ?>
			.site-header .site-branding .title {
				min-height: 0;
				height: 0;
				height: 0;
			}
        <?php endif; ?>

	<?php else : // not blank ?>
        .site-title a,
        .site-title a:hover,
        .site-description
        .title
        {
			color: #<?php echo $color; ?>;
        }
	<?php endif; ?>

	<?php if ( ! empty( $header_image ) ) : ?>
		.site-header .site-branding .title{
			background-color: transparent;
			background-image: url('<?php echo esc_url( $header_image ); ?>');
			background-position: 50% 0;
			background-repeat: no-repeat;
			height: <?php echo absint( get_custom_header()->height ); ?>px;
		}
	<?php endif; ?>
	</style>
	<?php
}
endif;