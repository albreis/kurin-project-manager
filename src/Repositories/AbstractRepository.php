<?php namespace Albreis\Kurin\Repositories;

use Albreis\Kurin\Interfaces\Repositories\IAbstractRepository;

/** @package Albreis\Kurin\Repositories */
abstract class AbstractRepository implements IAbstractRepository {  

  protected string $model;

  protected array $result = [];
  
}