<?php
/**
 * @file
 * Contains the theme's functions to manipulate Drupal's default markup.
 *
 * A QUICK OVERVIEW OF DRUPAL THEMING
 *
 *   The default HTML for all of Drupal's markup is specified by its modules.
 *   For example, the comment.module provides the default HTML markup and CSS
 *   styling that is wrapped around each comment. Fortunately, each piece of
 *   markup can optionally be overridden by the theme.
 *
 *   Drupal deals with each chunk of content using a "theme hook". The raw
 *   content is placed in PHP variables and passed through the theme hook, which
 *   can either be a template file (which you should already be familiary with)
 *   or a theme function. For example, the "comment" theme hook is implemented
 *   with a comment.tpl.php template file, but the "breadcrumb" theme hooks is
 *   implemented with a theme_breadcrumb() theme function. Regardless if the
 *   theme hook uses a template file or theme function, the template or function
 *   does the same kind of work; it takes the PHP variables passed to it and
 *   wraps the raw content with the desired HTML markup.
 *
 *   Most theme hooks are implemented with template files. Theme hooks that use
 *   theme functions do so for performance reasons - theme_field() is faster
 *   than a field.tpl.php - or for legacy reasons - theme_breadcrumb() has "been
 *   that way forever."
 *
 *   The variables used by theme functions or template files come from a handful
 *   of sources:
 *   - the contents of other theme hooks that have already been rendered into
 *     HTML. For example, the HTML from theme_breadcrumb() is put into the
 *     $breadcrumb variable of the page.tpl.php template file.
 *   - raw data provided directly by a module (often pulled from a database)
 *   - a "render element" provided directly by a module. A render element is a
 *     nested PHP array which contains both content and meta data with hints on
 *     how the content should be rendered. If a variable in a template file is a
 *     render element, it needs to be rendered with the render() function and
 *     then printed using:
 *       <?php print render($variable); ?>
 *
 * ABOUT THE TEMPLATE.PHP FILE
 *
 *   The template.php file is one of the most useful files when creating or
 *   modifying Drupal themes. With this file you can do three things:
 *   - Modify any theme hooks variables or add your own variables, using
 *     preprocess or process functions.
 *   - Override any theme function. That is, replace a module's default theme
 *     function with one you write.
 *   - Call hook_*_alter() functions which allow you to alter various parts of
 *     Drupal's internals, including the render elements in forms. The most
 *     useful of which include hook_form_alter(), hook_form_FORM_ID_alter(),
 *     and hook_page_alter(). See api.drupal.org for more information about
 *     _alter functions.
 *
 * OVERRIDING THEME FUNCTIONS
 *
 *   If a theme hook uses a theme function, Drupal will use the default theme
 *   function unless your theme overrides it. To override a theme function, you
 *   have to first find the theme function that generates the output. (The
 *   api.drupal.org website is a good place to find which file contains which
 *   function.) Then you can copy the original function in its entirety and
 *   paste it in this template.php file, changing the prefix from theme_ to
 *   STARTERKIT_. For example:
 *
 *     original, found in modules/field/field.module: theme_field()
 *     theme override, found in template.php: STARTERKIT_field()
 *
 *   where STARTERKIT is the name of your sub-theme. For example, the
 *   zen_classic theme would define a zen_classic_field() function.
 *
 *   Note that base themes can also override theme functions. And those
 *   overrides will be used by sub-themes unless the sub-theme chooses to
 *   override again.
 *
 *   Zen core only overrides one theme function. If you wish to override it, you
 *   should first look at how Zen core implements this function:
 *     theme_breadcrumbs()      in zen/template.php
 *
 *   For more information, please visit the Theme Developer's Guide on
 *   Drupal.org: http://drupal.org/node/173880
 *
 * CREATE OR MODIFY VARIABLES FOR YOUR THEME
 *
 *   Each tpl.php template file has several variables which hold various pieces
 *   of content. You can modify those variables (or add new ones) before they
 *   are used in the template files by using preprocess functions.
 *
 *   This makes THEME_preprocess_HOOK() functions the most powerful functions
 *   available to themers.
 *
 *   It works by having one preprocess function for each template file or its
 *   derivatives (called theme hook suggestions). For example:
 *     THEME_preprocess_page    alters the variables for page.tpl.php
 *     THEME_preprocess_node    alters the variables for node.tpl.php or
 *                              for node--forum.tpl.php
 *     THEME_preprocess_comment alters the variables for comment.tpl.php
 *     THEME_preprocess_block   alters the variables for block.tpl.php
 *
 *   For more information on preprocess functions and theme hook suggestions,
 *   please visit the Theme Developer's Guide on Drupal.org:
 *   http://drupal.org/node/223440 and http://drupal.org/node/1089656
 */


/**
 * Override or insert variables into the maintenance page template.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("maintenance_page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_maintenance_page(&$variables, $hook) {
  // When a variable is manipulated or added in preprocess_html or
  // preprocess_page, that same work is probably needed for the maintenance page
  // as well, so we can just re-use those functions to do that work here.
  STARTERKIT_preprocess_html($variables, $hook);
  STARTERKIT_preprocess_page($variables, $hook);
}
// */

/**
 * Override or insert vtaxonomy_image_display()ariables into the html templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("html" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_html(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // The body tag's classes are controlled by the $classes_array variable. To
  // remove a class from $classes_array, use array_diff().
  //$variables['classes_array'] = array_diff($variables['classes_array'], array('class-to-remove'));
}
// */

/**
 * Override or insert variables into the page templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("page" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_page(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the node templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("node" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_node(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');

  // Optionally, run node-type-specific preprocess functions, like
  // STARTERKIT_preprocess_node_page() or STARTERKIT_preprocess_node_story().
  $function = __FUNCTION__ . '_' . $variables['node']->type;
  if (function_exists($function)) {
    $function($variables, $hook);
  }
}
// */

/**
 * Override or insert variables into the comment templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("comment" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_comment(&$variables, $hook) {
  $variables['sample_variable'] = t('Lorem ipsum.');
}
// */

/**
 * Override or insert variables into the region templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("region" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_region(&$variables, $hook) {
  // Don't use Zen's region--sidebar.tpl.php template for sidebars.
  //if (strpos($variables['region'], 'sidebar_') === 0) {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('region__sidebar'));
  //}
}
// */

/**
 * Override or insert variables into the block templates.
 *
 * @param $variables
 *   An array of variables to pass to the theme template.
 * @param $hook
 *   The name of the template being rendered ("block" in this case.)
 */
/* -- Delete this line if you want to use this function
function STARTERKIT_preprocess_block(&$variables, $hook) {
  // Add a count to all the blocks in the region.
  // $variables['classes_array'][] = 'count-' . $variables['block_id'];

  // By default, Zen will use the block--no-wrapper.tpl.php for the main
  // content. This optional bit of code undoes that:
  //if ($variables['block_html_id'] == 'block-system-main') {
  //  $variables['theme_hook_suggestions'] = array_diff($variables['theme_hook_suggestions'], array('block__no_wrapper'));
  //}
}
// */

/**
 * Implement preprocess_html()
 * 
 * @param type $variables
 */
function nickandersonart_preprocess_html(&$variables) {
  drupal_add_css('http://fonts.googleapis.com/css?family=Josefin+Sans:400,700', array('type' => 'external'));
  drupal_add_css('http://fonts.googleapis.com/css?family=PT+Sans:400,700', array('type' => 'external'));
}

/**
 * Implements hook_cart_block_preprocess()
 * 
 * @global type $user
 * @return type
 */
function nickandersonart_uc_cart_block_content() {
    
    $output = "";
    $total = "";
    $item_text = "";
    
    global $user; 

      $items = uc_cart_get_contents();
      $item_count = 0;
        if (!empty($items)) {
          foreach ($items as $item) {
            if (is_array($item->data['attributes']) && !empty($item->data['attributes'])) {
              $display_item = module_invoke($item->module, 'cart_display', $item);
              $output .= '<tr><td colspan="3">'. $display_item['options']['#value'] .'</td></tr>';
            }
            $total += ($item->price) * $item->qty;
            $item_count += $item->qty;
          }
              }
          if ($item_count > 0) {    
                if (variable_get('uc_checkout_enabled', TRUE)) {
                  $output .=  l(t('MY CART(' .$item_count. ')'), 'cart/checkout', array('rel' => 'nofollow'));
                }
          }      
        /* $output .= '<a href="/some_path">Custom Link in bottom</a>'; */
        var_dump($display_item);
        return $output;
}

/**
 * Implement hook_form()
 * The checkout form built up from the enabled checkout panes.
 *
 * @param $order
 *   The order that is being checked out.
 *
 * @see uc_cart_checkout_form_process()
 * @see uc_cart_checkout_form_validate()
 * @see uc_cart_checkout_form_submit()
 * @see uc_cart_checkout_review()
 * @see theme_uc_cart_checkout_form()
 * @ingroup forms
 */
function nickandersonart_uc_cart_review_table($variables){
  $items = $variables['items'];
  $show_subtotal = $variables['show_subtotal'];
  
  $continue_shopping =  $form['actions']['continue_shopping'] = array(
        '#markup' => '<span class="cont_shop">' . l('Continue shopping', uc_cart_continue_shopping_url()) . '</span>',
      );
  
  $we_accept = '<p id="we_accept">' . t('We Acccept:');
  $we_accept .= '<img src=" ' . $GLOBALS['base_root'] . '/sites/default/files/cc_img.png"/></p>';
  
  $coupons = module_invoke('uc_coupon', 'block_view', 'coupon-discount');
  $coupon = 'Enter your Coupon Code'; 
  $coupon .= '<div class="coup_txt">' . render($coupons['content']) . '</div>';
  
  $paypall = 'Have a Paypal Account?';
  $paypall .= '<div>' . render(drupal_get_form('uc_paypal_ec_form')) . '</div>';
  
  
  // Shipping 
  //$shipping = moudle_invoke();
  
  $subtotal = 0;
  
  
  // Set up table rows.
  $display_items = entity_view('uc_order_product', $items, 'cart');
  if (!empty($display_items['uc_order_product'])) {
      $i = 0;
    foreach (element_children($display_items['uc_order_product']) as $key) {
            /**
             * rendering product image and "Remove button"
             */
            
            $pid = $display_items['uc_order_product'][$key]['nid']['#value'];
            $product = node_load($pid);
            
            $images = field_get_items('node', $product, 'uc_product_image');
            $image = $images[0];
            $imagedef = array(
                'style_name' => 'thumbnail',
                'path' => $image['uri'],
            );
            $product_image_theme = theme('image_style', $imagedef);
            $product_image = '<div class="prod_img"/>' . $product_image_theme . '</div>';
            $sku = $product->model; 
            
            //$remove = render($display_items['uc_order_product'][$key]['remove']);
           /*
            $remove = array('#type' => 'submit', '#value' => t('Remove'));
            $remove['#name'] .= 'remove-' . $i;
            $remove['#id'] .= 'edit-items-' . $i . '-remove';*/
         
            /*END rendering, allowed as $product_image, $remove*/
        
      $display_item = $display_items['uc_order_product'][$key];      
      
      if (count(element_children($display_item))) {
        $total = $display_item['#total'];
        $subtotal += $total;
        
        $description = '<div class="prod_info"><b>' . $display_item['title']['#markup'] . '</b>';
        $description .= '<small>';
        $description .= '<div class="sku"> Item #' . $sku . ' -  </div>';
        if (!empty($display_item['description']['#markup'])) {
          $description .= $display_item['description']['#markup'];
        }
        $description .= '</small>';
        $description .= '</div>';
        
        $suffix = !empty($display_item['#suffixes']) ? implode(' ', $display_item['#suffixes']) : '';
        $rows[] = array(
          array('data' => $product_image),
          array('data' => $description, 'class' => array('products')),
          array('data' => array('#theme' => 'uc_price', '#price' => $total, '#suffix' => $suffix), 'class' => array('price')),
          //array('data' => $remove, 'class' => array('remove')),
        );
        
      }
      $i++;
    }
  }
  
  //add delimeter
  $rows[] = array(
      'data' => '',
      'class' => array('delimeter'),
  );
  
  //Add continue shopping button
  if ($continue_shopping) { 
    $rows[] = array( 
        'data' =>  $continue_shopping,
        'class' => array('cont_shop')
        );
  } 
  
  // Add the subtotal as the final row.
  if ($show_subtotal) {
    $rows[] = array(
      'data' => array(
        // One cell
        array(
          'data' => array(
            '#theme' => 'uc_price',
            '#prefix' => '<span id="subtotal-title">' . t('Subtotal') . '</span> ',
            '#price' => $subtotal,
          ),
        ),
      ),
      // Row attributes 
      'class' => array('subtotal'),
    );
  }
  
  //Add simlle block "We accept"
  $rows[] = array(
      'data' => array(
          '#markup' => $we_accept,
      ),
      'class' => array('we_acc'),
  );
  
  // Add coupons
  $rows[] = array(
      'data' => array(
          '#markup' => $coupon,
      ), 
      'class' => array('coupon_code'),
  );
  
    //Add paypall button
  $rows[] = array(
      'data' => array(
          '#markup' => $paypall,
      ),
      'class' => array('paypall'),        
  );

  return theme('table', array('rows' => $rows, 'attributes' => array('class' => array('cart-review'))));
}