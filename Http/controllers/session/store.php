<?php

use Core\App;
use Core\Authenticator;
use Http\Forms\LoginForm;
use Core\Session;

$email = $_POST['email'];
$password = $_POST['password'];

$form = new LoginForm();
if($form->validate($email,$password)){
    $authenticator = new Authenticator();
    if($authenticator->attempt($email,$password)){
        redirect('/');
    }
        $form->error('email',"not found user with this email");
};

Session::flash("errors",$form->getErrors());


redirect('/login');

//view('session/create',[
//    "errors" => $form->getErrors()
//]);
//return;







