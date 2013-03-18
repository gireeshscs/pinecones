<?php

/**
 * @file
 * A order pane plugin for Ubercart.
 */
/**
 * Define this order pane plugin.
 */
$plugin = array(
  'callback' => 'uc_ctools_example_order_pane_test',
  'title' => t('Test order pane'),
  'desc' => t('Test order pane description.'),
  'class' => 'abs-left',
  'weight' => 10,
  'show' => array('view', 'edit', 'invoice', 'customer'),
);

/**
 * Test order pane callback function.
 */
function uc_ctools_example_order_pane_test($op, $order, &$form = NULL, &$form_state = NULL) {
  switch ($op) {
    case 'view':
    case 'customer':
      $build = array('#markup' => t('test order pane customer'));
      return $build;

    case 'edit-form':
      $form['test_order_pane'] = array(
        '#type' => 'textarea',
        '#required' => FALSE,
        '#title' => t('Test order pane'),
      );
      return $form;

    case 'edit-theme':
      $output = '<div id="test_order_pane"></div>';
      return $output . drupal_render($form['test_order_pane']);

    case 'edit-process':
      $changes = array();
      return $changes;
  }
}

