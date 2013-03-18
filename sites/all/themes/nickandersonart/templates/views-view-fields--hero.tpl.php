<?php 
/**
 * @file
 * views fields
 */
?>
<?php foreach($fields as $id => $field) : ?>
  <li><?php print $field->content; ?></li>
<?php endforeach; ?>