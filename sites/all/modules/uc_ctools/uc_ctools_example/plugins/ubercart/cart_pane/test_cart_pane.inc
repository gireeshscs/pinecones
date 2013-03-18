<?php

/**
 * @file
 * A cart pane plugin for Ubercart.
 */
 
/**
 * Define this cart pane plugin.
 */
$plugin = array(
  'title' => t('Test cart pane'),
  'enabled' => FALSE,
  'weight' => 0,
  'body' => uc_ctools_example_test_cart_pane(),
);

/**
 *  Callback function of cart pane plugin.
 */
function uc_ctools_example_test_cart_pane() {
  $items = uc_cart_get_contents();
  $body = NULL;
  //$body = array('title' => t('Test cart pane'), 'data' => t('Test cart pane data'));
  $body = drupal_get_form('uc_cart_pane_quotes', $items);;
  return $body;
}