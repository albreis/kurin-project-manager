<?php namespace Albreis\Kurin\Repositories;

use Albreis\Kurin\Models\Project;
use DateTime;

/** @package Albreis\Kurin\Repositories */
class ProjectsRepository implements \Albreis\Kurin\Interfaces\IProjectsRepository {

  private array $projects;

  /** @return array  */
  public function getAll(): array { 
    return $this->projects;
  }

  /** @return array  */
  public function getDeleted(): array { 
    return $this->projects;
  }

  /**
   * @param DateTime $date 
   * @return array 
   */
  public function getByDate(\DateTime $date): array { 
    return $this->projects;
  }

  /**
   * @param int $user_id 
   * @return array 
   */
  public function getByUserId(int $user_id): array { 
    return $this->projects;
  }

  /**
   * @param string $state 
   * @return array 
   */
  public function getByState(string $state): array { 
    return $this->projects;
  }

  /**
   * @param string $field 
   * @param string $pos 
   * @return array 
   */
  public function setOrderBy(string $field, string $pos) { 
    return $this->projects;
  }

  /** @return array  */
  public function getOrderBy(): array { 
    return $this->projects;
  }

  /**
   * @param int $id 
   * @return Project 
   */
  public function getProjectById(int $id): Project { 
    return new Project;
  }
  
}