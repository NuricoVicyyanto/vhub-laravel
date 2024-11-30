<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Login</title>

  <!-- Custom fonts -->
  <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
  
  <!-- Custom styles for this template -->
  <link href="{{ asset('assets/admin/css/sb-admin-2.min.css') }}" rel="stylesheet">
</head>

<body class="bg-gradient-primary">

  <div class="container">
    <div class="row justify-content-center">
      <div class="col-lg-6 col-md-9">
        <div class="card o-hidden border-0 shadow-lg my-5">
          <div class="card-body">
            <div class="text-center">
              <h1 class="h4 text-gray-900 mb-4">Welcome Back!</h1>
            </div>
            <form>
              <div class="form-group">
                <input type="email" class="form-control" placeholder="Enter Email Address..." required>
              </div>
              <div class="form-group">
                <input type="password" class="form-control" placeholder="Password" required>
              </div>
              <div class="form-group">
                <div class="custom-control custom-checkbox small">
                  <input type="checkbox" class="custom-control-input" id="rememberMe">
                  <label class="custom-control-label" for="rememberMe">Remember Me</label>
                </div>
              </div>
              <button type="submit" class="btn btn-primary btn-block">Login</button>
              <hr>
              <div class="text-center">
                <a href="forgot-password.html" class="small">Forgot Password?</a>
              </div>
              <div class="text-center">
                <a href="register.html" class="small">Create an Account!</a>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <!-- Scripts -->
  <script src="{{ asset('assets/admin/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
  <script src="{{ asset('assets/admin/vendor/jquery-easing/jquery.easing.min.js') }}"></script>
  <script src="{{ asset('assets/admin/js/sb-admin-2.min.js') }}"></script>
</body>

</html>
