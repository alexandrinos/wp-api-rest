<?php 
/**
 * @package Astoned
 * Text Domain: single
 */
?>
<?php get_header(); ?>

<div class="sample-Page"> 
    <?php if(have_posts()): ?>
  
<?php while(have_posts()): the_post();?>
 
 <?php get_template_part('content',  get_post_format()); ?>
   <span id="previous-post"><?php previous_post_link( '%link', __( '<span class="meta-nav">&larr;</span>%title ') ); ?></span>
  <span id="next-post"><?php next_post_link( '%link', __( '%title <span class="meta-nav">&rarr;</span>') ); ?></span>
   

     <div class="comments_form"><?php comments_template(); ?></div>  
    <?php endwhile; else:?>
<p><?php _e('Sorry, no posts matched your criteria.','Astoned'); ?></p>
<?php endif;?>
    
</div>
  <?php get_sidebar(); ?>
  <?php get_footer();?>