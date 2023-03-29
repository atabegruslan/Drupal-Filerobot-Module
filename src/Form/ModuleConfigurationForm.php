<?php

namespace Drupal\filerobot\Form;

use Drupal\Core\Form\ConfigFormBase;
use Drupal\Core\Form\FormStateInterface;

/**
 * Defines a form that configures forms module settings.
 */
class ModuleConfigurationForm extends ConfigFormBase {

  /**
   * {@inheritdoc}
   */
  public function getFormId() {
    return 'filerobot_admin_settings';
  }

  /**
   * {@inheritdoc}
   */
  protected function getEditableConfigNames() {
    return [
      'filerobot.admin_settings',
    ];
  }

  /**
   * {@inheritdoc}
   */
  public function buildForm(array $form, FormStateInterface $form_state) {
    $config = $this->config('filerobot.admin_settings');

    $activation = $config->get('activation');
    $token = $config->get('token');
    $CNAME = $config->get('CNAME');
    $SEC = $config->get('SEC');
    $uploadDirectory = $config->get('uploadDirectory');

    $form['activation'] = [
      '#type' => 'checkbox',
      '#title' => $this->t('Activation'),
      '#default_value' => $activation,
      '#description' => $this->t('Enable/Disable the Module'),
    ];

    $form['token'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Token'),
      '#default_value' => $token,
      '#description' => $this->t('Filerobot token from your Filerobot account'),
    ];

    $form['CNAME'] = [
      '#type' => 'textfield',
      '#title' => $this->t('CNAME'),
      '#default_value' => $CNAME,
      '#description' => $this->t('Enter the CNAME as per configuration done in your Filerobot Asset Hub interface, once validated and SSL certificate accepted. (Or leave blank if none)'),
    ];

    $form['SEC'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Security Template Identifier'),
      '#default_value' => $SEC,
      '#description' => $this->t('To load the Filerobot Widget or Filerobot Image Editor, you need to create a Security Template in your Filerobot Asset Hub first, in order for your Shopware instantiation of the Filerobot Widget to obtain proper credentials and access your storage.'),
    ];

    $form['uploadDirectory'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Filerobot upload directory'),
      '#default_value' => $uploadDirectory,
      '#description' => $this->t('The directory in your Filerobot account, where the files will be stored'),
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state)
  {
    $this->config('filerobot.admin_settings')
      ->set('token', $form_state->getValue('token'))
      ->set('SEC', $form_state->getValue('SEC'))
      ->set('uploadDirectory', $form_state->getValue('uploadDirectory'))
      ->set('CNAME', $form_state->getValue('CNAME'))
      ->set('activation', $form_state->getValue('activation'))
      ->save();

    parent::submitForm($form, $form_state);
  }

}
