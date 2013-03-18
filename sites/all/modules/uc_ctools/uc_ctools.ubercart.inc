<?php

/**
 * @file Includes any ubercart integration provided by the module.
 */

/**
 * Implementation of hook_uc_payment_method().
 */
function uc_ctools_uc_payment_method() {
  ctools_include('plugins');
  $payment_method_plugins = ctools_get_plugins('uc_ctools', 'payment_method');
  //print debug($payment_method_plugins);
  return $payment_method_plugins;
}

/**
 * Implementation of hook_uc_shipping_method().
 */
function uc_ctools_uc_shipping_method() {
  ctools_include('plugins');
  $shipping_method_plugins = ctools_get_plugins('uc_ctools', 'shipping_method');

  return $shipping_method_plugins;
}

/**
 * Implementation of hook_uc_payment_gateway().
 */
function uc_ctools_uc_payment_gateway() {
  ctools_include('plugins');
  $payment_gateway_plugins = ctools_get_plugins('uc_ctools', 'payment_gateway');

  return $payment_gateway_plugins;
}

/**
 * Implementation of hook_uc_checkout_pane().
 */
function uc_ctools_uc_checkout_pane() {
  ctools_include('plugins');
  $checkout_pane_plugins = ctools_get_plugins('uc_ctools', 'checkout_pane');

  return $checkout_pane_plugins;
}

/**
 * Implementation of hook_uc_cart_pane().
 */
function uc_ctools_uc_cart_pane($items) {
  ctools_include('plugins');
  $cart_pane_plugins = ctools_get_plugins('uc_ctools', 'cart_pane');

  return $cart_pane_plugins;
}

/**
 * Implementation of hook_uc_order_pane().
 */
function uc_ctools_uc_order_pane() {
  ctools_include('plugins');
  $order_pane_plugins = ctools_get_plugins('uc_ctools', 'order_pane');

  return $order_pane_plugins;
}

/**
 * Implementation of hook_uc_line_item().
 */
function uc_ctools_uc_line_item() {
  ctools_include('plugins');
  $line_item_plugins = ctools_get_plugins('uc_ctools', 'line_item');

  return $line_item_plugins;
}
