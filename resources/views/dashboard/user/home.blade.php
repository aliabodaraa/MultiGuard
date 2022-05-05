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
<table class="table tabe-success">
    <th>name</th>
    <th>email</th>
    <th>action</th>
    <tr>
        <td>{{auth()->user()->name}}</td>
        <td>{{Auth::user()->email}}</td>
        <td>
            <a href="{{route('user.logout')}}" onclick="event.preventDefault();document.getElementById('form-logout').submit()">
                LogOut
            </a>
            <form action="{{route('user.logout')}}" id="form-logout" method="post" class="d.none">@csrf</form>
        </td>
</table>
</body>
</html>
