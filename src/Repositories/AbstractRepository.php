<?php namespace Albreis\Kurin\Repositories;

/** @package Albreis\Kurin\Repositories */
abstract class AbstractRepository implements \Albreis\Kurin\Interfaces\IAbstractRepository {  

  use \Albreis\Kurin\Traits\DBConnection;
  
  protected string $model;

  protected array $result = [];

  public function __construct()
  {
    $this->connect();
  }
  
}