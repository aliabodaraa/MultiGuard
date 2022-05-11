<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Info</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}">
</head>
<body>
    @if(session('success'))
    <div class="alert alert-success">
        <strong>{{session('success')}}</strong>
    </div>
    @endif
    <div class="card">
        <h5 class="card-header">Info For Admin</h5>
    </div>
</body>
</html>
