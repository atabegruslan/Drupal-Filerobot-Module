<?php

namespace Drupal\filerobot\Controller;

use Drupal\Core\Controller\ControllerBase;

class FilerobotController extends ControllerBase 
{
  public function index() 
  {
    return [
      '#theme' => 'filerobot_template',
      '#dummy_placeholder' => 'Welcome message and Sync buttons goes here',
    ];
  }
  
  public function fmaw() 
  {
    return [
      '#theme' => 'fmaw_template',
      '#token_var' => 'dummy',
      '#sectemp_var' => 'dummy',
      '#folder_var' => '/dummy',
    ];
  }
  
  public function log() 
  {
    return [
      '#theme' => 'filerobot_log_template',
      '#dummy_placeholder' => 'Sync log table goes here',
    ];
  }
}