<?php

use Core\Database;
use Core\App;
use Core\Validator;

$db = App::getContainer()->resolve('Core\Database');


$currentUserId = 1;
//$config = require base_url('config.php');
//$db = new Database($config['database']);
$note_id = $_POST['id'];
$note = $db->findOrFail('select * from notes where id = :id',['id'=>$note_id]);

authorize($note['user_id']===$currentUserId);

$errors = [];
if(!Validator::isString($_POST['body'],1,1000)){

    $errors['body'] = 'A body is required';
}

if(count($errors)){
    view('notes/edit.view.php',[
        'heading'=> 'Edit Note',
        'errors' => $errors,
        'note' => $note
    ]);
    return;
}
var_dump($note_id,$_POST['body']);
$db->query('update notes set body = :body where id = :id',[
    'body' => $_POST['body'],
    'id' => $note_id
]);

header('location: /notes');
die();

