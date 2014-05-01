<?php
require_once "phar://../iron_worker.phar";

$worker = new IronWorker();

echo "Uploading 'hello_worker.php' to Iron.io as worker named 'HelloWorker' ... stay tuned ...\n";

$worker->upload(dirname(__FILE__), 'hello_worker.php', 'HelloWorker');

echo "... and the upload is finished, now run `php enqueue.php` to run it on Iron.io\n";