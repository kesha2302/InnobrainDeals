
@extends('Frontend.layout.main')

@section('main-container')
<div  style="margin: 0; font-family: 'Helvetica Neue', Arial, sans-serif; display: flex; height: 125vh; overflow: hidden; background-color: #f0f4f8; justify-content: center; align-items: center; padding: 20px;">
    <div class="login-container" style="background-color: rgba(255, 255, 255, 0.9); padding: 40px; border-radius: 8px; box-shadow: 0 4px 20px rgba(0, 0, 0, 0.3); width: 100%; max-width: 600px; margin: auto; display: flex; flex-direction: column; justify-content: center; height: auto; color: #555;">
        <div class="login-header" style="text-align: center; margin-bottom: 30px;">
            <h3 style="color: #333; margin: 0; font-size: 20px; font-family: 'Helvetica Neue', sans-serif;"><strong>Register</strong></h3>
        </div>
        <form action="{{url('/Signup2')}}" method="POST">
            @csrf

            <input type="text" class="form-control" placeholder="Full Name" name="fullname" required style="border-radius: 5px; border: 1px solid black; margin-bottom: 15px; color: #333; padding: 10px;" />
            @error('fullname')
                        <div class="text-danger">{{ $message }}</div>
            @enderror

            <input type="email" class="form-control" placeholder="Email" name="email" required style="border-radius: 5px; border: 1px solid black; margin-bottom: 15px; color: #333; padding: 10px;" />
            @error('email')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <input type="password" class="form-control" placeholder="Password" name="password" required style="border-radius: 5px; border: 1px solid black; margin-bottom: 15px; color: #333; padding: 10px;" />
            @error('password')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <input type="text" class="form-control" placeholder="Address" name="address" required style="border-radius: 5px; border: 1px solid black; margin-bottom: 15px; color: #333; padding: 10px;" />
            @error('address')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <input type="text" class="form-control" placeholder="City" name="city" required style="border-radius: 5px; border: 1px solid black; margin-bottom: 15px; color: #333; padding: 10px;" />
            @error('city')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <input type="text" class="form-control" placeholder="State" name="state" required style="border-radius: 5px; border: 1px solid black; margin-bottom: 15px; color: #333; padding: 10px;" />
            @error('state')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <input type="number" class="form-control" placeholder="Pincode" name="pincode" required style="border-radius: 5px; border: 1px solid black; margin-bottom: 15px; color: #333; padding: 10px;" />
            @error('pincode')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <input type="text" class="form-control" placeholder="Contact Number" name="contact" required style="border-radius: 5px; border: 1px solid black; margin-bottom: 15px; color: #333; padding: 10px;" />
            @error('contact')
            <div class="text-danger">{{ $message }}</div>
            @enderror

            <button type="submit" class="login-btn" style="background-color: black; color: white; border-radius: 5px; width: 100%; padding: 18px; border: none; font-weight: bold; font-size: 16px; transition: background-color 0.3s ease;">Register</button>
        </form>
        <div class="signup" style="text-align: center; margin-top: 15px;">
            <p style="font-size: 16px; color: #333;">Already have an account? <a href="{{url('/Login')}}" style="color: black; text-decoration: none; font-weight: bold;">Login</a></p>
        </div>
    </div>
</div>

@endsection
