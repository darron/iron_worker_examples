<?php
require_once "phar://../iron_worker.phar";

$worker = new IronWorker('config.ini');

$worker->upload(dirname(__FILE__)."/workers/master", 'master_worker.php', 'MasterWorker');
$worker->upload(dirname(__FILE__)."/workers/slave", 'slave_worker.php', 'SlaveWorker');