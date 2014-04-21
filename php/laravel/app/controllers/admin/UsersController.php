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
            $queue_name = $this->option('queue_name');
            $payload = array(
                'ids' => $users_checked

            );
            $mgs_id = Queue::pushRaw($payload, $queue_name);

            $response = array(
                'status' => 'success',
                'msg' => "Task id = $mgs_id"
            );
        } else
            $response = array(
                'status' => 'failed',
                'msg' => 'No users checked',
            );

        return \Response::json($response);
    }
}
