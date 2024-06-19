@extends('app')
@section('title', 'Login')
@section('content')
    <div class="login-wrapper">
        @error('error')
        <div class="errors">
            {{ $message }}
        </div>
        @enderror
        <form class="login-form" method="POST" action="{{route('login_attempt')}}">
            @csrf
            <div class="form-group">
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" placeholder="Enter e-mail" value="{{old('email') ?? ''}}">
                <label for="password">Password:</label>
                <input type="password" id="password" name="password" placeholder="Enter password" value="{{old('password') ?? ''}}">
                <div class="remember">
                    <input type="checkbox" id="remember" name="remember">
                    <span>Remember me</span>
                </div>
            </div>
            <button type="submit">Login</button>
        </form>
    </div>
@endsection
