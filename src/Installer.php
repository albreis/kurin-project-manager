<?php namespace Albreis\Kurin;

use Albreis\Kurin\Database\MySQL;
use Albreis\Kurin\Traits\Database;
use PDOException;

class Installer {

  public function run() {
    echo "Installing: createTableAccount\n\r";
    $this->createTableAccount();
    echo "Installing: createNewsletterTable\n\r";
    $this->createNewsletterTable();
    echo "Installing: createUsersTable\n\r";
    $this->createUsersTable();
    echo "Installing: createLogsTable\n\r";
    $this->createLogsTable();
    echo "Installing: createProjectsTable\n\r";
    $this->createProjectsTable();
    echo "Installing: createTasksTable\n\r";
    $this->createTasksTable();
  }

  /**
   * @param bool $force 
   * @return exit 
   * @throws PDOException 
   */
  private function createTableAccount(bool $force = false) {    
    /**
    * Cria a tabela de contas
    */
    if($force) Database::connect(new MySQL)->query('DROP TABLE IF EXISTS accounts');
    Database::connect(new MySQL)->query('CREATE TABLE IF NOT EXISTS accounts(
      id int not null PRIMARY KEY AUTO_INCREMENT,
      user_id int NOT NULL REFERENCES users(id),
      created_at timestamp DEFAULT current_timestamp,
      updated_at timestamp,
      deleted_at timestamp,
      created_by int NOT NULL REFERENCES accounts(id),
      updated_by int REFERENCES accounts(id),
      deleted_by int REFERENCES accounts(id)
    )');

  }

  private function createNewsletterTable(bool $force = false) {
    /**
     * Cria a tabela de newsletter
     */
    if($force) Database::connect(new MySQL)->query('DROP TABLE IF EXISTS newletters');
    Database::connect(new MySQL)->query('CREATE TABLE IF NOT EXISTS newletters(
      id int not null PRIMARY KEY AUTO_INCREMENT,
      email varchar(100) NOT NULL,
      created_at timestamp DEFAULT current_timestamp,
      updated_at timestamp,
      deleted_at timestamp,
      created_by int NOT NULL REFERENCES accounts(id),
      updated_by int REFERENCES accounts(id),
      deleted_by int REFERENCES accounts(id)
    )');
  }

  private function createUsersTable(bool $force = false) {
    /**
     * Cria a tabela de usuários
     */
    if($force) Database::connect(new MySQL)->query('DROP TABLE IF EXISTS users');
    Database::connect(new MySQL)->query('CREATE TABLE IF NOT EXISTS users(
      id int not null PRIMARY KEY AUTO_INCREMENT, 
      firstname varchar(50),
      lastname varchar(100), 
      username varchar(100) not null,
      password varchar(40) not null,
      created_at timestamp DEFAULT current_timestamp,
      updated_at timestamp,
      deleted_at timestamp,
      created_by int NOT NULL REFERENCES accounts(id),
      updated_by int REFERENCES accounts(id),
      deleted_by int REFERENCES accounts(id),
      UNIQUE(username)
    )');
    Database::connect(new MySQL)->query('INSERT INTO users(id, username, password) VALUE (0, "system", sha1(md5("123admin123")))');
    Database::connect(new MySQL)->query('INSERT INTO accounts(user_id) VALUE (LAST_INSERT_ID())');
    Database::connect(new MySQL)->query('INSERT INTO users(username, password) VALUE ("admin", sha1(md5("123admin123")))');
    Database::connect(new MySQL)->query('INSERT INTO accounts(user_id) VALUE (LAST_INSERT_ID())');
  }

  private function createLogsTable(bool $force = false) {
    /**
     * Cria a tabela de logs
     */
    if($force) Database::connect(new MySQL)->query('DROP TABLE IF EXISTS logs');
    Database::connect(new MySQL)->query('CREATE TABLE IF NOT EXISTS logs (
      id int not null PRIMARY KEY AUTO_INCREMENT, 
      AUTHENTICATED_account_id int REFERENCES accounts(id),
      user_id int REFERENCES users(id),     
      description text,
      created_at timestamp DEFAULT current_timestamp
    )');
  }

  private function createProjectsTable(bool $force = false) {
    /**
     * Cria a tabela de projects
     */
    if($force) Database::connect(new MySQL)->query('DROP TABLE IF EXISTS projects');
    Database::connect(new MySQL)->query('CREATE TABLE IF NOT EXISTS projects (
      id int not null PRIMARY KEY AUTO_INCREMENT, 
      parent_id int REFERENCES projects (id),
      name varchar(255) not null,
      description text,
      ordering tinyint DEFAULT 0,
      created_at timestamp DEFAULT current_timestamp,
      updated_at timestamp,
      deleted_at timestamp,
      prev_owner int NOT NULL REFERENCES accounts(id),
      current_owner int NOT NULL REFERENCES accounts(id),
      next_owner int NOT NULL REFERENCES accounts(id),
      created_by int NOT NULL REFERENCES accounts(id),
      updated_by int REFERENCES accounts(id),
      deleted_by int REFERENCES accounts(id)
    )');
  } 

  private function createTasksTable(bool $force = false) {
    /**
     * Cria a tabela de tarefas
     */
    if($force) Database::connect(new MySQL)->query('DROP TABLE IF EXISTS tasks');
    $stmt = Database::connect(new MySQL)->query('CREATE TABLE IF NOT EXISTS tasks (
      id int not null PRIMARY KEY AUTO_INCREMENT, 
      project_id int not null REFERENCES projects (id),
      parent_id int REFERENCES tasks (id),
      name varchar(255) not null,
      description text,
      priority tinyint DEFAULT 0,
      ordering tinyint DEFAULT 0,
      started_at timestamp,
      done_at timestamp,
      created_at timestamp DEFAULT current_timestamp,
      updated_at timestamp,
      deleted_at timestamp,
      prev_owner int NOT NULL REFERENCES accounts(id),
      current_owner int NOT NULL REFERENCES accounts(id),
      next_owner int NOT NULL REFERENCES accounts(id),
      created_by int NOT NULL REFERENCES accounts(id),
      updated_by int REFERENCES accounts(id),
      deleted_by int REFERENCES accounts(id)
    )');
  }

}