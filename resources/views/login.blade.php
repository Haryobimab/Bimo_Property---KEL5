<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login Page</title>
  <link rel="stylesheet" href="https://unpkg.com/bootstrap@5.3.2/dist/css/bootstrap.min.css">
  <link rel="stylesheet" href="https://unpkg.com/bs-brain@2.0.3/components/logins/login-4/assets/css/login-4.css">
  <style>
    /* Custom CSS */
    .center-text {
      text-align: center;
    }
    
    .green-text {
      color: green;
    }
  </style>
</head>
<body>
  <!-- Login 4 - Bootstrap Brain Component -->
<section class="p-3 p-md-4 p-xl-5">
  <div class="container">
    <div class="card border-light-subtle shadow-sm">
      <div class="row g-0">
        <div class="col-12 col-md-6">
          <img class="img-fluid rounded-start w-100 h-100 object-fit-cover" loading="lazy" src="{{ asset('IMG/house1.jpg') }}" alt="rumah">
        </div>
        <div class="col-12 col-md-6">
          <div class="card-body p-3 p-md-4 p-xl-5">
            <div class="row">
              <div class="col-12">
                <div class="mb-5">
                  <h3>Log in</h3>
                  <p class="card-text">Welcome back! Please enter your details.</p>
                </div>
              </div>
            </div>
            <form action="#!">
              <div class="row gy-3 gy-md-4 overflow-hidden">
                <div class="col-12">
                  <label for="email" class="form-label">Email <span class="text-danger">*</span></label>
                  <input type="email" class="form-control" name="email" id="email" placeholder="name@example.com" required>
                </div>
                <div class="col-12">
                  <label for="password" class="form-label">Password <span class="text-danger">*</span></label>
                  <input type="password" class="form-control" name="password" id="password" value="" required>
                </div>
                <div class="col-12">
                  <div class="d-flex align-items-center justify-content-between">
                    <div class="form-check">
                      <input class="form-check-input" type="checkbox" value="" name="remember_me" id="remember_me">
                      <label class="form-check-label text-secondary" for="remember_me">
                        Remember for 30 days
                      </label>
                    </div>
                    <a href="#" class="btn btn-link right-align">Forgot password</a>
                  </div>
                </div>
                <div class="col-12">
                  <div class="d-grid">
                    <button class="btn bsb-btn-xl btn-success" type="submit">Sign in</button>
                  </div>
                </div>
              </div>
            </form>

            <div class="mt-3">
              <div class="d-grid">
                <a href="auth/redirect" class="btn btn-outline-secondary btn-block">
                  <img src="https://img.icons8.com/color/16/000000/google-logo.png" alt="Google Logo"> Sign in with Google
                </a>
              </div>
            </div>


            <p class="mt-3 center-text">Don't have an account? <a href="#" class="green-text">Sign Up</a></p>
          </div>
          <div class="mt-3 center-text">
              <p>&copy; 2024 Bimo Property</p>
            </div>
        </div>
      </div>
    </div>
  </div>
</section>
</body>
</html>
