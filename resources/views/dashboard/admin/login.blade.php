<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Admin Login</title>

    <link href="{{ asset('css/app.css') }}" rel="stylesheet">

    {{-- <link rel="stylesheet" href="{{ asset('css/bootstrap.min.css') }}"> --}}
</head>
<body class="bg-black" style="margin-top: 30px;">
<div class="container">
    <div class="row">
      <div class="col-md-4 offset-md-4">
        @if (session('fail'))
            <div class="alert alert-success">
                {{Session::get("fail")}}
            </div>
        @endif
        <form action="{{route('admin.check')}}" method="post" autocomplete="false">
            @csrf
            <h2 class="text-white">Admin Login</h2>
            <div class="form-group">
                <label for="email"></label>
                <input type="email" name="email" id="" value="{{old('email')}}" class="form-control" placeholder="Enter Your Email Here">
                <span class="text-danger">@error('email'){{ $message }} @enderror</span>
            </div>
            <div class="form-group">
                <label for="password"></label>
                <input type="password" name="password" id="" value="{{old('password')}}" class="form-control" placeholder="Enter Your Password Here">
                <span class="text-danger">@error('password'){{$message}}@enderror</span>
            </div>
            <div class="form-group">
                <button type="submit" class="btn btn-primary mt-9">LogIn</button>
            </div>
            <br>
            {{-- <a href="{{route('user.register')}}">Create A New Account</a> --}}
        </form>
    </div>
</div>
</body>
</html>
