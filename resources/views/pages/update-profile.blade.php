@extends('layouts.base')

@section('content')
    <div class="row" style="margin-bottom: 10px">
        <h3 class="col-md-12">Update profile details</h3>
    </div>

    <div class="row">
        <p class="col-md-12" style="color: green;  padding-top: 0px; font-weight: bold;"> {{ session('success') }}</p>

        @if ($errors->any())
            @foreach ($errors->all() as $error)
                <p class="col-md-12" style="color: red;  padding-top: 0px; margin-top: 0px"> {{ $error }}</p>
            @endforeach
        @else
        @endif
    </div>
    {{-- <h3 class="col-md-12">{{$errors->all()->msg}}</h3> --}}




    <div class="row ">
        <form action="{{ url('/update-user-account/'.$user->id) }}" method="POST" class="col-md-8">
            @csrf

            <div>
                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="text" placeholder="Please Enter Description" class="form-control"
                        value="{{ $user->email }}" readonly />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" placeholder="Please Enter Username" class="form-control"
                        value="{{ $user->username }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Firstname</label>
                    <input name="first_name" type="text" placeholder="Please Enter Description" class="form-control"
                        value="{{ $user->first_name }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>


                <div class="form-group">
                    <label>Lastname</label>
                    <input name="last_name" type="text" placeholder="Please Enter Description" class="form-control"
                        value="{{ $user->last_name }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Date of Birth</label>
                    <input name="date_of_birth" type="date" placeholder="PLease Enter Username" class="form-control"
                        value="{{ $user->date_of_birth }}" readonly />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>


                <div class="form-group">
                    <label>Address</label>
                    <input name="address" type="text" placeholder="Please Enter Description" class="form-control"
                        value="{{ $user->address }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>


                <div class="form-group">
                    <label>Middlename</label>
                    <input name="middle_name" type="text" placeholder="Please Enter Description" class="form-control"
                        value="{{ $user->middle_name }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>
                <div class="form-group">
                    <label>Phone number</label>
                    <input name="phone_number" type="text" placeholder="Please Enter Description" class="form-control"
                        value="{{ $user->phone_number }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>


                <div class="form-group">
                    {{-- <label>End time</label> --}}
                    <input type="submit" value="Update Profile" class="form-control"
                        style="background-color: #71b7e6; font-weight: bold" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>

            </div>

        </form>

    </div>

@endsection
