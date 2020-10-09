<?php namespace Albreis\Kurin\Interfaces;

interface IAbstractRepository {

  /**
   * get all projects
   * 
   */
  public function getAll(): array;

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

  public function query(string $sql, array $params = []): array;
}