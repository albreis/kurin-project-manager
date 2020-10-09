<?php namespace Albreis\Kurin\Interfaces;

use Albreis\Kurin\Models\Project;

interface IProject {
  /**
   * get project name
   */
  public function getName(): string;

  /**
   * set project name
   */
  public function setName(): string;

  /**
   * get projct description
   */
  public function getDescription(): string;

  /**
   * set projct description
   */
  public function setDescription(): string;

  /**
   * get all projects
   * 
   */
  public function getAll(): array;

  /**
   * get all projects done
   * 
   */
  public function getDone(): array;

  /**
   * get all projects open
   * 
   */
  public function getOpen(): array;

  /**
   * get all projects open
   * 
   */
  public function getDeleted(): array;

  /**
   * get all projects by date
   * 
   */
  public function getByDate(DateTime $date): array;

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
  public function getOrderBy(string $field, string $pos): array;

  /**
   * set all tasks done
   */
  public function doneAllTasks();

  /**
   * set all tasks open
   */
  public function openAllTasks();

  /**
   * set all tasks delete
   */
  public function deleteAllTasks();

  /**
   * get project by ID
   * 
   * @return Albreis\Kurin\Models\Project
   */
  public function getProjectById(int $id): Project;
}