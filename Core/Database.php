<?php

namespace Core;
use PDO;
class Database {
  public PDO $connection;
    public  $statement;

    public function __construct(private array $config)
  {
      try {
          $dsn = "mysql:host={$config['host']};port={$config['port']};dbname={$config['dbname']};user={$config['user_db']};charset={$config['charset']};";
          $this->connection = new PDO($dsn,'root','',[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);

      } catch (\PDOException $e) {
          echo 'Connection failed: ' . $e->getMessage();
      }
  }


  public function query($query,$params): static
  {

    $this->statement = $this->connection->prepare($query);
    $this->statement->execute($params);

    return $this;
  }
  public function find($query,$params)
  {
      $this->query($query,$params);
      return $this->statement->fetch();
  }
  public function findOrFail($query,$params)
  {
    $result = $this->find($query,$params);
    if(!$result){
        abort();
    }
    return $result;
  }
  public function findAll($query,$params)
  {
      $result =  $this->query($query,$params);
      return $this->statement->fetchAll();
  }
};

