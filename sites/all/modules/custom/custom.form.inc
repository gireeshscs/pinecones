<?php
/**
 * @file
 * Inc file whith form alter
 */
/**
 * implimentation of hook_form_alter()
 */
function custom_form_alter(&$form, &$form_state, $form_id) {
    //Nothing here
}
// add all custom_form_FORM_ID_alter() functions bellow ...

/**
 * Hide label and first --ALL-- item
 * Implement hook_form_ID_alter()
 * @param type $form
 * @param type $form_state
 * @param type $form_id
 */

function custom_form_views_exposed_form_alter(&$form, &$form_state, $form_id) {
    if ($form_id == 'views_exposed_form' && $form_state['view']->name == 'catalog') {
            $form['#info']['filter-tid']['label'] = t('');
            $form['tid']['#options']['All'] = t('');
    }
   return $form;
}

/**
 * Implement hook_theme()
 * @param type $vars
 * @return string
 */
function nickandersonart_select_as_links($vars) {
  $element = $vars['element'];

  $output = '';
  $name = $element['#name'];

  // Collect selected values so we can properly style the links later
  $selected_options = array();
  if (empty($element['#value'])) {
    if (!empty($element['#default_values'])) {
      $selected_options[] = $element['#default_values'];
    }
  }
  else {
    $selected_options[] = $element['#value'];
  }

  // Add to the selected options specified by Views whatever options are in the
  // URL query string, but only for this filter
  $urllist = parse_url(request_uri());
  if (isset($urllist['query'])) {
    $query = array();
    parse_str(urldecode($urllist['query']), $query);
    foreach ($query as $key => $value) {
      if ($key != $name) {
        continue;
      }
      if (is_array($value)) {
        // This filter allows multiple selections, so put each one on the selected_options array
        foreach ($value as $option) {
          $selected_options[] = $option;
        }
      }
      else {
        $selected_options[] = $value;
      }
    }
  }

  // Clean incoming values to prevent XSS attacks
  if (is_array($element['#value'])) {
    foreach ($element['#value'] as $index => $item) {
      unset($element['#value'][$index]);
      $element['#value'][filter_xss($index)] = filter_xss($item);
    }
  }
  elseif (is_string($element['#value'])) {
    $element['#value'] = filter_xss($element['#value']);
  }

  // Go through each filter option and build the appropriate link or plain text
  foreach ($element['#options'] as $option => $elem) {
    // Check for Taxonomy-based filters
    if (is_object($elem)) {
      $slice = array_slice($elem->option, 0, 1, TRUE);
      list($option, $elem) = each($slice);
    }
    
    $element_set = array();
    if (is_array($elem)) {
      $element_set = $elem;
    }
    else {
      $element_set[$option] = $elem;
    }

    $links = array();
    $multiple = !empty($element['#multiple']);

    foreach ($element_set as $key => $value) {
      // Custom ID for each link based on the <select>'s original ID
      $id = drupal_html_id($element['#id'] . '-' . $key);
      $elem = array(
        '#id' => $id,
        '#markup' => '',
        '#type' => 'bef-link',
        '#name' => $id,
      );
      if (array_search($key, $selected_options) === FALSE) {

      $qur = db_select('taxonomy_term_data', 't')
                ->fields('t', array('tid'))
                ->condition('t.name', $value, '=')
                ->execute()
                ->fetchField();
      
      $q = (taxonomy_term_load($qur));
            if ($q != FALSE) {
              // Get term id from database and rendering image  
              $image = render(field_view_field('taxonomy_term', $q, 'uc_catalog_image', $display = array()));
              $elem['#children']  = '<div class="cat_filter_image">';
              $elem['#children']  .= '<a href=" ' . current_path() . '?tid=' . $qur . '">';
              $elem['#children'] .= $image;
              $elem['#children'] .= '<a>'; 
              $elem['#children'] .= '</div>';
            }
           
        $elem['#children'] .= l($value, bef_replace_query_string_arg($name, $key, $multiple));
        $output .= theme('form_element', array('element' => $elem));
        
      } 
        elseif ($element['#value'] != 'All') {
              // Get term id from database and rendering image    
              $qi = (taxonomy_term_load($element['#value']));
              $image = render(field_view_field('taxonomy_term', $qi, 'uc_catalog_image', $display = array()));
              $elem['#children']  = '<div class="cat_filter_image">';         
              $elem['#children'] .= $image;
              $elem['#children'] .= '</div>';
            
        $elem['#children'] .= l($value, bef_replace_query_string_arg($name, $key, $multiple, TRUE));
        _form_set_class($elem, array('bef-select-as-links-selected'));
        $output .= str_replace('form-item', 'form-item selected', theme('form_element', array('element' => $elem)));
      }
    }
  }

  $properties = array(
    '#description' => isset($element['#bef_description']) ? $element['#bef_description'] : '',
    '#children' => $output,
  );

  $output = '<div class="bef-select-as-links">';
  $output .= theme('form_element', array('element' => $properties));
  if (!empty($element['#value'])) {
    if (is_array($element['#value'])) {
      foreach ($element['#value'] as $value) {
        $output .= '<input type="hidden" name="' . $name . '[]" value="' . $value . '" />';
      }
    }
    else {
      $output .= '<input type="hidden" name="' . $name . '" value="' . $element['#value'] . '" />';
    }
  }
  $output .= '</div>';
  return $output;
}

/**
 * Implementation hook_form_ID_alter()
 * @param type $form
 * @param type $form_state
 * @param type $form_id
 * @return string
 */
function custom_form_search_block_form_alter(&$form, &$form_state, $form_id) {
    if ($form_id == 'search_block_form') {
        $form['search_block_form']['#title'] = t('Search');
        $form['search_block_form']['#title_display'] = 'invisible';
        $form['search_block_form']['#default_value'] = t('Search');
        $form['search_block_form']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Search';}";
        $form['search_block_form']['#attributes']['onfocus'] = "if (this.value == 'Search') {this.value = '';}";
    }
    return $form;
}

function custom_form_user_register_form_alter(&$form, &$form_state, $form_id) {
    $form['account']['mail']['#default_value'] = t('Email Signup');
    $form['account']['mail']['#attributes']['onblur'] = "if (this.value == '') {this.value = 'Email Signup';}";
    $form['account']['mail']['#attributes']['onfocus'] = "if (this.value == 'Email Signup') {this.value = '';}";
    return $form; 
}

/**
 * Implementtation hook_form_ID_alter() 
 * 
 * @param array $form
 * @param type $form_state
 * @param type $form_id
 */
function custom_form_webform_client_form_10_alter(&$form, &$form_state, $form_id) {
    $form['actions']['submit']['#value'] = 'send message';
}

function custom_form_search_form_alter(&$form, &$form_state, $form_id){
  if ($form_id == 'search_form'){
      //hide advanced search form
      hide($form);
  }
}


/*
function custom_form_uc_form_alter(&$form, &$form_state, $form_id) {
  if (strpos($form_id, 'add_to_cart_form') || $form_id == 'uc_order_add_product_form') {
    $use_ajax = strpos($form_id, 'add_to_cart_form') && variable_get('uc_product_update_node_view', FALSE);
    $node =& $form['node']['#value'];
    $id = $form_id . '-' . $node->nid . '-attributes';
    // If the node has a product list, add attributes to them.
    if (isset($form['products']) || isset($form['sub_products'])) {
      if (isset($form['products'])) {
        $element = &$form['products'];
      }
      else {
        $element = &$form['sub_products'];
      }
      foreach (element_children($element) as $key) {
        $element[$key]['attributes'] = _uc_attribute_alter_form($id . '-' . $key, $node->products[$key], $use_ajax);

        if (is_array($element[$key]['attributes'])) {
          $element[$key]['attributes']['#tree'] = TRUE;
          $element[$key]['#type'] = 'fieldset';
        }
      }
    }
    // If not, add attributes to the node.
    else {
      $form['attributes'] = _uc_attribute_alter_form($id, $node, $use_ajax);

      if (is_array($form['attributes'])) {
        $form['attributes']['#tree'] = TRUE;
        $form['attributes']['#weight'] = -1;
      }
    }
  }
}
*/


