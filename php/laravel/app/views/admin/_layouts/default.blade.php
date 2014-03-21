<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title>L4 Site</title>
    <link rel="stylesheet" type="text/css" href="/laravel/css/users.index.css" />
    <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.1/css/bootstrap-combined.min.css" />
    <link rel="stylesheet" type="text/css" href="http://netdna.bootstrapcdn.com/font-awesome/3.0.2/css/font-awesome.css" />

    <script src="http://code.jquery.com/jquery-1.11.0.min.js"></script>

    <script src="/laravel/js/users.index.js"></script>

</head>
<body>
<div class="container">
    <div class="navbar navbar-inverse navbar-fixed-top">
        <div class="navbar-inner">
            <div class="container">
                <a class="brand" href="{{ URL::route('admin.users.index') }}">L4 Site</a>
            </div>
        </div>
    </div>

    <hr style="margin-bottom: 60px">

    @yield('main')
</div>
</body>
</html>