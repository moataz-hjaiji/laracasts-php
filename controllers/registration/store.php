<?php


use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];
if(!Validator::isEmail($email)){
    $errors['email'] = "Please provide a valid email address.";
}
if(!Validator::isString($password,7,255)){
    $errors['password'] = "Please provide a valid password at least 7 character";
}
if(!empty($errors)){
     view('registration/create',[
        'errors' => $errors
    ]);
     return;
}
$db = App::resolve(Database::class);

$user = $db->find('select * from user where email = :email',[
    'email' => $email
]);

if(!$user) {
    $db->query('INSERT INTO user(email,password) VALUES(:email,:password)', [
        'email' => $email,
        "password" => $password
    ]);

    $_SESSION['user'] = [
        'email' => $email
    ];
}
header('location: /');
die();
