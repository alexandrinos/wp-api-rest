<?php

 /**
 * @package Astoned
 */
?>
	<form method="get" action="<?php echo trailingslashit( home_url() ); ?>" class="navbar-form">
		
            <input type="text" class="field" name="s" id="s" placeholder="<?php esc_attr_e( 'Search here', 'Astoned' ); ?>" />
		
                <input type="submit" class="submit" name="submit" id="submit-search" value="<?php esc_attr_e( 'GO', 'Astoned' ); ?>" />
	
        </form>