<?php 
/**
 * @package Astoned
 * Theme Archives
 */
?>

<?php get_header(); ?>

<div class="archives">
   
    
    <?php if(have_posts()):?>
    <?php if (is_date() ) : ?>

    <p id="archive-choice"><?php printf( __( 'Archives for: %s', 'Astoned' ), get_the_date() ); ?></p>

    <?php endif; ?>

  <?php while(have_posts()): the_post();?>
 
    <?php get_template_part('content',  get_post_format()); ?>
    
  <?php endwhile; else:?>
   <p><?php _e('Sorry, no posts matched your criteria.','Astoned'); ?></p> 
 <?php endif;?>
    

</div>
 <?php get_sidebar();?>
<?php get_footer();?>

