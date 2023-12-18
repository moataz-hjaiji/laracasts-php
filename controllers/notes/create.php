<?php
$heading = "Create Note";
$errors = [];
if($_SERVER['REQUEST_METHOD']=='POST'){
    $config = require base_url('config.php');
    $db = new Database($config["database"]);

    $body =  htmlspecialchars($_POST['body']);
    if(!Validator::isString($body,1,1000)){

        $errors['body'] = 'A body is required';
    }

    if(empty($errors)){
        $db->query('insert into notes(body,user_id) values(:body,:user_id)',['body'=>$body,'user_id'=>1]);
    }
}


view('notes/create', [
    'heading' => 'Create Note',
    'errors' => $errors
]);
