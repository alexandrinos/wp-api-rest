<?php 
/**
 * @package Astoned
 */
?>

<div id="comments">
	<?php if ( have_comments() ) : ?>
		<?php
			
        printf( __( 'You have: %s', 'Astoned' ), get_comments_number() );
		?>
	<?php elseif ( post_password_required() ) : ?>
		<?php _e( 'This post is password protected. Enter the password to view any comments.', 'Astoned' ); ?>
	</div><!-- #comments -->
	<?php
			return 1;
		endif;
	?>

	<?php if ( have_comments() ) : ?>
		
			

		<?php if ( get_comment_pages_count() > 1 && get_option( 'page_comments' ) ) : // are there comments to navigate through ?>
        <nav>
			<?php _e( 'Comment navigation', 'Astoned' ); ?>
			<?php previous_comments_link( __( '&larr; Older Comments', 'Astoned' ) ); ?>
			<?php next_comments_link( __( 'Newer Comments &rarr;', 'Astoned' ) ); ?>
		</nav>
		<?php endif; // check for comment navigation ?>
	<?php endif; ?>

       <?php wp_list_comments( array( 'callback' => 'astoned_post_comment' ) );?>
        
	<?php if ( comments_open() ) : ?>
		<?php comment_form(array('comment_notes_after' => ' ')); ?>
	<?php elseif ( have_comments() ) : ?>
		<?php _e( 'Comments are closed.', 'Astoned' ); ?>
	<?php endif; ?>

</div><!-- #comments -->