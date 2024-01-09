<?php

//use Core\Database;
use Core\Database;
use Core\App;
$db = App::getContainer()->resolve('Core\Database');

$notes = [];
//$config = require base_url('config.php');
//$db = new Database($config["database"]);


$notes = $db->findAll('select * from notes where user_id = :id',["id"=>"1"]);


view('notes/index',[
    'heading'=>'My Notes',
    'notes' => $notes
]);
