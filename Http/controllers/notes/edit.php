<?php
use Core\Database;
use Core\App;

$db = App::getContainer()->resolve('Core\Database');


$currentUserId = 1;
//$config = require base_url('config.php');
//$db = new Database($config['database']);
$note_id = $_GET['id'];
$note = $db->findOrFail('select * from notes where id = :id',['id'=>$note_id]);
authorize($note['user_id']===$currentUserId);


view('notes/edit', [
    'heading' => 'Edit Note',
    'errors' => [],
    "note" => $note
]);
