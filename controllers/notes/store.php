<?php

use Core\Database;
use Core\Validator;

$config = require base_url('config.php');
    $db = new Database($config["database"]);

    $body =  htmlspecialchars($_POST['body']);
    if(!Validator::isString($body,1,1000)){

        $errors['body'] = 'A body is required';
    }
    if(!empty($errors)){
        view('notes/create', [
            'heading' => 'Create Note',
            'errors' => $errors
        ]);
        return;
    }

    $db->query('insert into notes(body,user_id) values(:body,:user_id)',['body'=>$body,'user_id'=>1]);

    header('location: /notes');
    die();

