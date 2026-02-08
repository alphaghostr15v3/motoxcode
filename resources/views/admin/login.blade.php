<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Superbike Community | Admin Login</title>
    <!-- Modern Typography -->
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@100..900&display=swap" rel="stylesheet">
    <!-- Bootstrap 5 -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    
    <style>
        :root {
            --primary-red: #ff0000;
            --bg-black: #000000;
            --dark-card: #111111;
            --text-gray: #aaaaaa;
        }

        body {
            font-family: 'Outfit', sans-serif;
            background-color: var(--bg-black);
            color: white;
            height: 100vh;
            margin: 0;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            background: linear-gradient(rgba(0,0,0,0.7), rgba(0,0,0,0.9)), url('https://images.unsplash.com/photo-1621252179027-94459d278660?auto=format&fit=crop&w=1920&q=80');
            background-size: cover;
            background-position: center;
        }

        .login-card {
            background: rgba(17, 17, 17, 0.95);
            border: 1px solid #333;
            border-radius: 4px;
            width: 100%;
            max-width: 450px;
            padding: 3rem;
            box-shadow: 0 20px 40px rgba(0,0,0,0.5);
            backdrop-filter: blur(10px);
        }

        .brand-logo {
            text-align: center;
            margin-bottom: 2rem;
        }

        .logo-box {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            width: 60px;
            height: 45px;
            background: var(--primary-red);
            clip-path: polygon(0 0, 100% 0, 80% 100%, 0% 100%);
            margin-bottom: 1rem;
        }

        .logo-box i {
            color: white;
            font-size: 1.5rem;
            margin-left: -5px;
        }

        .brand-text {
            font-weight: 900;
            font-style: italic;
            text-transform: uppercase;
            letter-spacing: -1px;
            line-height: 1;
            font-size: 1.5rem;
        }

        .brand-subtext {
            color: var(--primary-red);
            font-weight: 700;
            font-style: italic;
            text-transform: uppercase;
            font-size: 0.8rem;
            letter-spacing: 2px;
            display: block;
        }

        .form-label {
            text-transform: uppercase;
            font-weight: 700;
            font-style: italic;
            font-size: 0.75rem;
            letter-spacing: 1px;
            color: var(--text-gray);
            margin-bottom: 0.5rem;
        }

        .form-control {
            background: #1a1a1a;
            border: 1px solid #333;
            color: white;
            border-radius: 2px;
            padding: 0.75rem 1rem;
            font-weight: 500;
        }

        .form-control:focus {
            background: #222;
            border-color: var(--primary-red);
            color: white;
            box-shadow: none;
        }

        .btn-login {
            background: var(--primary-red);
            color: white;
            border: none;
            border-radius: 2px;
            padding: 0.75rem;
            font-weight: 800;
            font-style: italic;
            text-transform: uppercase;
            letter-spacing: 1px;
            width: 100%;
            margin-top: 1.5rem;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #cc0000;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(255, 0, 0, 0.3);
        }

        .back-link {
            display: block;
            text-align: center;
            margin-top: 2rem;
            color: var(--text-gray);
            text-decoration: none;
            font-weight: 600;
            font-style: italic;
            text-transform: uppercase;
            font-size: 0.75rem;
            letter-spacing: 1px;
            transition: color 0.3s;
        }

        .back-link:hover {
            color: white;
        }

        .back-link i {
            margin-right: 5px;
        }

        .alert-danger {
            background: rgba(255, 0, 0, 0.1);
            border: 1px solid var(--primary-red);
            color: white;
            border-radius: 2px;
            font-size: 0.85rem;
            font-weight: 500;
        }
    </style>
</head>
<body>

    <div class="login-card">
        <div class="brand-logo">
            <div class="logo-box">
                <i class="fas fa-motorcycle"></i>
            </div>
            <div class="lh-1">
                <span class="brand-text">SUPERBIKE</span>
                <span class="brand-subtext">COMMUNITY</span>
            </div>
        </div>

        <form action="{{ route('admin.login.submit') }}" method="POST">
            @csrf
            
            @if ($errors->any())
                <div class="alert alert-danger mb-4">
                    <ul class="m-0 ps-3">
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

            <div class="mb-3">
                <label class="form-label">Admin Email</label>
                <input type="email" name="email" class="form-control" placeholder="admin@superbike.com" required value="{{ old('email') }}">
            </div>

            <div class="mb-4">
                <label class="form-label">Password</label>
                <input type="password" name="password" class="form-control" placeholder="••••••••" required>
            </div>

            <button type="submit" class="btn-login">
                Access Admin Panel
            </button>
        </form>

        <a href="{{ url('/') }}" class="back-link">
            <i class="fas fa-long-arrow-alt-left"></i> Back to Website
        </a>
    </div>

</body>
</html>


