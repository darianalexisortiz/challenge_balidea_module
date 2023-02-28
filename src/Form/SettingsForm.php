<?php

namespace Drupal\challenge_balidea_module\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Challenge Balidea module settings.
 */
class SettingsForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'challenge_balidea_module_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return ['challenge_balidea_module.settings'];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $form['integer'] = [
      '#type' => 'number',
      '#title' => $this->t('Integer'),
      '#description' => $this->t('Please enter a integer number'),
      '#default_value' => $this->config('challenge_balidea_module.settings')->get('integer'),
      '#step' => 1,
      '#min' => 0,
    ];
    $form['text'] = [
      '#type' => 'text_format',
      '#title' => $this->t('Text'),
      '#format' => 'basic_html',
      '#default_value' => $this->config('challenge_balidea_module.settings')->get('text.value'),
      '#rows' => 5,
      '#wysiwyg' => true,
      '#allowed_formats' => ['basic_html'],
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $config_name = 'challenge_balidea_module.settings';
    $this->config($config_name)
      ->set('integer', $form_state->getValue('integer'))
      ->set('text', $form_state->getValue('text'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}
