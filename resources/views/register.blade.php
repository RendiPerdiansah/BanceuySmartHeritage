
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="css/register.css">
</head>
<body>
    <div class="form-container">
        <p class="title">Create account</p>
       
    
        <!-- Flash Success Message -->
        @if (session('success'))
            <div style="color: green; margin-bottom: 10px;">
                {{ session('success') }}
            </div>
        @endif
    
        <!-- Validasi Error -->
        @if ($errors->any())
            <div style="color: red; margin-bottom: 10px;">
                <ul style="margin: 0; padding-left: 20px;">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
    
        <!-- FORM REGISTER -->
        <form class="form" method="POST" action="{{ route('akun.register') }}">
            @csrf
            <input type="text" name="nama" class="input" placeholder="Nama Lengkap" value="{{ old('nama') }}" required>
            <input type="text" name="username" class="input" placeholder="Username" value="{{ old('username') }}" required>
            <input type="text" name="no_hp" class="input" placeholder="No HP" value="{{ old('no_hp') }}" required>
            <input type="email" name="email" class="input" placeholder="Email" value="{{ old('email') }}" required>
            <input type="text" name="alamat" class="input" placeholder="Alamat" value="{{ old('alamat') }}" required>
            <!-- Removed hidden status input to allow controller to set it -->
            <input type="password" name="password" class="input" placeholder="Password" required>
            <input type="password" name="password_confirmation" class="input" placeholder="Konfirmasi Password" required>
            <button class="form-btn" type="submit">Create account</button>
        </form>
    
        <p class="sign-up-label">
            Already have an account?
            <span class="sign-up-link"><a href="/login">Log in</a></span>
        </p>
    
       
    </div>
</body>
</html>

