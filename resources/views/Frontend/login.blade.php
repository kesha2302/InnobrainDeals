

  @extends('Frontend.layout.main')

 @section('main-container')

 @if ($errors->any())
 <div class="alert alert-danger">
     <ul>
         @foreach ($errors->all() as $error)
             <li>{{ $error }}</li>
         @endforeach
     </ul>
 </div>
@endif

@if(session('error'))
 <div class="alert alert-danger">
     {{ session('error') }}
 </div>
@endif

 <div style="display: flex; justify-content: center; align-items: center; height: 100vh; background-color: #f7f7f7;">
    <div style="width: 550px; height:500px; padding: 40px; background-color: white; border-radius: 10px; box-shadow: 0px 4px 10px rgba(0, 0, 0, 0.1);">
        <h2 style="text-align: center; color: #333; font-size: 3rem; margin-bottom: 20px;">Login</h2>

        <form action="{{url('/Login2')}}" method="POST">

            @csrf

            <div style="margin-bottom: 18px;">
                <input type="email" placeholder="Enter Email" name="email" style="width: 100%; padding: 10px; font-size: 1rem; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;" required>
            </div>
            <div style="margin-bottom: 18px;">
                <input type="password" placeholder="Enter Password" name="password" style="width: 100%; padding: 10px; font-size: 1rem; border-radius: 5px; border: 1px solid #ccc; box-sizing: border-box;" required>
            </div>
            <div style="text-align: center; margin-bottom: 50px;">
                <button type="submit" style="width: 100%; background-color: black; color: white; padding: 10px; font-size: 2rem; border: none; border-radius: 5px; cursor: pointer;">Login</button>
            </div>
            <div style="text-align: center; margin-bottom: 10px;">
                <a href="{{url('/forgotpassword')}}" style="color: black; text-decoration: none; font-size: 2rem;">Forgot Password?</a>
            </div>
            <div style="text-align: center;">
                <span style="font-size: 2rem;">Don't have an account? <a href="{{url('/register')}}" style="color: black; text-decoration: none;">Sign Up</a></span>
            </div>
        </form>
    </div>
</div>

  @endsection
