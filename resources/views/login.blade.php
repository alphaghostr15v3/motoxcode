<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>MOTOXCODE | Member Login</title>
    
    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    
    <!-- CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-red: #e60000;
            --dark-bg: #0b0b0b;
            --dark-card: rgba(0, 0, 0, 0.85);
            --input-border: #333;
            --text-main: #ffffff;
            --text-muted: #aaaaaa;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--dark-bg);
            color: var(--text-main);
            margin: 0;
            overflow: hidden;
        }

        .login-wrapper {
            min-height: 100vh;
            background: linear-gradient(rgba(0,0,0,0.6), rgba(0,0,0,0.8)), 
                        url('https://images.unsplash.com/photo-1558981403-c5f9899a28bc?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }

        .login-card {
            width: 100%;
            max-width: 450px;
            background: var(--dark-card);
            backdrop-filter: blur(15px);
            border: 1px solid #222;
            border-top: 4px solid var(--primary-red);
            padding: 3.5rem;
            box-shadow: 0 40px 100px rgba(0,0,0,0.8);
            border-radius: 4px;
        }

        .brand-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-box {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 70px;
            height: 50px;
            background: var(--primary-red);
            clip-path: polygon(0 0, 100% 0, 80% 100%, 0% 100%);
            margin-bottom: 1.5rem;
        }

        .logo-box i {
            color: white;
            font-size: 1.8rem;
            margin-left: -5px;
        }

        .login-title {
            font-size: 2.2rem;
            font-weight: 900;
            font-style: italic;
            text-transform: uppercase;
            letter-spacing: -1px;
            line-height: 1;
            margin-bottom: 0.5rem;
        }

        .text-red { color: var(--primary-red); }

        .login-subtitle {
            color: var(--text-muted);
            font-size: 0.85rem;
            font-weight: 700;
            text-transform: uppercase;
            letter-spacing: 2px;
            margin-bottom: 3rem;
        }

        .login-label {
            display: block;
            color: #eee;
            font-size: 0.8rem;
            font-weight: 800;
            text-transform: uppercase;
            font-style: italic;
            letter-spacing: 1px;
            margin-bottom: 0.75rem;
        }

        .login-input {
            width: 100%;
            background: #000;
            border: 1px solid #333;
            border-radius: 2px;
            padding: 0.9rem 1.25rem;
            color: #ffffff;
            font-size: 1rem;
            transition: all 0.3s;
        }

        .login-input:focus {
            outline: none;
            border-color: var(--primary-red);
            box-shadow: 0 0 0 1px var(--primary-red);
        }

        .login-input::placeholder {
            color: #444;
            font-style: italic;
        }

        .forgot-link {
            color: var(--primary-red);
            font-size: 0.8rem;
            font-weight: 700;
            text-decoration: none;
            font-style: italic;
            text-transform: uppercase;
        }

        .btn-login-submit {
            width: 100%;
            background: linear-gradient(180deg, #ff1a1a 0%, #a30000 100%);
            border: 1px solid #ff4d4d;
            color: white;
            padding: 1rem;
            font-weight: 900;
            font-size: 1.1rem;
            text-transform: uppercase;
            font-style: italic;
            border-radius: 2px;
            margin-top: 1.5rem;
            transition: all 0.3s;
            box-shadow: 0 10px 20px rgba(0,0,0,0.3);
        }

        .btn-login-submit:hover {
            filter: brightness(1.2);
            transform: translateY(-2px);
            box-shadow: 0 15px 30px rgba(230,0,0,0.3);
        }

        .signup-text {
            color: var(--text-muted);
            font-size: 0.85rem;
            margin-top: 2rem;
            font-weight: 600;
            font-style: italic;
        }

        .signup-link {
            color: #ffffff;
            font-weight: 800;
            text-decoration: none;
            border-bottom: 2px solid var(--primary-red);
        }

        .alert-danger-custom {
            background: rgba(230, 0, 0, 0.1);
            border: 1px solid var(--primary-red);
            color: #ffcccc;
            border-radius: 2px;
            padding: 1rem;
            margin-bottom: 1.5rem;
        }
    </style>
</head>
<body>

<div class="login-wrapper">
    <div class="login-card text-center">
        <!-- Header -->
        <div class="brand-logo text-center">
            <div class="logo-box">
                <i class="fas fa-motorcycle"></i>
            </div>
            <h1 class="login-title">MOTO<span class="text-red">X</span>CODE</h1>
            <p class="login-subtitle">Member Access</p>
        </div>

        <!-- Form -->
        <form action="{{ route('member.login.submit') }}" method="POST" class="text-start">
            @csrf
            
            @if ($errors->any())
                <div class="alert alert-danger-custom">
                    <ul class="m-0 ps-3 small">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label class="login-label">Email Signature</label>
                <input type="email" name="email" class="login-input" placeholder="rider@motoxcode.com" required value="{{ old('email') }}">
            </div>

            <div class="mb-3">
                <label class="login-label">Password</label>
                <input type="password" name="password" class="login-input" placeholder="••••••••" required>
                <div class="text-end mt-2">
                    <a href="#" class="forgot-link">Lost Gear?</a>
                </div>
            </div>

            <button type="submit" class="btn-login-submit">
                ENTER DASHBOARD
            </button>

            <div class="text-center">
                <p class="signup-text">New rider? <a href="{{ url('/#join') }}" class="signup-link">Join the Pack</a></p>
            </div>
        </form>
    </div>
</div>

</body>
</html>
