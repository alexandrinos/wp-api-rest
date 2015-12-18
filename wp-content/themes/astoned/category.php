<?php
/**
 * @package Astoned
 */

get_header(); ?>

		
			<div class="sample-Page">

			<?php if ( have_posts() ) : ?>
                        
				
					<p id="category-choice"><?php
			printf( __( 'Category Archives: %s', 'Astoned' ), single_cat_title( '', false ) );
                        ?></p>

					
				</header>

			
				<?php /* Start the Loop */ ?>
				<?php while ( have_posts() ) : the_post(); ?>

					<?php
						
						get_template_part( 'content', get_post_format() );
					?>

				<?php endwhile; ?>

				

			<?php else : ?>

                        <article>
					
					<?php _e( 'Nothing Found', 'Astoned' ); ?>
					

					<div class="entry-content">
						<p><?php _e( 'Apologies, but no results were found for the requested archive. Perhaps searching will help find a related post.', 'Astoned' ); ?></p>
						<?php get_search_form(); ?>
		
                                        </article>

			<?php endif; ?>
                                        </div>
			
	

<?php get_sidebar();?>
<?php get_footer(); ?>
