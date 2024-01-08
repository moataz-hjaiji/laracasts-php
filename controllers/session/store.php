<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$db = App::resolve(Database::class);
$errors = [];
if(!Validator::isEmail($email)){
    $errors['email'] = "Please provide a valid email address.";
}
if(!Validator::isString($password,7,255)){
    $errors['password'] = "Please provide a valid password.";
}
if(count($errors)){
    view('session/create',[
        "errors" => $errors
    ]);
    return;
}
$user = $db->find('select * from user where email = :email',[
    'email' => $email
]);
if($user){
    $validPassword = password_verify($password,$user['password']);
    if($validPassword){
        login([
            "email" => $email
        ]);
        header('location: /');
        die();
    }
}

$errors['email'] = "not found user with this email";

view('session/create',[
    "errors" => $errors
]);





