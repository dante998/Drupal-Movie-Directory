<?php

namespace Drupal\movie_directory\Form;

use Drupal\Core\Form\FormBase;
use Drupal\Core\Form\FormStateInterface;

class MovieAPI extends FormBase {

  public function getFormId() {
    return 'movie_api_config_page';
  }

  public function buildForm(array $form, FormStateInterface $form_state) {
    $form = [];

    $form['api_base_url'] = [
      '#type' => 'textfield',
      '#title' => $this->t('API Base URL'),
      '#description' => $this->t('This is the API Base URL'),
      '#required' => TRUE,
      '#default_value' => '',
    ];

    $form['api_key'] = [
      '#type' => 'textfield',
      '#title' => $this->t('API Key'),
      '#description' => $this->t('This is the api key that will be use to access the API'),
      '#required' => TRUE,
      '#default_value' => '',
    ];
    return $form;

  }

  public function submitForm(array &$form, FormStateInterface $form_state) {
    // TODO: Implement submitForm() method.
  }

}
