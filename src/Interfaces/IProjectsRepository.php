<?php namespace Albreis\Kurin\Interfaces;

use Albreis\Kurin\Models\Project;

/** @package Albreis\Kurin\Interfaces */
interface IProjectsRepository extends IAbstractRepository{

  /**
   * get all projects open
   * 
   */
  public function getDeleted(int $limit = 20, int $offset = 0): array;

  /**
   * get all projects by date
   * 
   */
  public function getByDate(\DateTime $date, int $limit = 20, int $offset = 0): array;

  /**
   * get all projects by user id
   * 
   */
  public function getByUserId(int $user_id, int $limit = 20, int $offset = 0): array;

  /**
   * get all projects by user state
   * 
   * @param string $state done|open|deleted
   * 
   */
  public function getByState(string $state, int $limit = 20, int $offset = 0): array;

  /**
   * get project by ID
   * 
   * @return Albreis\Kurin\Models\Project
   */
  public function getProjectById(int $id): Project;
}