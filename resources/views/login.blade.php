<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
</head>
<body>
    <div class="form-container">
    <p class="title">Welcome back</p>

    <!-- Tampilkan pesan error jika login gagal -->
    @if (session('message'))
        <div style="color: red; margin-bottom: 10px;">
            {{ session('message') }}
        </div>
    @endif

    <form class="form" method="POST" action="{{ route('akun.login') }}">
      @csrf
      <input type="text" name="username" class="input" placeholder="Username" required>
      <input type="password" name="password" class="input" placeholder="Password" required>
      <button class="form-btn" type="submit">Log in</button>
  </form>
  

    <p class="sign-up-label">
        Don't have an account? 
        <span class="sign-up-link"><a href="/register">Register</a></span>
    </p>

    <div class="buttons-container">
        {{-- <div class="apple-login-button">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" class="apple-icon" viewBox="0 0 1024 1024" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path d="..."></path>
            </svg>
            <span>Log in with Apple</span>
        </div>
        <div class="google-login-button">
            <svg stroke="currentColor" fill="currentColor" stroke-width="0" version="1.1" x="0px" y="0px" class="google-icon" viewBox="0 0 48 48" height="1em" width="1em" xmlns="http://www.w3.org/2000/svg">
                <path d="..."></path>
            </svg>
            <span>Log in with Google</span>
        </div> --}}
    </div>
</div>

</body>
</html>
{{-- @extends('layout.v_tamplate') --}}

