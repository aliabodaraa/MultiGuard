<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>User Login</title>
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    {{-- <link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet"> --}}
    <style>
        form{
            margin-top: 79px;
        }
        .form-control{
            margin: 15px;
        }
        label{
            margin-left: 15px;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        <form action="{{ route('user.create') }}" method="post">
            @csrf
            @if (Session::get('fail'))
                <div class="alert alert-success">
                    {{Session::flash("fail")}}
                    {{session('fail')}}
                </div>
            @endif
            <h2>User Registeration</h2>
            <div class="form-group">
                <label for="name">name</label>
                <input type="text" name="name" value="{{ old('name') }}" class="form-control" placeholder="Enter Your Full-Name Here">
                <span class="text-danger">@error('name') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="email">email</label>
                <input type="text" name="email" value="{{ old('email') }}" class="form-control" placeholder="Enter Your Email Here">
                {{-- @if ($errors->has('email'))
                 <span class="text-danger">{{ $errors->first('email') }}</span>
                @endif --}}
                <span class="text-danger">@error('email') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="password">password</label>
                <input type="text" name="password" value="{{ old('password') }}" class="form-control" placeholder="Enter Your Password Here">
                <span class="text-danger">@error('password') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
                <label for="confirmPassword">Confirm Password</label>
                <input type="text" name="confirmPassword" value="{{ old('confirmPassword') }}" class="form-control" placeholder="Please Confirm The Password Here">
                <span class="text-danger">@error('confirmPassword') {{$message}} @enderror</span>
            </div>
            <div class="form-group">
            <button type="submit" class="btn btn-primary">Register</button>
            </div>
            <br>
            <a href="{{route('user.login')}}">I Already Have An Account</a>
            @if(Session::get('success'))
            <div class="alert alert-success">
                {{Session::get("success")}}
            </div>
        @elseif (Session::get('fail'))
            <div class="alert alert-success">
                {{Session::get("fail")}}
            </div>
        @endif
        </form>
    </div>
</div>
</body>
</html>
