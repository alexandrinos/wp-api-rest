<?php
/**
 * @package Astoned
 */

get_header(); ?>

	<div id="primary">
		<div id="content" role="main">

			<article id="post-0" class="post error404 not-found">
				<header class="entry-header">
					<h1 class="entry-title"><?php _e( 'Sigh, Sorry the page could not be found', 'astoned' ); ?></h1>
				</header>

				<div class="entry-content">
					<p><?php _e( 'Unfortunately there is nothing to be found here, but you may find what you are looking for by using these links or the search bar', 'astoned' ); ?></p>

					<?php get_search_form(); ?>

					<?php the_widget( 'WP_Widget_Recent_Posts'); ?>

					<div class="widget">
						<h2 class="widgettitle"><?php _e( 'Most Used Categories', 'astoned' ); ?></h2>
						<ul>
						<?php wp_list_categories( array( 'orderby' => 'count', 'order' => 'DESC', 'show_count' => 1, 'title_li' => '', 'number' => 10 ) ); ?>
						</ul>
					</div>

					<?php
					
					$archive_content = '<p>' . sprintf( __( 'Try looking in the monthly archives. %1$s', 'astoned' ), convert_smilies( ':)' ) ) . '</p>';
					the_widget( 'WP_Widget_Archives', array('count' => 0 , 'dropdown' => 1 ), array( 'after_title' => '</h2>'.$archive_content ) );
					?>

					<?php the_widget( 'WP_Widget_Tag_Cloud' ); ?>

				</div>
			</article>

		</div>
	</div>

<?php get_footer(); ?>