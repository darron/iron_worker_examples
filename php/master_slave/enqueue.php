<?php
require_once "phar://../iron_worker.phar";

$worker = new IronWorker('config.ini');
$name = 'MasterWorker';

$data = @parse_ini_file('config.ini', true);
$payload = array(
    'token'   => $data['iron_worker']['token'],
    'project_id'   => $data['iron_worker']['project_id']
);

$task_id = $worker->postTask($name, $payload);


echo "Your task #$task_id has been queued up, check https://hud.iron.io to see your task status and log. \n";