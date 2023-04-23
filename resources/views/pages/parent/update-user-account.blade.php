@extends('layouts.base')

@section('content')


    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Update Account
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#50m" data-toggle="tab">Update Account</a>
                        </li>
                        @if (Auth::user()->role == 'admin')
                        <li class=""><a href="#100m" data-toggle="tab">Update Squad</a>
                        </li>
                        @endif
                        {{-- <li class=""><a href="#200m" data-toggle="tab">200m</a>
                    </li>
                    <li class=""><a href="#400m" data-toggle="tab">400m</a>
                    </li>
                    <li class=""><a href="#800m" data-toggle="tab">800m</a>
                    </li>
                    <li class=""><a href="#1500m" data-toggle="tab">1500m</a>
                    </li>  --}}
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="50m">


                            <div class="row" style="margin-top: 20px;">
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
                            <form action="{{ url('/update-user-account/' . $user->id) }}" method="POST" class="col-md-8">
                                {{-- <hr style="background-color: black; color: black; height: 1px; margin: 0px"> --}}
                                @csrf
                                {{-- <h4 style="margin:0px; padding: 0px;font-weight: bold; color: red; margin-bottom: 10px;">Current Squad:</h4> --}}
                                <div>


                                    <div class="form-group">
                                        <label>Email</label>
                                        <input name="email" type="text" placeholder="Please Enter Description"
                                            class="form-control" value="{{ $user->email }}" readonly />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Role</label>
                                        <input name="email" type="text" placeholder="Please Enter Description"
                                            class="form-control" value="{{ $user->role }}" readonly />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>


                                    <div class="form-group">
                                        <label>Username</label>
                                        <input name="username" type="text" placeholder="Please Enter Username"
                                            class="form-control" value="{{ $user->username }}" />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Firstname</label>
                                        <input name="first_name" type="text" placeholder="Please Enter Description"
                                            class="form-control" value="{{ $user->first_name }}" />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>


                                    <div class="form-group">
                                        <label>Lastname</label>
                                        <input name="last_name" type="text" placeholder="Please Enter Description"
                                            class="form-control" value="{{ $user->last_name }}" />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>

                                    <div class="form-group">
                                        <label>Date of Birth</label>
                                        <input name="date_of_birth" type="date" placeholder="PLease Enter Username"
                                            class="form-control" value="{{ $user->date_of_birth }}" readonly />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>


                                    <div class="form-group">
                                        <label>Address</label>
                                        <input name="address" type="text" placeholder="Please Enter Description"
                                            class="form-control" value="{{ $user->address }}" />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>


                                    <div class="form-group">
                                        <label>Middlename</label>
                                        <input name="middle_name" type="text" placeholder="Please Enter Description"
                                            class="form-control" value="{{ $user->middle_name }}" />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>
                                    <div class="form-group">
                                        <label>Phone number</label>
                                        <input name="phone_number" type="text" placeholder="Please Enter Description"
                                            class="form-control" value="{{ $user->phone_number }}" />
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
                        @if (Auth::user()->role == 'admin')
                        <div class="tab-pane fade" id="100m">
                            <form action="{{ url('/update-coach-squad/' . $user->id) }}" method="POST" class="col-md-8"
                                style="margin-top: 20px;">
                                {{-- <hr style="background-color: black; color: black; height: 1px;"> --}}
                                @csrf
                                {{-- <h3>Update Squad</h3> --}}
                                <h4 style="margin:0px; padding: 0px;font-weight: bold; color: black; margin-bottom: 10px;">
                                    Current Squad:
                                    @if ($user->squad != null)
                                        {{ $user->squad->name }}
                                    @else
                                        None assigned yet
                                    @endif
                                </h4>
                                <div>

                                    {{-- @if ($user->role == 'coach') --}}
                                    <div class="form-group" style="margin-top: 20px;">
                                        {{-- <label>Select Squad</label> --}}
                                        <select name="squad" class="form-control">
                                            <option value="Development Squad">Development Squad</option>
                                            <option value="Intermediate Squad">Intermediate Squad</option>
                                            <option value="Intermediate Squad">Performance Squad</option>
                                        </select>

                                    </div>
                                    {{-- @endif --}}

                                    <div class="form-group">
                                        {{-- <label>End time</label> --}}
                                        <input type="submit" value="Update Squad" class="form-control"
                                            style="background-color: #71b7e6; font-weight: bold" />
                                        {{-- <p class="help-block">Help text here.</p> --}}
                                    </div>

                                </div>

                            </form>
                        </div>
                        @endif
                        
                      
                    </div>
                </div>
            </div>
        </div>

    </div>


@endsection
