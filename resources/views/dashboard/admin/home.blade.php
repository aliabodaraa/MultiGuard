<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
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
        <h5 class="card-header">Admin Home</h5>
        <div class="card-body">
          <h5 class="card-title"><b>Name :</b>{{auth()->guard('admin')->user()->name}}</h5>
          <h5 class="card-title"><b>Email :</b>{{Auth::guard('admin')->user()->email}}</h5>
          <h5 class="card-title"><b>Phone :</b>{{auth()->guard('admin')->user()->phone}}</h5>
          <a class="btn btn-danger" href="{{route('admin.logout')}}" onclick="event.preventDefault();document.getElementById('form-logout').submit()">LogOut</a>
          <form action="{{route('admin.logout')}}" method="post" id="form-logout" class="d-none">@csrf</form>
        </div>
    </div>
</body>
</html>
