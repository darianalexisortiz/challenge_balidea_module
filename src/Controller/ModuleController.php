<?php

namespace Drupal\challenge_balidea_module\Controller;

use Drupal\Core\Controller\ControllerBase;

/**
 * Returns responses for Challenge Balidea module routes.
 */
class ModuleController extends ControllerBase {

  /**
   * Builds the response.
   */
  public function build() {

    $config = \Drupal::config('challenge_balidea_module.settings');
    $build = [
      '#theme' => 'challenge_balidea',
      '#text' => $config->get('text'),
      '#integer' => $config->get('integer'),
      '#attached' => [
        'library' => ['challenge_balidea_module/global'],
      ],
      '#cache' => [
        'max-age' => 0,
      ],
    ];
    return $build;
  }
}
