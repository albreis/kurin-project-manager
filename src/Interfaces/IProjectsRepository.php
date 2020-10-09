<?php namespace Albreis\Kurin\Interfaces;

use Albreis\Kurin\Models\Project;

interface IProjectsRepository extends IRepository{

  /**
   * get all projects
   * 
   */
  public function getAll(): array;

  /**
   * get all projects open
   * 
   */
  public function getDeleted(): array;

  /**
   * get all projects by date
   * 
   */
  public function getByDate(\DateTime $date): array;

  /**
   * get all projects by user id
   * 
   */
  public function getByUserId(int $user_id): array;

  /**
   * get all projects by user state
   * 
   * @param string $state done|open|deleted
   * 
   */
  public function getByState(string $state): array;

  /**
   * set ordering by
   * 
   * @param string $field
   * @param string $pos
   */
  public function setOrderBy(string $field, string $pos);

  
  /**
   * get ordering by
   */
  public function getOrderBy(): array;

  /**
   * get project by ID
   * 
   * @return Albreis\Kurin\Models\Project
   */
  public function getProjectById(int $id): Project;
}