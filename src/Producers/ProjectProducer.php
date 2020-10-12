<?php namespace Albreis\Kurin\Producers;

use Albreis\Kurin\Producer;
use Exception;

/** @package Albreis\Kurin\Producers */
class ProjectProducer extends Producer {

  protected $model = 'Albreis\Kurin\Models\Project';

  public function setModel(string $model) {
    throw new Exception('Method setModel not allowed');
  }

}