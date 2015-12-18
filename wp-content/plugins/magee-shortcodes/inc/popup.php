<?php
global $magee_shortcodes;

?>
<div class="white-popup magee_shortcodes_container" id="magee_shortcodes_container">
  <form>
   
    <div class="magee_shortcodes_container">
    <ul class="magee_shortcodes_list">
      <?php if(is_array($magee_shortcodes )):foreach($magee_shortcodes as $key => $val){ 	
         if( is_array( $val ) && isset($val['popup_title']) && $val['popup_title']!='' && isset($val['params']) && $val['params'] ):
  ?>
      <li class="col-md-2">
       <a class='magee_shortcode_item <?php //echo $key;?>' title='<?php echo $val['popup_title'];?>' data-shortcode="<?php echo $key;?>" href="javascript:;"> <?php if( isset($val['icon']) ){?><i class="fa <?php echo $val['icon'];?>"></i> <?php }?> <?php echo str_replace(' Shortcode','',$val['popup_title']);?></a> </li>
      <?php endif;?>
      <?php } ?>
      <?php endif;?>
    </ul>
    <div class="clear"></div>
    </div>
    
    <div id="magee-shortcodes-settings">
      
      <div id="magee-shortcodes-settings-inner"></div>
      <input name="magee-shortcode" type="hidden" id="magee-shortcode" value="" />
      <input name="magee-shortcode-textarea" type="hidden" id="magee-shortcode-textarea" value="" />
      
      <div class="clear"></div>
    </div>
  </form>
  <div class="clear"></div>
</div>