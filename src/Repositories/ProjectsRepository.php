<?php 
declare(strict_types=1);

namespace Albreis\Kurin\Repositories;

use Albreis\Kurin\Database\MySQL;
use Albreis\Kurin\Interfaces\Repositories\IProjectsRepository;
use Albreis\Kurin\Models\Project;
use Albreis\Kurin\Traits\Database;
use DateTime;

/** @package Albreis\Kurin\Repositories */
class ProjectsRepository extends AbstractRepository implements IProjectsRepository{

  /**
   * Model usado pelo repositório
   */
  protected string $model = 'Albreis\Kurin\Models\Project';

  /**
   * @param int $limit 
   * @param int $offset 
   * @return array 
   */
  public function getAll(int $limit = 20, int $offset = 0): array {
    $sql = 'SELECT a.*, 
    (SELECT count(*) FROM tasks b WHERE b.project_id = a.id AND done_at = "0000-00-00 00:00:00" AND deleted_at = "0000-00-00 00:00:00") AS open_tasks, 
    (SELECT count(*) FROM tasks b WHERE b.project_id = a.id AND done_at != "0000-00-00 00:00:00" AND deleted_at = "0000-00-00 00:00:00") AS done_tasks 
    FROM projects a WHERE a.deleted_at = "0000-00-00 00:00:00" ORDER BY a.name ASC LIMIT :rows_offset, :rows_count ';
    $this->result = Database::connect(new MySQL)->listQuery($sql, ['rows_count' => $limit, 'rows_offset' => $offset]);
    return $this->result;
  }

  /**
   * @param int $limit 
   * @param int $offset 
   * @return array 
   */
  public function getDeleted(int $limit = 20, int $offset = 0): array { 
    $sql = 'SELECT a.*, 
    (SELECT count(*) FROM tasks b WHERE b.project_id = a.id AND done_at = "0000-00-00 00:00:00" AND deleted_at = "0000-00-00 00:00:00") AS open_tasks, 
    (SELECT count(*) FROM tasks b WHERE b.project_id = a.id AND done_at != "0000-00-00 00:00:00" AND deleted_at = "0000-00-00 00:00:00") AS done_tasks 
    FROM projects a WHERE a.deleted_at != "0000-00-00 00:00:00" ORDER BY a.name ASC LIMIT :rows_offset, :rows_count ';
    $this->result = Database::connect(new MySQL)->listQuery($sql, ['rows_count' => $limit, 'rows_offset' => $offset]);
    return $this->result;
  }

  /**
   * @param DateTime $start_date 
   * @param DateTime $end_date 
   * @param int $limit 
   * @param int $offset 
   * @return array 
   */
  public function getByDate(DateTime $start_date, DateTime $end_date, int $limit = 20, int $offset = 0): array { 
    $sql = 'SELECT a.*, 
    (SELECT count(*) FROM tasks b WHERE b.project_id = a.id AND done_at = "0000-00-00 00:00:00" AND deleted_at = "0000-00-00 00:00:00") AS open_tasks, 
    (SELECT count(*) FROM tasks b WHERE b.project_id = a.id AND done_at != "0000-00-00 00:00:00" AND deleted_at = "0000-00-00 00:00:00") AS done_tasks 
    FROM projects a WHERE created_at BETWEEN :start_date AND :end_date AND a.deleted_at != "0000-00-00 00:00:00" ORDER BY a.name ASC LIMIT :rows_offset, :rows_count ';
    $this->result = Database::connect(new MySQL)->listQuery($sql, [
      'start_date' => $start_date->format('Y-m-d H:i:s'), 
      'end_date' => $end_date->format('Y-m-d H:i:s'), 
      'rows_count' => $limit, 
      'rows_offset' => $offset
    ]);
    return $this->result;
  }

  /**
   * @param int $user_id 
   * @param int $limit 
   * @param int $offset 
   * @return array 
   */
  public function getByUserId(int $user_id, int $limit = 20, int $offset = 0): array { 
    return $this->result;
  }

  /**
   * @param string $state 
   * @param int $limit 
   * @param int $offset 
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
    $sql = "SELECT * FROM projects WHERE id = :id AND deleted_at = '0000-00-00 00:00:00'";
    return Database::connect(new MySQL)->queryOne($sql, ['id' => $id]);
  }
  
}