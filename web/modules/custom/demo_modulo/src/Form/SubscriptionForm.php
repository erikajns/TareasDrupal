<?php

namespace Drupal\demo_modulo\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Class SubscriptionForm.
 */
class SubscriptionForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'demo_modulo.subscription',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'subscription_form';
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('demo_modulo.subscription');
    $form['correo_electronico'] = [
      '#type' => 'email',
      '#title' => $this->t('Correo electronico'),
      '#description' => $this->t('Ingresa tu correo electronico'),
      '#default_value' => $config->get('correo_electronico'),
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

    $this->config('demo_modulo.subscription')
      ->set('correo_electronico', $form_state->getValue('correo_electronico'))
      ->save();
  }

}
