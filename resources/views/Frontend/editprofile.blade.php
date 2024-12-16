@extends('Frontend.layout.main')

@section('main-container')
    <div class="container d-flex justify-content-center align-items-center" >
        <div class="row justify-content-center">
            <div class="card mt-4 mb-2 mx-auto">
                <div class="card-body">
                    <h2 class="card-title text-center mt-3 mb-3">Edit Profile</h2>

                    @if(session('successmessage'))
                        <div class="alert alert-success">
                            {{ session('successmessage') }}
                        </div>
                    @endif

                    <form class="row g-3" action="{{ url('/edit-profile2') }}" method="POST">
                        @csrf
                        <table class="table table-bordered text-center">
                            <tr>
                                <td><label class="form-label"> Full Name:</label></td>
                                <td>
                                    <input type="text" name="fullname" class="form-control" value="{{ old('fullname', $user->fullname) }}" placeholder="Full Name">
                                    @error('fullname')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-label">Email:</label></td>
                                <td>
                                    <input type="email" name="email" class="form-control" value="{{ old('email', $user->email) }}" placeholder="example@gmail.com">
                                    @error('email')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-label">Address:</label></td>
                                <td>
                                    <input type="text" name="address" class="form-control" value="{{ old('address', $user->address) }}" placeholder="1234 Main St">
                                    @error('address')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-label">City:</label></td>
                                <td>
                                    <input type="text" name="city" class="form-control" value="{{ old('city', $user->city) }}" placeholder="City">
                                    @error('city')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-label">State:</label></td>
                                <td>
                                    <input type="text" name="state" class="form-control" value="{{ old('state', $user->state) }}" placeholder="State">
                                    @error('state')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-label">Pincode:</label></td>
                                <td>
                                    <input type="text" name="pincode" class="form-control" value="{{ old('pincode', $user->pincode) }}" placeholder="12345">
                                    @error('pincode')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                            <tr>
                                <td><label class="form-label">Contact:</label></td>
                                <td>
                                    <input type="text" name="contact" class="form-control" value="{{ old('contact', $user->contact) }}" placeholder="1234567890">
                                    @error('contact')
                                        <div class="text-danger">{{ $message }}</div>
                                    @enderror
                                </td>
                            </tr>
                        </table>
                        <div class="col-12 text-center mt-4 " style="margin-bottom: 20px;">
                            <button type="submit" style="background-color:#d93d3d;" class="btn btn-dark">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
