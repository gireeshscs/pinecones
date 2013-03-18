<?php

/**
 * @file
 * A line item plugin for Ubercart.
 */
 
/**
 * Define this line item plugin.
 */
$plugin = array(
  'id' => 'test_line_item',
  'title' => t('Test line item'),
  'weight' => 2,
  'stored' => FALSE,
  'add_list' => FALSE,
  'calculated' => FALSE,
  'callback' => 'uc_ctools_example_line_item_test',
);

/**
 *  Callback function of line item plugin.
 */
function uc_ctools_example_line_item_test($op, $order) {
  switch ($op) {
    case 'load':
      $lines[] = array(
        'id' => 'test_line_item',
        'title' => t('Test line item'),
        'amount' => uc_order_get_total($order, TRUE),
      );
      return $lines;
  }
}