<?php namespace Albreis\Kurin\Repositories;

/** @package Albreis\Kurin\Repositories */
abstract class AbstractRepository implements \Albreis\Kurin\Interfaces\IAbstractRepository {  

  protected string $model;

  protected array $result = [];

  use \Albreis\Kurin\Traits\DBConnection;
  
}