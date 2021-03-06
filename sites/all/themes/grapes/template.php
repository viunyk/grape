<?php

/**
 * Implements hook_preprocess_page().
 */
function grapes_preprocess_page(&$vars, $hook) {
  //drupal_add_js(drupal_get_path('theme', 'grapes') . '/js/script.js');

  $variables['title_attributes_array']['class'][] = 'page__title';
  $variables['title_attributes_array']['id'] = 'page-title';

  // Hide titles of some Views
  if (module_exists('views') && $view = views_get_page_view()) {
    $views_hide_title = array(
      'products_grapes : page' => TRUE, // Visually hidden
      //'name1 : display1' => FALSE, // Physically removed
    );

    $view_key = $view->name . ' : ' . $view->current_display;
    if (isset($views_hide_title[$view_key])) {
      if ($views_hide_title[$view_key]) {
        $vars['title_attributes_array']['class'][] = 'element-invisible';
      }
      else {
        $vars['title'] = FALSE;
      }
    }
  }
}

/**
 * Implements hook_menu_breadcrumb_alter.
 */
function grapes_menu_breadcrumb_alter(&$breadcrumb) {
  // If there's a breadcrumb defined
  if (!empty($breadcrumb)) {
    // We'll change the root crumb values
//    $breadcrumb[0]['title'] = 'Главная'; // Don't use t() because don't want use multilanguage.
//    if(!empty($breadcrumb[3]) && $breadcrumb[3]['link_path'] == 'search/node/%'){
//      unset($breadcrumb[3]);
//    }
  }
}

/**
 * Implements hook_field_extra_fields_alter.
 */
function grapes_field_extra_fields_alter(&$info) {
  if (isset($info['commerce_product'])) {
    foreach (array_keys($info['commerce_product']) as $type) {
      $info['commerce_product'][$type]['display']['sku']['label'] = 'Код продукта'; // Don't use t() because don't want use multilanguage.
    }
  }
}

/**
 * Returns HTML for the active facet item's count.
 *
 * @param $variables
 *   An associative array containing:
 *   - count: The item's facet count.
 *
 * @ingroup themeable
 */
function grapes_facetapi_count($variables) {
  return '<span class="count">(' . (int) $variables['count'] . ')</span>';
}

/**
 * Returns HTML for an active facet item.
 *
 * @param $variables
 *   An associative array containing the keys 'text', 'path', and 'options'. See
 *   the l() function for information about these variables.
 *
 * @see l()
 *
 * @ingroup themeable
 */
function grapes_facetapi_link_active($variables) {
  // Sanitizes the link text if necessary.
  $sanitize = empty($variables['options']['html']);
  $link_text = ($sanitize) ? check_plain($variables['text']) : $variables['text'];
  $link_text = '<span class="filter-value">' . $link_text . '</span>';

  // Theme function variables fro accessible markup.
  // @see http://drupal.org/node/1316580
  $accessible_vars = array(
    'text' => $variables['text'],
    'active' => TRUE,
  );

  // Builds link, passes through t() which gives us the ability to change the
  // position of the widget on a per-language basis.
  $replacements = array(
    '!facetapi_deactivate_widget' => t('Remove This Item'),
    '!facetapi_accessible_markup' => theme('facetapi_accessible_markup', $accessible_vars),
  );
  $variables['text'] = t('!facetapi_deactivate_widget !facetapi_accessible_markup', $replacements);
  $variables['options']['html'] = TRUE;
  return $link_text . theme_link($variables);
}

/**
 * Returns HTML for a sort icon.
 *
 * @param $variables
 *   An associative array containing:
 *   - style: Set to either 'asc' or 'desc', this determines which icon to
 *     show.
 */
function grapes_tablesort_indicator($variables) {
  $path = drupal_get_path('theme', 'grapes');
  if ($variables['style'] == "asc") {
    return theme('image', array('path' => $path . '/images/arrow-asc.png', 'width' => 24, 'height' => 16, 'alt' => t('sort ascending'), 'title' => t('sort ascending')));
  }
  else {
    return theme('image', array('path' => $path . '/images/arrow-desc.png', 'width' => 24, 'height' => 16, 'alt' => t('sort descending'), 'title' => t('sort descending')));
  }
}

function grapes_preprocess_commerce_checkout_review(&$variables){
  if(isset($variables['form']['#data']['account'])){
    unset($variables['form']['#data']['account']);
  }
  if(!empty($variables['form']['#data']['customer_profile_billing']['title'])){
    $variables['form']['#data']['customer_profile_billing']['title'] = 'Контактные данные';
  }
  theme_commerce_checkout_review($variables);
}

function grapes_preprocess_dc_ajax_shopping_cart_teaser(&$variables){
  $cart_link_text = '<span class="flaticon-shopping231 text-icon"></span>'.
    '<span class="label">' . t('Cart') . '</span>'.
    '<span class="count">' . $variables['quantity'] . '</span>';
  if($variables['quantity'] > 0){
    $variables['cart_link'] = l($cart_link_text, 'cart', array('html' => TRUE, 'attributes' => array('class' => array('shopping-cart-link'))));
  }else{
    $variables['cart_link'] = l($cart_link_text, NULL, array('html' => TRUE, 'fragment' => FALSE, 'attributes' => array('class' => array('shopping-cart-link', 'empty-cart'))));
  }
}

/**
 * Themes an empty shopping cart page.
 */
function grapes_commerce_cart_empty_page() {

  return '<div class="cart-empty-page">Корзина сейчас пустая ' . l('Вернуться на главную страницу.', '<front>') . '</div>';
}

