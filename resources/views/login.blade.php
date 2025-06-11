<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/login.css">
    <title>Document</title>
    <style>
        body {
            background-image: url({{ asset('assets/images/beranda.jpg') }});
            background-repeat: no-repeat;
            background-position: center center;
            background-size: cover;
            margin: 0;
            min-height: 100vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }
       

        .form-container {
    width: 350px;
    height: 500px;
     background-color: rgba(255, 255, 255, 0.85);
    box-shadow: rgba(0, 0, 0, 0.35) 0px 5px 15px;
    border-radius: 10px;
    box-sizing: border-box;
    padding: 20px 30px;
    margin:auto;
  }
  
  .title {
    text-align: center;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
          "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    margin: 10px 0 30px 0;
    font-size: 28px;
    font-weight: 800;
  }
  
  .form {
    width: 100%;
    display: flex;
    flex-direction: column;
    gap: 18px;
    margin-bottom: 15px;
  }
  
  .input {
    border-radius: 20px;
    border: 1px solid #c0c0c0;
    outline: 0 !important;
    box-sizing: border-box;
    padding: 12px 15px;
  }
  
  .page-link {
    text-decoration: underline;
    margin: 0;
    text-align: end;
    color: #747474;
    text-decoration-color: #747474;
  }
  
  .page-link-label {
    cursor: pointer;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
          "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    font-size: 9px;
    font-weight: 700;
  }
  
  .page-link-label:hover {
    color: #000;
  }
  
  .form-btn {
    padding: 10px 15px;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
          "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    border-radius: 20px;
    border: 0 !important;
    outline: 0 !important;
    background: teal;
    color: white;
    cursor: pointer;
    box-shadow: rgba(0, 0, 0, 0.24) 0px 3px 8px;
  }
  
  .form-btn:active {
    box-shadow: none;
  }
  
  .sign-up-label {
    margin: 0;
    font-size: 10px;
    color: #747474;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
          "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
  }
  
  .sign-up-link {
    margin-left: 1px;
    font-size: 11px;
    text-decoration: underline;
    text-decoration-color: teal;
    color: teal;
    cursor: pointer;
    font-weight: 800;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
          "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
  }
  
  .buttons-container {
    width: 100%;
    display: flex;
    flex-direction: column;
    justify-content: flex-start;
    margin-top: 20px;
    gap: 15px;
  }
  
  .apple-login-button,
      .google-login-button {
    border-radius: 20px;
    box-sizing: border-box;
    padding: 10px 15px;
    box-shadow: rgba(0, 0, 0, 0.16) 0px 10px 36px 0px,
          rgba(0, 0, 0, 0.06) 0px 0px 0px 1px;
    cursor: pointer;
    display: flex;
    justify-content: center;
    align-items: center;
    font-family: "Lucida Sans", "Lucida Sans Regular", "Lucida Grande",
          "Lucida Sans Unicode", Geneva, Verdana, sans-serif;
    font-size: 11px;
    gap: 5px;
  }
  
  .apple-login-button {
    background-color: #000;
    color: #fff;
    border: 2px solid #000;
  }
  
  .google-login-button {
    border: 2px solid #747474;
  }
  
  .apple-icon,
      .google-icon {
    font-size: 18px;
    margin-bottom: 1px;
  }
    </style>
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

