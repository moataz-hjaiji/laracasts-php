<?php

const BASE_URL = __DIR__.'/../';



require BASE_URL . '/Core/functions.php';


spl_autoload_register(function ($class){
    require base_url("Core/{$class}.php");
});




require base_url('router.php');

