<?php namespace Albreis\Kurin\Producers;

use Albreis\Kurin\Database\MySQL;
use Albreis\Kurin\Producer;
use Albreis\Kurin\Traits\Database;
use DateTimeZone;
use PDOException;

/** @package Albreis\Kurin\Producers */
class ProjectProducer extends Producer {

  protected $model = 'Albreis\Kurin\Models\Project';

  /**
   * @param bool $return 
   * @return null|object 
   * @throws PDOException 
   */
  public function store(object $project, bool $return =  true): ?int { 
    $sql = "INSERT INTO projects(name, created_at) VALUES (:name, :created_at)";
    $data = [
      'name' => $project->getName(),
      'created_at' => $project->getCreatedAt()->format('Y-m-d H:i:s'),
    ];
    $this->storage->query($sql, $data);
    if($return) {
      return $this->storage->lastInsertId();
    }
    return null;
  }

  /**
   * @param bool $return 
   * @return null|int 
   * @throws PDOException 
   */
  public function storeAll(bool $return =  true): ?array 
  {
    $ids = [];
    while($this->objects) {
      $object = array_shift($this->objects);
      $ids[] = $this->store($object, $return);
    }
    if($return) {
      return $ids;
    }
    return null;
  }

}