<?php namespace Albreis\Kurin\Repositories;

/** @package Albreis\Kurin\Repositories */
abstract class AbstractRepository implements \Albreis\Kurin\Interfaces\IRepository {  

  protected $model;

  public function query(string $sql, array $params = []): array 
  {    
    $stmt  = $this->db->prepare($sql, [\PDO::ATTR_CURSOR => \PDO::CURSOR_SCROLL]);
    $stmt->execute();

    while($result[] = $stmt->fetchObject($this->model));
    array_pop($result);

    return $result;
  }
}