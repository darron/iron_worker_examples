<?php
include("./lib/iron_worker.phar");

echo "This is master worker\n Trying to run slave...\n";

$payload = getPayload();

print_r($payload);

$name = "SlaveWorker";
$iw = new IronWorker(array(
                     'token' => $payload->token,
                     'project_id' => $payload->project_id
                     ));

$payload = array(
    'token' => $payload->token,
    'project_id' => $payload->project_id
);

$task_id = $iw->postTask($name, $payload);
echo "task_id = $task_id \n";
# Wait for task finish
$details = $iw->waitFor($task_id);
print_r($details);
$log = $iw->getLog($task_id);
echo "Task log:\n $log\n";