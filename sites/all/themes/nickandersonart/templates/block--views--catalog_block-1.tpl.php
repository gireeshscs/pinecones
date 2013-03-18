<?php 
/**
 * @file
 * Modify block (I'm add view all)
 */
?>
<div id="block-<?php print $block->module.'-'.$block->delta; ?>" class="block">   
    <?php if ($block->subject): ?>
    <div class="block_subject">
      <?php print $block->subject; ?>
    </div>
    <span class="view_all">
        <img src="<?php $GLOBALS['base_root'];?>/sites/default/files/view_all.jpg">
        <a href="<?php $GLOBALS['base_root'];?>/products">View All</a>
    </span>    
  <?php endif;?>
  <?php print $content;?>
</div>


