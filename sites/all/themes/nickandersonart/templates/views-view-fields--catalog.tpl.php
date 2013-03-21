<?php
/**
 * @file
 * Default simple view template to all the fields as a row.
 *
 * - $view: The view in use.
 * - $fields: an array of $field objects. Each one contains:
 *   - $field->content: The output of the field.
 *   - $field->raw: The raw data for the field, if it exists. This is NOT output safe.
 *   - $field->class: The safe class id to use.
 *   - $field->handler: The Views field handler object controlling this field. Do not use
 *     var_export to dump this object, as it can't handle the recursion.
 *   - $field->inline: Whether or not the field should be inline.
 *   - $field->inline_html: either div or span based on the above flag.
 *   - $field->wrapper_prefix: A complete wrapper containing the inline_html to use.
 *   - $field->wrapper_suffix: The closing tag for the wrapper.
 *   - $field->separator: an optional separator that may appear before a field.
 *   - $field->label: The wrap label text to use.
 *   - $field->label_html: The full HTML of the label to use including
 *     configured element type.
 * - $row: The raw result object from the query, with all data it fetched.
 *
 * @ingroup views_templates
 */
?>
<?php

//Wrap model image in a coorbox link
    $nid = $row->nid;
    $prefix = '<a class="colorbox-node" href="' .$GLOBALS['base_root'] . '/node/' . $nid. '?width=600&height=880">';
    $sufix = '</a>';
    $image = $fields['field_image']->content;
    $span = '<span class="gaz">    </span>';
    $erlange_pre = '<div class="erlange clearfix">';
    $erlange_suf = '</div>';
    
    $node = node_load($nid);
    $image = field_get_items('node', $node, 'field_image');
    foreach ($image as $key=>$value) {
    $output = field_view_value('node', $node, 'field_image', $image[$key], array(
      'type' => 'image',
      'settings' => array(
        'image_style' => '330x400', //place your image style here
        //'image_link' => 'content',
      ),
    ));
    print $erlange_pre;
        print $prefix;  
        print render($output);
        print $span;
        print $sufix;
    print $erlange_suf;
    
}
?>