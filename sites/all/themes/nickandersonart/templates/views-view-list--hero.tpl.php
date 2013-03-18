<?php 
/**
 * @file
 * views rows
 */
?>
<div id="hero_image">
  <ul>
    <?php foreach($rows as $id => $row) : ?>
      <?php  print $row; ?>
    <?php endforeach; ?>
  </ul>
</div>