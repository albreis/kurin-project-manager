<?php namespace Albreis\Kurin\Repositories;

use Albreis\Kurin\Interfaces\Repositories\ITasksRepository;
use Albreis\Kurin\Models\Task;
use DateTime;

/** @package Albreis\Kurin\Repositories */
class TasksRepository extends AbstractRepository  implements ITasksRepository {

    protected string $model = 'Albreis\Kurin\Models\Task';

    public function getDeleted(): array { 
      return $this->result;
    }

    public function getByDate(DateTime $date): array { 
      return $this->result;
    }

    public function getByUserId(int $user_id): array { 
      return $this->result;
    }

    public function getByState(string $state): array { 
      return $this->result;
    }

    public function getTaskById(int $id): Task { 
      return new Task;
    }

    public function getAll(): array { 
      return $this->result;
    }

    public function setOrderBy(string $field, string $pos) { }

    public function getOrderBy(): array { 
      return $this->result;
    }
  
}