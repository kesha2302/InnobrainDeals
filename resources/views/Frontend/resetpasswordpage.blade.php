
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
    <nav class="navbar" style="background-color:  #d93d3d; color:white">
        <div class="container-fluid">
            <a class="navbar-brand text-white"><h3>Innobrain Deals</h3></a>
        </div>
    </nav>

@if ($errors->any())
    @foreach ($errors->all() as $error)
        <p style="color:red;">{{ $error }}</p>
    @endforeach
@endif


<div class="container text-center mt-5">
    <h2>Reset Password</h2>
    <div class="card mt-3 mb-3 mx-auto" style="width:60rem; height:15rem;">
        <div class="card-body">
            <form action="{{ route('resetpasswordset') }}" method="POST">
                @csrf
                <input type="hidden" name="Id" value="{{ $user->customer_id }}">
                <div class="mb-3">
                    <label class="form-label">Password:</label>
                    <input type="password" class="form-control" name="password" placeholder="Enter password">
                </div>
                <div class="mb-3">
                    <label class="form-label">Confirm Password</label>
                    <input type="password" class="form-control" name="password_confirmation" placeholder="Enter Confirm Password">
                </div>
                <button type="submit" class="btn btn-dark">Submit</button>
            </form>
        </div>
    </div>
</div>
</body>
</html>
