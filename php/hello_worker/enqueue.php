<?php
require_once "phar://../iron_worker.phar";

$worker = new IronWorker();

echo "Starting a task for 'HelloWorker' on Iron.io ... stay tuned ...\n";

$task_id = $worker->postTask('HelloWorker', array(
    'some_param'  => 'some_value',
    'other_param' => array(1, 2, 3)
));

echo "Your task #$task_id has been queued up, check https://hud.iron.io to see your task status and log.\n";