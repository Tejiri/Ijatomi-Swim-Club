@extends('layouts.base')

@section('content')
    <div class="row" style="margin-bottom: 10px">
        <h3 class="col-md-12">Register User</h3>
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



    <form action="/admin-register-user" method="POST">
        <div class="row">
            @csrf

            <div class="col-md-6">


                <div class="form-group">
                    <label>Username</label>
                    <input name="username" type="text" placeholder="Please Enter Username"
                        class="form-control"value="{{ old('username') }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Lastname</label>
                    <input name="lastname" type="text" placeholder="Please Enter Lastname" class="form-control"
                        value="{{ old('lastname') }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Address</label>
                    <input name="address" type="text" placeholder="Please Enter Address" class="form-control"
                        value="{{ old('address') }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>



                <div class="form-group">
                    <label>Phone number</label>
                    <input name="phone_number" type="text" placeholder="Please Enter Phone Number" class="form-control"
                        value="{{ old('phone_number') }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>


              


                <div class="form-group">
                    <label>Role</label>
                    <select name="role" class="form-control">
                        {{-- @foreach ($genders as $gender)
                        <option value="{{$gender->name}}">{{ $gender->name}}</option>
                    @endforeach --}}

                        <option value="swimmer">Swimmer</option>
                        <option value="coach">Coach</option>
                        <option value="parent">Parent</option>
                    </select>
                    {{-- <input type="text" placeholder="PLease Enter Username"  class="form-control" />
                <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Password</label>
                    <input name="password" type="password" placeholder="Please Enter Password" class="form-control" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>


            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label>Firstname</label>
                    <input name="firstname" type="text" placeholder="Please Enter Firstname" class="form-control"
                        value="{{ old('firstname') }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>


                <div class="form-group">
                    <label>Date of Birth</label>
                    <input name="date_of_birth" type="date" placeholder="Please Enter Date of Birth" class="form-control"
                        value="{{ old('date_of_birth') }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Postcode</label>
                    <input name="postcode" type="text" placeholder="Please Enter Postcode" class="form-control"
                        value="{{ old('postcode') }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>



                <div class="form-group">
                    <label>Email</label>
                    <input name="email" type="text" placeholder="Please Enter Email" class="form-control"
                        value="{{ old('email') }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>


                <div class="form-group">
                    <label>Gender</label>
                    <select name="gender" class="form-control">
                        @foreach ($genders as $gender)
                            <option value="{{ $gender->name }}">{{ $gender->name }}</option>
                        @endforeach
                    </select>

                </div>
                <div class="form-group">
                    <label>Confirm Password</label>
                    <input name="password_confirmation" type="password" placeholder="Please Enter Password"
                        class="form-control" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>





            </div>


    </form>

    <div class="row" style="margin:0px 20px;">
        <div class="col-md-12">
            <div class="form-group">
                <label></label>
                <input type="submit" value="Submit" class="form-control"
                    style="background-color: #71b7e6; font-weight: bold" />
            </div>
        </div>
    </div>




@endsection
