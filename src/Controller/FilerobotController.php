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
    $token = \Drupal::config('filerobot.admin_settings')->get('token_var');
    $sectemp = \Drupal::config('filerobot.admin_settings')->get('sectemp_var');
    $folder = \Drupal::config('filerobot.admin_settings')->get('folder_var');

    return [
      '#theme' => 'fmaw_template',
      '#token_var' => $token,
      '#sectemp_var' => $sectemp,
      '#folder_var' => $folder,
    ];
  }
  
  public function log() 
  {
    return [
      '#theme' => 'filerobot_log_template',
      '#log_data' => [ // Dummy data below. In reality, @Todo: need to retrieve from DB. Maybe pagination too
        [
          'id' => 1,
          'node_id' => 42,
          'local_name' => 'localname.jpg',
          'remote_name' => 'remotename.jpg',
          'uuid' => 'xxxx-xxxx-xxxx',
          'sha1' => 'yyyyyyyyyyyy',
          'container' => '/afolder',
          'status' => true,
        ],
        [
          'id' => 2,
          'node_id' => 42,
          'local_name' => 'localname.jpg',
          'remote_name' => 'remotename.jpg',
          'uuid' => 'xxxx-xxxx-xxxx',
          'sha1' => 'yyyyyyyyyyyy',
          'container' => '/afolder',
          'status' => true,
        ],
      ],
    ];
  }
}