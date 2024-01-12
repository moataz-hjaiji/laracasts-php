<?php

use Core\App;
use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;

$form = LoginForm::validate($attributes = [
        'email' => $_POST['email'],
        'password' => $_POST['password']
]);
$signedIn = (new Authenticator)->attempt($attributes['email'],$attributes['password']);
if(!$signedIn){
    $form->error('email',"not found user with this email")->throw();
}
redirect('/');







