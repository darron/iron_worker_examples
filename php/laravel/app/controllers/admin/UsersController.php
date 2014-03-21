<?php namespace App\Controllers\Admin;

use App\Models\User;
use Input, Redirect, Sentry, Str;
use Notification;
use Config;
use Mail;

class UsersController extends \BaseController
{

    public function index()
    {
        return \View::make('admin.users.index')->with('users', User::all());
    }

    public function show($id)
    {
        return \View::make('admin.users.show')->with('user', User::find($id));
    }

    public function create()
    {
        return \View::make('admin.users.create');
    }

    public function store()
    {
        Sentry::getUserProvider()->create(array(
            'email'       => Input::get('email'),
            'password'    => Input::get('password'),
            'first_name'  => Input::get('first_name'),
            'last_name'   => Input::get('last_name'),
            'activated'   => 1,
        ));

        return Redirect::route('admin.users.index');
    }

    public function sendmail()
    {
        $users_checked = Input::get('users');
        if (is_array($users_checked)) {
            $name = Config::get('iron.worker_name', 'laravel-sendmail');
            $token = Config::get('iron.token', 'xxx');
            $project_id = Config::get('iron.project', 'xxx');
            $uploaded = false;

            $worker = new \IronWorker(array(
                'token' => $token,
                'project_id' => $project_id
            ));

            $codes = $worker->getCodes();
            foreach ($codes as $code) {
                if ($code->name == $name)
                    $uploaded = true;
            }

            if (!$uploaded)
                @$worker->upload(getcwd() . "/../worker", 'worker.php', $name);

            $payload = array(
                'ids' => $users_checked
            );

            $task_id = $worker->postTask($name, $payload);
            $response = array(
                'status' => 'success',
                'msg' => "Task id = $task_id"
            );
        } else
            $response = array(
                'status' => 'failed',
                'msg' => 'No users checked',
            );

        return \Response::json($response);
    }
}
