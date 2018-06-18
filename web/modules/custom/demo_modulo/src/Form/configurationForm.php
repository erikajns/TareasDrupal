<?php

namespace Drupal\demo_modulo\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class configurationForm.
 */
class configurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'demo_modulo.configuration',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'configuration_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('demo_modulo.configuration');
    $form['ingrese_un_color'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Ingrese un color'),
      '#description' => $this->t('Porfavor ingrese un color'),
      '#maxlength' => 64,
      '#size' => 64,
      '#default_value' => $config->get('ingrese_un_color'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function validateForm(array &$form, FormStateInterface $form_state) {
    parent::validateForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    parent::submitForm($form, $form_state);

    $this->config('demo_modulo.configuration')
      ->set('ingrese_un_color', $form_state->getValue('ingrese_un_color'))
      ->save();
  }

}
