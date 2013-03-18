<?php

/**
 * @file
 * A payment method plugin for Ubercart.
 */

/**
 * Define this Export UI plugin.
 */
$plugin = array(
  'id' => 'test_payment_method',
  'name' => t('Test payment method'),
  'title' => t('Use test payment method:'),
  //'review' => variable_get('uc_alipay_check', FALSE) ? t('实物担保结算') : t('即时结算'),
  'review' => t('Test payment method1'),
  'desc' => t('Use test payment method to process payment.'),
  'callback' => 'uc_payment_method_test_payment_method',
  'weight' => 3,
  'checkout' => TRUE,
  'no_gateway' => TRUE,
);

// Adds 2Checkout settings to the payment method settings form.
function uc_payment_method_test_payment_method($op, &$arg1) {
  switch ($op) {
    case 'cart-details':
      return ;

    case 'cart-process':
      //drupal_set_message('method:'.$_POST['pay_method']);
      $_SESSION['pay_method'] = isset($_POST['pay_method'])?$_POST['pay_method']:'test_payment_method';
      //$_SESSION['pay_method'] = 'test_payment_method';
      return;

    case 'settings':
      $form['uc_ctools_example_partner'] = array(
        '#type' => 'textfield',
        '#title' => t('partner'),
        '#description' => t('Your partner number.'),
        '#default_value' => variable_get('uc_ctools_example_partner', ''),
        '#size' => 16,
      );
      $form['uc_ctools_example_security_code'] = array(
        '#type' => 'textfield',
        '#title' => t('Security code'),
        '#description' => t('Your security code.'),
        '#default_value' => variable_get('uc_ctools_example_security_code', ''),
        '#size' => 16,
      );
      $form['uc_ctools_example_seller_email'] = array(
        '#type' => 'textfield',
        '#title' => t('Your account.'),
        '#default_value' => variable_get('uc_ctools_example_seller_email', ''),
      );
     
      return $form;
  }
}


