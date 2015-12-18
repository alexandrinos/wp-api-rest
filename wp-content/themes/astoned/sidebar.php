<?php 

/**
 * @package Astoned
 */
?>
<div class="sidebar-main">
   
<?php 
if(!dynamic_sidebar('sidebar-1')):?> 
   <div id="archives" class="side1"> 
    <h3 class="widget-title"><?php _e('Archives','Astoned'); ?></h3>
    <ul id="month"><?php wp_get_archives(array('type'=>'monthly')); ?></ul>
   </div>
  
   <div id="meta" class="side1">
   <h3 class="widget-title"><?php _e('Meta','Astoned');?></h3>
   
   <ul id="arrow"> 
    <?php wp_register(); ?>
    <?php wp_meta()?>
    <?php wp_loginout(); ?>
    
   </ul>
    </div>

<?php endif;?>
   
</div>