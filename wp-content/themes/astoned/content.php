<?php 
/**
 * @package Astoned
 */
?>

<article id="single-"<?php the_ID();?>>



    <div class="main-content-style">
        <h2 id="post-title"><a href="<?php the_permalink(); ?>" rel="bookmark" title="Permanent Link to <?php the_title_attribute(); ?>"><?php the_title(); ?></a></h2>
       
        <small><?php astoned_date_time(); ?> by <div id="content-author"><?php the_author_posts_link(); ?></div></small>
 <?php
  if(comments_open()):
     echo '<div id="comment-state">';
      comments_popup_link('Leave a reply','1 comment','See All % comments');
      echo '</div>';
  endif;
  ?>
 <div class="post-content"><?php the_content(); ?></div>
<p class="content-category">Posted in <?php the_category(', '); ?></p>
 

  <?php
				
				$tags_list = get_the_tag_list( '', __( ', ', 'Astoned' ) );
				if ( $tags_list ) :
			?>
 <?php if ( has_post_thumbnail() ) : ?>
           <a href="<?php the_permalink(); ?>"><?php the_post_thumbnail(); ?></a>
	<?php endif; ?>

			<?php printf( __( 'Tagged: %1$s.', 'Astoned' ), $tags_list ); ?>
			<?php endif; // End if $tags_list ?>


<p class="content-editor"><?php edit_post_link(); ?></p>
    </div>

    
</article>