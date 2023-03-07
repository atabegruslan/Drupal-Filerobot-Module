<?php

namespace Drupal\filerobot\Controller;

use Drupal\Core\Controller\ControllerBase;

class FilerobotController extends ControllerBase 
{
  public function index() 
  {
        $build = [
          '#markup' => $this->t('Filerobot welcome message and the Sync buttons goes here'),
        ];
        return $build;
  }
  
  public function fmaw() 
  {
        $build = [
          '#markup' => $this->t('FMAW goes here'),
        ];
        return $build;
  }
  
  public function log() 
  {
        $build = [
          '#markup' => $this->t('Sync Table goes here'),
        ];
        return $build;
  }
}