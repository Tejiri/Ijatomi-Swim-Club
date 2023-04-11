@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Manage Children's Account
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#register-child" data-toggle="tab">Register Child</a>
                        </li>
                        <li class=""><a href="#update-children-account" data-toggle="tab">Update Children's Account</a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="register-child">

                            <div class="row" style="margin-top: 10px">
                                <p class="col-md-12" style="color: green;  padding-top: 0px; font-weight: bold;">
                                    {{ session('success') }}</p>

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p class="col-md-12" style="color: red;  padding-top: 0px; margin-top: 0px">
                                            {{ $error }}</p>
                                    @endforeach
                                @else
                                @endif
                            </div>

                            <form action="/register-child" method="POST">
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
                                        <input name="lastname" type="text" placeholder="Please Enter Lastname"
                                            class="form-control" value="{{ old('lastname') }}" />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" type="text" placeholder="Please Enter Address"
                                            class="form-control" value="{{ old('address') }}" />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>



                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input name="phone_number" type="text" placeholder="Please Enter Phone Number"
                                            class="form-control" value="{{ old('phone_number') }}" />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>


                                    <div class="form-group">
                                        <label>Password</label>
                                        <input name="password" type="password" placeholder="Please Enter Password"
                                            class="form-control" />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>

                                    {{-- <div class="form-group">
                                        <label>Role</label>
                                        <select name="role" class="form-control"> --}}
                                    {{-- @foreach ($genders as $gender)
                                            <option value="{{$gender->name}}">{{ $gender->name}}</option>
                                        @endforeach --}}

                                    {{-- <option value="swimmer">Swimmer</option>
                                            <option value="coach">Coach</option>
                                            <option value="parent">Parent</option>
                                        </select> --}}
                                    {{-- <input type="text" placeholder="PLease Enter Username"  class="form-control" />
                                    <p class="help-block">Help text here.</p> --}}
                                    {{-- </div> --}}

                                </div>

                                <div class="col-md-6">
                                    <div class="form-group">
                                        <label>Firstname</label>
                                        <input name="firstname" type="text" placeholder="Please Enter Firstname"
                                            class="form-control" value="{{ old('firstname') }}" />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>


                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input name="date_of_birth" type="date" placeholder="Please Enter Date of Birth"
                                            class="form-control" value="{{ old('date_of_birth') }}" />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Postcode</label>
                                        <input name="postcode" type="text" placeholder="Please Enter Postcode"
                                            class="form-control" value="{{ old('postcode') }}" />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>



                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="text" placeholder="Please Enter Email"
                                            class="form-control" value="{{ old('email') }}" />
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
                                        <label></label>
                                        <input type="submit" value="Submit" class="form-control"
                                            style="background-color: #71b7e6; font-weight: bold" />
                                    </div>

                                </div>



                            </form>

                        </div>
                        <div class="tab-pane fade" id="update-children-account">
                            @if (count($registeredChildren))
                                <div class="table-responsive" style="margin-top: 40px;">

                                    <table class="table table-striped table-bordered table-hover"
                                        id="performance-history-50m">
                                        <thead>
                                            <tr>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Middlename</th>
                                                <th>Phone Number</th>
                                                <th>Date of Birth</th>
                                                <th>Update</th>
                                                {{-- <th>CSS grade</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($registeredChildren as $child)
                                                <tr class="gradeU">
                                                    <td>{{ $child->first_name }}</td>
                                                    <td>{{ $child->last_name }}</td>
                                                    <td>{{ $child->middle_name }}</td>
                                                    <td>{{ $child->phone_number }}</td>
                                                    <td>{{ $child->date_of_birth }}</td>
                                                    <td>
                                                        <a href="{{ url('update-child-account/' . $child->id) }}">
                                                            <input type="submit" value="UPDATE" class="form-control"
                                                                style="width: 100%; background-color: #bf3c3c; color: white;">
                                                        </a>
                                                    </td>
                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>

                                </div>
                            @else
                                <h4>No training performance data to display</h4>
                            @endif

                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <div class="row">
        <div class="col-md-12">

        </div>

    </div>
@endsection
