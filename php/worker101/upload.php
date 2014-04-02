<?php
require_once "phar://../iron_worker.phar";

$worker = new IronWorker();
$worker->debug_enabled = true;

$worker->upload("worker/", 'worker101.php', "PHPWorker101");

