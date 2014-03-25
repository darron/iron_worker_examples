@extends('admin._layouts.default')

@section('main')

<a class="btn btn-primary" href="{{ URL::route('admin.users.create') }}">Create user</a>

{{ Form::open(array('route' => array('admin.users.sendmail'), 'method' => 'post', 'id' => 'form-user-sendmail')) }}
<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Title</th>
        <th>When</th>
        <th><i class="icon-cog"></i></th>
    </tr>
    </thead>
    <tbody>
        @foreach ($users as $user)
            <tr>
                <td>{{ $user->id }}</td>
                <td><a href="{{ URL::route('admin.users.show', $user->id) }}">{{ $user->email }}</a></td>
                <td>{{ $user->created_at }}</td>
                <td>
                    <input tabindex="1" type="checkbox" name="users[]" id="{{$user->id}}" value="{{$user->id}}">
                </td>
            </tr>
        @endforeach
    </tbody>
</table>

<button type="submit" id='btn-user-sendmail' href="{{ URL::route('admin.users.sendmail') }}" class="btn btn-success pull-right has-spinner">
    <span class="spinner"><i class="icon-spin icon-refresh"></i></span>
    Send mail
</button>
{{ Form::close() }}
@stop