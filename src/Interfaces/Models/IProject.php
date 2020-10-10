<?php namespace Albreis\Kurin\Interfaces\Models;

interface IProject {
  /**
   * get project name
   */
  public function getName(): string;

  /**
   * set project name
   */
  public function setName(string $name);

  /**
   * get projct description
   */
  public function getDescription(): string;

  /**
   * set projct description
   */
  public function setDescription(string $description);

  /**
   * get all projects done
   * 
   */
  public function setDone();

  /**
   * get all projects open
   * 
   */
  public function setOpen();

  /**
   * get all projects open
   * 
   */
  public function setDeleted();

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

}