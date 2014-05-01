<?php
require_once "phar://iron_worker.phar";

$worker = new IronWorker();
$name = "emailWorker.php";

//uploading worker
$worker->upload(dirname(__FILE__)."/workers/email_worker", 'emailWorker.php', $name);

$payload = array(
    'host' => 'smtp.gmail.com',
    'port'    => 587,
    'username' => 'username',
    'password' => 'passw',
    'from'     => 'from@mail.com',
    'to'     => 'sample@mail.com',
    'subject' => "Title",
    'body'    => "Hey it's a body"
);

//queueing task
$task_id = $worker->postTask($name, $payload);


