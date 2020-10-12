<?php namespace Albreis\KurinProjectManager\Interfaces\Repositories;

use Albreis\Kurin\Interfaces\Repositories\IAbstractRepository;
use Albreis\KurinProjectManager\Models\Task;

/** @package Albreis\Kurin\Interfaces */
interface ITasksRepository extends IAbstractRepository {

  /**
   * get all Tasks open
   * 
   */
  public function getDeleted(): array;

  /**
   * get all Tasks by date
   * 
   */
  public function getByDate(\DateTime $date): array;

  /**
   * get all Tasks by user id
   * 
   */
  public function getByUserId(int $user_id): array;

  /**
   * get all Tasks by user state
   * 
   * @param string $state done|open|deleted
   * 
   */
  public function getByState(string $state): array;

  /**
   * get Task by ID
   * 
   * @return Albreis\Kurin\Models\Task
   */
  public function getTaskById(int $id): Task;
}