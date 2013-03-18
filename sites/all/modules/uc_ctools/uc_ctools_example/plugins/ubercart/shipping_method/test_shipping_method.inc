<?php

/**
 * @file
 * A payment method plugin for Ubercart.
 */
/**
 * Define this Export UI plugin.
 */
$plugin = array(
  'id' => 'test_shipping_method',
  'module' => 'uc_ctools_example',
  'title' => 'test payment method',
  'description' => t('test payment method description'),
  'enabled' => TRUE,
  'operations' => array(
  ),
  'quote' => array(
    'type' => 'order',
    'callback' => 'uc_ctools_example_quote_test_payment_method',
    'accessorials' => array(
      'test payment method',
    ),
  ),
);

/**
 * Standard callback to return a shipping rate via the weight quote method.
 *
 * @param $products
 *   The order's products.
 * @param $details
 *   Other order details including a shipping address.
 * @return
 *   A JSON object containing the shipping quote for the order.
 */
function uc_ctools_example_quote_test_payment_method($products, $details, $method) {
  $sum_weight = 0;
  foreach ($products as $product) {
    $sum_weight += $product->weight * $product->qty;
  }
  $shipping_fee = $sum_weight;
  $quotes[] = array(
    'rate' => $shipping_fee, 
    'label' => check_plain('test payment method'),
    'option_label' => check_plain('test payment method')
  );
  return $quotes;
}