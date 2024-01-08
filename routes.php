<?php

//return [
//    '/' => 'controllers/index.php',
//    '/about' => 'controllers/about.php',
//    '/notes' => 'controllers/notes/index.php',
//    '/note' => 'controllers/notes/show.php',
//    '/note/create' => 'controllers/notes/create.php',
//    '/contact' => 'controllers/contact.php'
//];
$router = new \Core\Router();
$router->get('/','controllers/index.php');
$router->get('/about','controllers/about.php');
$router->get('/contact', 'controllers/contact.php');


$router->get('/notes', 'controllers/notes/index.php')->only('auth');
$router->post('/notes', 'controllers/notes/store.php');
$router->get('/note', 'controllers/notes/show.php');
$router->get('/note/create', 'controllers/notes/create.php');

$router->get('/note/edit', 'controllers/notes/edit.php');
$router->patch('/note', 'controllers/notes/update.php');



$router->get('/note/create', 'controllers/notes/destroy.php');
$router->delete('/note', 'controllers/notes/destroy.php');


$router->get('/register','controllers/registration/create.php')->only('guest');
$router->post('/register','controllers/registration/store.php')->only('guest');


$router->get('/login','controllers/session/create.php')->only('guest');
$router->post('/sessions','controllers/session/store.php')->only('guest');
$router->delete('/sessions','controllers/session/destroy.php')->only('auth');
