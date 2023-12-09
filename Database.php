<?php
class Database {
  public $connection;

  public function __construct()
  {
    $config = [
      'host' => 'localhost',
      'post' => 3306,
      'dbname' => 'myapp',
      'charset' => 'utf8mb4'
    ];
    $dsn = 'mysql:host=localhost;port=3306;dbname=myapp;user=root;charset=utf8mb4;';
    $this->connection = new PDO($dsn,'root','',[PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC]);
  }


  public function query($query){
    
    $statement = $this->connection->prepare($query);
    $statement->execute(); 

    return  $statement;
  }
};

