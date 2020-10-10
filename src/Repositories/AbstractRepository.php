<?php namespace Albreis\Kurin\Repositories;

use Albreis\Kurin\Interfaces\Repositories\IAbstractRepository;

/** @package Albreis\Kurin\Repositories */
abstract class AbstractRepository implements IAbstractRepository {  

  use \Albreis\Kurin\Traits\DBConnection;
  
  protected string $model;

  protected array $result = [];

  public function __construct()
  {
    $this->connect();
  }
  
}