<?php

namespace Drupal\my_module\Controller;

use Drupal\Core\Controller\ControllerBase;

class FirstController extends ControllerBase {
  public function content() {
    return [
      '#type' => 'markup',
      '#markup' => t('Hello Drupal world.
                            Learning Drupal.'),
    ];
  }
  public function variable($name_1, $name_2) {
    return [
      '#type' => 'markup',
      '#markup' => t('@name1 and @name2 say hello to you!',
        ['@name1' => $name_1, '@name2' => $name_2]),
    ];
  }


}
