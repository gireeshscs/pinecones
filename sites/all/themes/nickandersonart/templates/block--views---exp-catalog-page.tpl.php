<?php 
/**
 * @file
 * View all for the catalog sidebar filter
 */
?>
<div id="block-<?php print $block->module.'-'.$block->delta; ?>" class="block">
  <?php if ($block->subject): ?>
    <div class="block_subject">
      <?php print $block->subject; ?>
    </div>
   <span class="view_all">
       <a href="<?php $GLOBALS['base_root'];?>/catalog">
            <img src="<?php $GLOBALS['base_root'];?>/sites/default/files/view_all.jpg">
             View All
       </a>
    </span>   
  <?php endif;?>
  <?php  print $content; ?>  
</div>