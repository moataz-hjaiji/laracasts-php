<?php
$heading = 'My Notes';

$notes = [];
$config = require('config.php');
$db = new Database($config["database"]);

$notes = $db->findAll('select * from notes where user_id = :id',["id"=>"1"]);


require  'views/notes.view.html';
