<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <form action="{{route('user.check')}}" method="post">
            @csrf
        @if(Session::get('success'))
            <div class="alert alert-success">
                {{Session::get("success")}}
            </div>
        @elseif (Session::get('fail'))
            <div class="alert alert-success">
                {{Session::get("fail")}}
            </div>
        @endif
            <h2>User Login</h2>
            <div class="form-group">
                <label for="email"></label>
                <input type="text" name="email" id="" class="form-control" placeholder="Enter Your Email Here">
                @if ($errors->has('email'))
                 <span class="text-danger">@error('email'){{ $message }} @enderror</span>
                @endif
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="text" name="password" id="" class="form-control" placeholder="Enter Your Password Here">
                @if ($errors->has('password'))
                 <span class="text-danger">{{ $errors->first('password') }}</span>
                @endif
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">LogIn</button>
            </div>
            <br>
            <a href="{{route('user.register')}}">Create A New Account</a>
        </form>
    </div>
</div>
</body>
</html>
