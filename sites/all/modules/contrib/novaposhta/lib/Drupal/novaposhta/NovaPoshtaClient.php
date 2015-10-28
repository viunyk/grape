<?php
/**
 * @file
 * NovaPoshtaClient class definition file.
 */

namespace Drupal\novaposhta;
use Drupalway\NovaPoshta\NovaPoshtaClient as NPClient;

/**
 * Class NovaPoshtaClient.
 *
 * @package Drupal\novaposhta
 */
class NovaPoshtaClient {
  /**
   * NovaPoshtaClient.
   *
   * @var \Drupalway\NovaPoshta\NovaPoshtaClient
   */
  private $api;

  /**
   * Get method for getting the NovaPoshtaClient.
   *
   * @return \Drupalway\NovaPoshta\NovaPoshtaClient
   *   NovaPoshtaClient.
   */
  public function getApi() {
    return $this->api;
  }

  /**
   * Basic construct method.
   */
  public function __construct() {
    $this->api = NPClient::factory([
      'defaults' => [
        'api_key'   => variable_get('novaposhta_api_key', ''),
        'test_mode' => variable_get('novaposhta_test_mode', FALSE),
      ],
    ]);
  }

  /**
   * Get cities method.
   *
   * @param array $properties
   *   Properties array.
   *
   * @return mixed
   *   Response array.
   */
  public function getCities($properties = []) {
    $method = 'getCities';
    $params = !empty($properties) ? ['filters' => $properties] : [];
    return $this->api->$method($params);
  }

  /**
   * Get warehouses method.
   *
   * @param string $city_id
   *   CityRef string.
   *
   * @return array
   *   Response array.
   */
  public function getWarehouses($city_id) {
    $warehouses = [];
    if (!empty($city_id)) {
      $method = 'getWarehouses';
      $params = ['filters' => ['city_id' => $city_id]];
      $warehouses = $this->api->$method($params);
    }
    return $warehouses;
  }

}
