@extends('admin._layouts.default')

@section('main')

<h2>show article</h2>

{{ Notification::showAll() }}

@if ($errors->any())
<div class="alert alert-error">
    {{ implode('<br>', $errors->all()) }}
</div>
@endif


<div class="control-group">
    Email:
    <div class="controls">
        {{ $user->email }}
    </div>
</div>

<div class="control-group">
    First Name:
    <div class="controls">
        {{ $user->first_name }}

    </div>
</div>

<div class="control-group">
    Last Name:
    <div class="controls">
        {{ $user->last_name }}

    </div>
</div>

<div class="form-actions">

    <a href="{{ URL::route('admin.users.index') }}" class="btn btn-large">Cancel</a>
</div>

@stop