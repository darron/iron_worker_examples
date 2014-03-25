<?php
require __DIR__ . '/bootstrap/autoload.php';
$app = require_once __DIR__ . '/bootstrap/start.php';

$app->setRequestForConsoleEnvironment();
$app->boot();

use App\Models\User;
use Mail;

$payload = getPayload();
//print_r($payload);

fire($payload->ids);

function fire($ids)
{
    if (strpos($ids[0], ',') !== FALSE)
        $ids = explode(',', $ids[0]);

    foreach ($ids as $id) {
        $user = User::find($id);

        echo "Sending mail to $user->email \n";

        Mail::send('mail.template', array('firstname'=>$user->first_name), function($message) use ($user)
        {
            $message->to($user->email, $user->first_name)->subject('Welcome to the Laravel 4 And Iron.io!');
        });

    }
}