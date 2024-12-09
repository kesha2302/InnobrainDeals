<!doctype html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>InnoBrain Technologies</title>
  <link rel="shortcut icon" type="image/png" href="{{ asset('AdminPanel/assets/images/logos/favicon2.png') }}" />
  <link rel="stylesheet" href="{{ asset('AdminPanel/assets/css/styles.min.css') }}" />
</head>

<body>
  <!-- Body Wrapper -->
  <div class="page-wrapper" id="main-wrapper" data-layout="vertical" data-navbarbg="skin6" data-sidebartype="full" data-sidebar-position="fixed" data-header-position="fixed">
    <div class="position-relative overflow-hidden radial-gradient min-vh-100 d-flex align-items-center justify-content-center">
      <div class="d-flex align-items-center justify-content-center w-100">
        <div class="row justify-content-center w-100">
          <div class="col-md-8 col-lg-6 col-xxl-3">
            <div class="card mb-0">
              <div class="card-body">
                <a href=" " class="text-nowrap logo-img text-center d-block py-3 w-100">
                  <img src="{{ asset('AdminPanel/assets/images/logos/favicon2.png') }}" width="150" height="100" alt="">
                </a>

                <form action="/password/reset" method="POST">
                  @csrf
                  <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">Email</label>
                    <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" required>

                  </div>
                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">New Password</label>
                    <input type="password" name="password" class="form-control" id="exampleInputPassword1" required>
                  </div>

                  <div class="mb-4">
                    <label for="exampleInputPassword1" class="form-label">Confirm Password</label>
                    <input type="password" name="password_confirmation" class="form-control" id="exampleInputPassword1" required>
                  </div>

                  <button class="btn btn-primary w-100 py-8 fs-4 mb-4 rounded-2" type="submit">Reset Password</button>
                  <div class="d-flex align-items-center justify-content-center">
                    <a class="text-primary fw-bold ms-2" href="{{ url('/Adminlogin') }}">Back to Login</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <script src="{{ asset('AdminPanel/assets/libs/jquery/dist/jquery.min.js') }}"></script>
  <script src="{{ asset('AdminPanel/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') }}"></script>
</body>

</html>
