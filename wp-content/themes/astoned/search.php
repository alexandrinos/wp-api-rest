<?php 
/**
 * @package Astoned
 */
?>

<?php get_header();?>

<div class="search-part">
  
     
        <p id="search-topic"><?php printf( __( 'Search Results for: %s', 'Astoned' ), get_search_query() );?></p>
        
            <?php if(have_posts()): ?>
<?php while(have_posts()): the_post();?>
  <?php get_template_part('content',  get_post_format()); ?>
    
  <?php endwhile; else:?>
<p><?php _e('Sorry, no search matched your criteria.','Astoned'); ?></p>
<?php endif;?>

 
</div>
 <?php get_sidebar();?>
<?php get_footer();?>