<?php 
/**
 * @package Astoned
 * 
 */
?>

<?php get_header(); ?>
     
<div class="full-page">
  
 <?php if(have_posts()): ?>
   
<?php while(have_posts()): the_post();?>
  <?php get_template_part('content',  get_post_format()); ?>
   
  <?php endwhile; else:?>
<p><?php _e('Sorry, no posts matched your criteria.','Astoned'); ?></p>
<?php endif;?>
     
<?php astoned_paging_nav();?>
</div>

   
    <?php get_sidebar(); ?>
        

        
<?php get_footer(); ?>
