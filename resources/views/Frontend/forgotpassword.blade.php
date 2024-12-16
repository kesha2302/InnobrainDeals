<!doctype html>
<html lang="en">
  <head>
    <title>Innobrain Deals</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>

    <nav class="navbar " style="background-color:  black; color:white">
        <div class="container-fluid">
            <a class="navbar-brand text-white"><h3>Innobrain Deals</h3></a>
        </div>
    </nav>

    @if ($errors->any())
    @foreach ($errors->all() as $error)
    <p style="color:red;">{{$error}}</p>
    @endforeach
    @endif

    @if (Session::has('error'))
    <p style="color:red;">{{Session::get('error')}}</p>
    @endif

    @if (Session::has('success'))
    <p style="color:green;">{{Session::get('success')}}</p>
    @endif

        <div class="container text-center mt-5">
            <h2>Forgot Password</h2>
            <p>Pleaase enter your email to get the link of the reset password!
            </p>
        <div class="card mt-3 mb-3 mx-auto" style="width:60rem; height:10rem;">
            <div class="card-body">

                <form action="{{ route('resetpasswordlink') }}" method="POST">
                @csrf
                <div class="mb-3">
                    <label  class="form-label">Email:</label>
                    <input type="text" class="form-control" name="email" placeholder="Email">
                </div>

                <button type="submit" class="btn btn-dark">Submit</button>

            </form>
            </div>
          </div>
        </div>

  </body>
</html>
