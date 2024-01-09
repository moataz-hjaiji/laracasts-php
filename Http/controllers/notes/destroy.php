<?php

use Core\Database;
use Core\App;

$currentUserId= 1;
//$config = require base_url('config.php');
//$db = new Database($config['database']);
$db = App::getContainer()->resolve('Core\Database');

$note_id = $_POST['id'];

$note = $db->findOrFail('select * from notes where id = :id',['id'=>$note_id]);
authorize($note['user_id']===$currentUserId);
$note_id = $_POST['id'];
$db->query("delete from notes where id = :id ",[
    "id" => (int) $note_id
]);
header('location: /notes');
exit();
