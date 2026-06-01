<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Login Admin &mdash; Arcline Studio</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom-arcline.css') }}">

  <style>
    body {
      background: linear-gradient(135deg, #f5f7ff 0%, #e4ecfa 100%);
      min-height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
    }
    .login-container {
      max-width: 450px;
      width: 100%;
      padding: 20px;
    }
    .card-login {
      border: none;
      border-radius: 12px;
      box-shadow: 0 10px 30px rgba(103, 119, 239, 0.08);
      overflow: hidden;
      transition: all 0.3s ease;
    }
    .card-login:hover {
      transform: translateY(-2px);
      box-shadow: 0 15px 35px rgba(103, 119, 239, 0.12);
    }
    .login-header-accent {
      height: 4px;
      background: linear-gradient(90deg, #6777ef, #9c88ff);
    }
    .brand-logo {
      font-size: 24px;
      font-weight: 700;
      color: #6777ef;
      letter-spacing: 0.5px;
    }
    .brand-logo span {
      color: #333;
    }
    .form-group-custom {
      position: relative;
    }
    .btn-login-gradient {
      background: linear-gradient(90deg, #6777ef, #5a6ae6);
      color: #fff;
      font-weight: 600;
      border: none;
      transition: all 0.3s ease;
    }
    .btn-login-gradient:hover {
      background: linear-gradient(90deg, #5a6ae6, #6777ef);
      transform: translateY(-1px);
      box-shadow: 0 4px 12px rgba(103, 119, 239, 0.3);
      color: #fff;
    }
    .input-password-wrapper {
      position: relative;
    }
    .password-toggle {
      position: absolute;
      right: 12px;
      top: 50%;
      transform: translateY(-50%);
      cursor: pointer;
      color: #a0aec0;
      transition: color 0.2s ease;
      z-index: 10;
    }
    .password-toggle:hover {
      color: #6777ef;
    }
  </style>
</head>

<body>
  <div class="login-container">
    <div class="text-center mb-4">
      <div class="brand-logo mb-1">Arc<span>line</span> Studio</div>
      <div class="text-muted text-small font-weight-bold">ADMIN PANEL ACCESS</div>
    </div>

    @if(session('success'))
      <div class="alert alert-success alert-dismissible show fade">
        <div class="alert-body">
          <button class="close" data-dismiss="alert"><span>&times;</span></button>
          <i class="fas fa-check-circle mr-1"></i> {{ session('success') }}
        </div>
      </div>
    @endif

    <div class="card card-login">
      <div class="login-header-accent"></div>
      <div class="card-body p-4 p-md-5">
        <h5 class="text-dark font-weight-bold mb-4">Sign In</h5>

        <form method="POST" action="{{ route('login') }}" class="needs-validation" novalidate="">
          @csrf

          <div class="form-group mb-4">
            <label for="email" class="text-small font-weight-bold text-muted">Email Address</label>
            <div class="input-group">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-envelope"></i></div>
              </div>
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" placeholder="admin@arcline.com" required autofocus>
              @error('email')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="form-group mb-4">
            <div class="d-block">
              <label for="password" class="control-label text-small font-weight-bold text-muted">Password</label>
            </div>
            <div class="input-group input-password-wrapper">
              <div class="input-group-prepend">
                <div class="input-group-text"><i class="fas fa-lock"></i></div>
              </div>
              <input id="password" type="password" class="form-control pr-5 @error('password') is-invalid @enderror" name="password" placeholder="••••••••" required>
              <i class="far fa-eye password-toggle" id="togglePassword"></i>
              @error('password')
                <div class="invalid-feedback">{{ $message }}</div>
              @enderror
            </div>
          </div>

          <div class="form-group mb-4">
            <div class="custom-control custom-checkbox">
              <input type="checkbox" name="remember" class="custom-control-input" id="remember-me">
              <label class="custom-control-label text-small text-muted font-weight-bold" for="remember-me">Remember Me</label>
            </div>
          </div>

          <div class="form-group mb-0">
            <button type="submit" class="btn btn-login-gradient btn-lg btn-block">
              <i class="fas fa-sign-in-alt mr-2"></i> Log In
            </button>
          </div>
        </form>
      </div>
    </div>

    <div class="text-center mt-4 text-muted text-small">
      &copy; {{ date('Y') }} Arcline Studio. All rights reserved.
    </div>
  </div>

  <!-- General JS Scripts -->
  <script src="{{ asset('assets/modules/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/modules/popper.js') }}"></script>
  <script src="{{ asset('assets/modules/bootstrap/js/bootstrap.min.js') }}"></script>

  <!-- Template JS File -->
  <script src="{{ asset('assets/js/scripts.js') }}"></script>

  <script>
    document.addEventListener('DOMContentLoaded', function () {
      const togglePassword = document.querySelector('#togglePassword');
      const password = document.querySelector('#password');

      togglePassword.addEventListener('click', function () {
        // Toggle type attribute
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        
        // Toggle the eye / eye-slash icon
        this.classList.toggle('fa-eye');
        this.classList.toggle('fa-eye-slash');
      });
    });
  </script>
</body>
</html>
