<?php

require 'functions.php';
require 'Database.php';
 require 'routes.php';

// connect to databases, and execute a query.



// connect to our MySQL database;

$db = new Database();
$posts = $db->query('select * from posts')->fetchAll();

// echo '<p>'.$posts['title'].'</p>';

//foreach($posts as $post){
//  echo "<li>".$post['title']."</li>";
//}


// class Person {
//   public $name;
//   public $age;

//   public function breathe()
//   {
//     echo $this->name.' is breathing!';
//   }
// }


// $person = new Person();
// $person->name = 'name of person';
// $person->age = 25;
