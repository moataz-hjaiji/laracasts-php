<?php
$heading = 'note';
$note_id = $_GET['id'];
$currentUserId = 1;

$config = require base_url('config.php');
$db = new Database($config['database']);
$note = $db->findOrFail('select * from notes where id = :id',['id'=>$note_id]);


authorize($note['user_id']===$currentUserId);

view('notes/show',[
    'heading' => 'Note',
    'note' => $note,
]);
