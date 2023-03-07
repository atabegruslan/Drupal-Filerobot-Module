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
    $form['token'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Filerobot token'),
      '#default_value' => $config->get('token_var'),
      '#description' => 'Filerobot token from your Filerobot account',
      '#description_display' => 'after',
    ];
    $form['sectemp'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Security Template Identifier'),
      '#default_value' => $config->get('sectemp_var'),
      '#description' => 'To load the Filerobot Widget or Filerobot Image Editor, you you need to create a Security Template in your Filerobot Asset Hub first, in order for your Contenful instantiation of the Filerobot Widget to obtain proper credentials and access your storage',
      '#description_display' => 'after',
    ];
    $form['folder'] = [
      '#type' => 'textfield',
      '#title' => $this->t('Filerobot upload directory'),
      '#default_value' => $config->get('folder_var'),
      '#description' => 'The directory in your Filerobot account, where the files will be stored',
      '#description_display' => 'after',
    ];
    return parent::buildForm($form, $form_state);
  }

  /**
   * {@inheritdoc}
   */
  public function submitForm(array &$form, FormStateInterface $form_state) {
    $this->config('filerobot.admin_settings')
      ->set('token_var', $form_state->getValue('token'))
      ->set('sectemp_var', $form_state->getValue('sectemp'))
      ->set('folder_var', $form_state->getValue('folder'))
      ->save();
    parent::submitForm($form, $form_state);
  }

}