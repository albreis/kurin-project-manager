<?php namespace Albreis\Kurin\Interfaces;

use PDOStatement;

interface IAbstractRepository {

  /**
   * get all projects
   * 
   */
  public function getAll(int $limit = 20, int $offset = 0): array;

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

}