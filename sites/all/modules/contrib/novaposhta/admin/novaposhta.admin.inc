<?php

/**
 * @file
 * Nova Poshta admin form.
 */

/**
 * Implements hook_settings_form().
 *
 * Create an admin settings form.
 */
function novaposhta_settings_form() {
  $form = [
    'cnp_settings' => [
      '#type'         => 'fieldset',
      '#title'        => t('Nova Poshta settings form'),
      '#description'  => t('Set your own configuration for the Novaposhta module'),
    ],
  ];
  // API-key.
  $form['cnp_settings']['novaposhta_api_key'] = [
    '#type'           => 'textfield',
    '#title'          => t('API-key'),
    '#description'    => t('Set your own API-key for working with the Nova Poshta services'),
    '#required'       => TRUE,
    '#default_value'  => variable_get('novaposhta_api_key', ''),
  ];
  // Test mode.
  $form['cnp_settings']['novaposhta_test_mode'] = [
    '#type'           => 'checkbox',
    '#title'          => t('Test mode'),
    '#description'    => t('Switch this on if you do not need to load a real data from the NP(can be useful for development).'),
    '#default_value'  => variable_get('novaposhta_test_mode', FALSE),
  ];
  return system_settings_form($form);
}
