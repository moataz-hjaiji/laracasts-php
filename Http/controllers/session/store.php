<?php

use Core\App;
use Core\Authenticator;
use Core\Database;
use Core\Validator;
use Http\Forms\LoginForm;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if(!$form->validate($email,$password)){
     view('session/create',[
        "errors" => $form->getErrors()
    ]);
    return;
};

$authenticator = new Authenticator();
if($authenticator->attempt($email,$password)){
    redirect('/');
}

$errors['email'] = "not found user with this email";

view('session/create',[
  "errors" => $errors
]);







