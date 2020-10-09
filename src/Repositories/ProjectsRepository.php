<?php namespace Albreis\Kurin\Repositories;

use Albreis\Kurin\Models\Project;
use DateTime;
use Iterator;
use PDO;
use PDOException;

/** @package Albreis\Kurin\Repositories */
class ProjectsRepository extends \Albreis\Kurin\Repositories\AbstractRepository implements \Albreis\Kurin\Interfaces\IProjectsRepository{

  /**
   * Model usado pelo repositório
   */
  protected string $model = 'Albreis\Kurin\Models\Project';

  /** @return array  */
  public function getAll(int $limit = 20, int $offset = 0): array { 
    $sql = 'SELECT a.*, 
    (SELECT count(*) FROM tasks b WHERE b.project_id = a.id AND done_at = "0000-00-00 00:00:00" AND deleted_at = "0000-00-00 00:00:00") AS open_tasks, 
    (SELECT count(*) FROM tasks b WHERE b.project_id = a.id AND done_at != "0000-00-00 00:00:00" AND deleted_at = "0000-00-00 00:00:00") AS done_tasks 
    FROM projects a WHERE a.deleted_at = "0000-00-00 00:00:00" ORDER BY a.name ASC LIMIT :rows_offset, :rows_count ';
    $this->result = $this->listQuery($sql, ['rows_count' => $limit, 'rows_offset' => $offset]);
    return $this->result;
  }

  /** @return array  */
  public function getDeleted(int $limit = 20, int $offset = 0): array { 
    $sql = 'SELECT a.*, 
    (SELECT count(*) FROM tasks b WHERE b.project_id = a.id AND done_at = "0000-00-00 00:00:00" AND deleted_at = "0000-00-00 00:00:00") AS open_tasks, 
    (SELECT count(*) FROM tasks b WHERE b.project_id = a.id AND done_at != "0000-00-00 00:00:00" AND deleted_at = "0000-00-00 00:00:00") AS done_tasks 
    FROM projects a WHERE a.deleted_at != "0000-00-00 00:00:00" ORDER BY a.name ASC LIMIT :rows_offset, :rows_count ';
    $this->result = $this->listQuery($sql, ['rows_count' => $limit, 'rows_offset' => $offset]);
    return $this->result;
  }

  /**
   * @param DateTime $date 
   * @return array 
   */
  public function getByDate(\DateTime $date, int $limit = 20, int $offset = 0): array { 
    return $this->result;
  }

  /**
   * @param int $user_id 
   * @return array 
   */
  public function getByUserId(int $user_id, int $limit = 20, int $offset = 0): array { 
    return $this->result;
  }

  /**
   * @param string $state 
   * @return array 
   */
  public function getByState(string $state, int $limit = 20, int $offset = 0): array { 
    return $this->result;
  }

  /**
   * @param string $field 
   * @param string $pos 
   * @return array 
   */
  public function setOrderBy(string $field, string $pos) { 
    return $this->result;
  }

  /** @return array  */
  public function getOrderBy(): array { 
    return $this->result;
  }

  /**
   * @param int $id 
   * @return Project 
   */
  public function getProjectById(int $id): Project { 
    $sql = "SELECT * FROM projects WHERE id = :id";
    return $this->queryOne($sql, ['id' => $id]);
  }
  
}