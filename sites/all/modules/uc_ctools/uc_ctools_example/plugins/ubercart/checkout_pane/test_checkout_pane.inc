<?php

/**
 * @file
 * A checkout pane plugin for Ubercart.
 */
/**
 * Define this checkout paneI plugin.
 */
$plugin = array(
  'callback' => 'uc_ctools_example_checkout_pane_test',
  'title' => t('Test checkout pane'),
  'desc' => t('Test checkout pane description.'),
  'weight' => 10,
);

/**
 * Test checkout pane callback function.
 */
function uc_ctools_example_checkout_pane_test($op, $order, $form = NULL, &$form_state = NULL) {
  switch ($op) {
    case 'view':
      $description = t('Test checkout pane description.');

      $contents['test_checkout_pane'] = array(
        '#type' => 'textarea',
        '#title' => t('Test checkout pane'),
      );

      return array('description' => $description, 'contents' => $contents);

    case 'process':
      //process logic
      return TRUE;

    case 'review':
      $review = NULL;
      $review[] = array('title' => t('Test checkout pane'), 'data' => t('Test checkout pane data'));
      return $review;
  }
}

