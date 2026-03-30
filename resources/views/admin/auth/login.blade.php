<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login — SK Document Centre</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.1/css/all.min.css">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <style>
        :root { --primary: #0f2044; --gold: #c9a84c; }
        body {
            font-family: 'Poppins', sans-serif;
            background: linear-gradient(135deg, var(--primary) 0%, #1a3460 100%);
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px;
        }
        .login-card {
            background: #fff;
            border-radius: 20px;
            width: 100%;
            max-width: 420px;
            overflow: hidden;
            box-shadow: 0 20px 60px rgba(0,0,0,0.35);
        }
        .login-header {
            background: var(--primary);
            padding: 32px 36px 28px;
            text-align: center;
        }
        .login-logo {
            width: 62px; height: 62px;
            background: var(--gold);
            border-radius: 14px;
            display: flex; align-items: center; justify-content: center;
            font-size: 26px; font-weight: 800;
            color: var(--primary);
            margin: 0 auto 14px;
        }
        .login-header h4 { color: #fff; font-size: 18px; font-weight: 700; margin-bottom: 4px; }
        .login-header p  { color: rgba(255,255,255,0.6); font-size: 13px; margin: 0; }
        .login-body { padding: 32px 36px 36px; }
        .form-label { font-size: 13px; font-weight: 600; color: var(--primary); margin-bottom: 6px; }
        .form-control {
            border: 1.5px solid #e2e8f0;
            border-radius: 9px;
            padding: 12px 16px 12px 42px;
            font-size: 14px;
            transition: all 0.2s;
        }
        .form-control:focus { border-color: var(--gold); box-shadow: 0 0 0 3px rgba(201,168,76,0.12); outline: none; }
        .input-icon { position: relative; }
        .input-icon i {
            position: absolute;
            left: 14px; top: 50%;
            transform: translateY(-50%);
            color: #b0bac5; font-size: 14px;
        }
        .btn-login {
            background: var(--gold);
            color: var(--primary);
            font-weight: 700;
            font-size: 14.5px;
            border: none;
            border-radius: 9px;
            padding: 13px;
            width: 100%;
            transition: all 0.2s;
            letter-spacing: 0.3px;
        }
        .btn-login:hover { background: #a8893a; color: var(--primary); }
        .back-link { font-size: 13px; color: #8a99b0; text-align: center; margin-top: 18px; }
        .back-link a { color: var(--primary); font-weight: 600; }
        .is-invalid { border-color: #dc2626 !important; }
        .invalid-feedback { font-size: 12px; }
        .alert-danger-custom {
            background: rgba(239,68,68,0.08);
            border: 1px solid rgba(239,68,68,0.2);
            color: #dc2626;
            border-radius: 9px;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 20px;
        }
        .alert-success-custom {
            background: rgba(34,197,94,0.08);
            border: 1px solid rgba(34,197,94,0.2);
            color: #16a34a;
            border-radius: 9px;
            padding: 12px 16px;
            font-size: 13px;
            margin-bottom: 20px;
        }
    </style>
</head>
<body>
    <div class="login-card">
        <div class="login-header">
            <div class="login-logo">SK</div>
            <h4>Admin Panel</h4>
            <p>S K Document Centre CMS</p>
        </div>
        <div class="login-body">
            @if(session('success'))
                <div class="alert-success-custom"><i class="fas fa-check-circle me-2"></i>{{ session('success') }}</div>
            @endif
            @if($errors->any())
                <div class="alert-danger-custom"><i class="fas fa-exclamation-circle me-2"></i>{{ $errors->first() }}</div>
            @endif

            <form method="POST" action="{{ route('admin.login.post') }}">
                @csrf
                <div class="mb-4">
                    <label class="form-label">Email Address</label>
                    <div class="input-icon">
                        <i class="fas fa-envelope"></i>
                        <input type="email" name="email" class="form-control @error('email') is-invalid @enderror"
                               value="{{ old('email') }}" placeholder="admin@example.com" required autofocus>
                    </div>
                    @error('email')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                </div>

                <div class="mb-4">
                    <label class="form-label">Password</label>
                    <div class="input-icon">
                        <i class="fas fa-lock"></i>
                        <input type="password" name="password" class="form-control @error('password') is-invalid @enderror"
                               placeholder="Enter your password" required>
                    </div>
                    @error('password')<div class="invalid-feedback d-block">{{ $message }}</div>@enderror
                </div>

                <div class="d-flex align-items-center justify-content-between mb-4">
                    <div class="form-check mb-0">
                        <input type="checkbox" class="form-check-input" name="remember" id="remember" style="border-color:#c9a84c;">
                        <label class="form-check-label" for="remember" style="font-size:13px; color:#555;">Remember me</label>
                    </div>
                </div>

                <button type="submit" class="btn-login">
                    <i class="fas fa-sign-in-alt me-2"></i> Sign In
                </button>
            </form>

            <div class="back-link">
                <a href="{{ url('/') }}"><i class="fas fa-arrow-left me-1"></i> Back to Website</a>
            </div>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
