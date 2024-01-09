<?php


$router = new \Core\Router();
$router->get('/','index.php');
$router->get('/about','about.php');
$router->get('/contact', 'contact.php');


$router->get('/notes', 'notes/index.php')->only('auth');
$router->post('/notes', 'notes/store.php');
$router->get('/note', 'notes/show.php');
$router->get('/note/create', 'notes/create.php');

$router->get('/note/edit', 'notes/edit.php');
$router->patch('/note', 'notes/update.php');



$router->get('/note/create', 'notes/destroy.php');
$router->delete('/note', 'notes/destroy.php');


$router->get('/register','registration/create.php')->only('guest');
$router->post('/register','registration/store.php')->only('guest');


$router->get('/login','session/create.php')->only('guest');
$router->post('/sessions','session/store.php')->only('guest');
$router->delete('/sessions','session/destroy.php')->only('auth');
