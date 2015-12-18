<?php 
/**
 * @package Astoned
 */
?>
<?php get_header(); ?>
<div class="sample-Page">


<?php while(have_posts()): the_post();?>
 

     <?php get_template_part('content',  get_post_format()); ?>

<?php comments_template();?>

    <?php endwhile;?>
</div>
<?php get_sidebar(); ?>
<?php  get_footer();?>