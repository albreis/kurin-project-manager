<?php namespace Albreis\KurinProjectManager\Managers;

use Albreis\Kurin\Managers\StorageManager;

/** @package Albreis\Kurin\Managers */
class ProjectStorageManager extends StorageManager {

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

}