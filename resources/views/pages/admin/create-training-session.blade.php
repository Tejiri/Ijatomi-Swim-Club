@extends('layouts.base')

@section('content')
    <div class="row" style="margin-bottom: 10px">
        <h3 class="col-md-12">Create Training Session</h3>
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
        <form action="{{url('/create-training-session')}}" method="POST" class="col-md-8">
            @csrf

            <div>

                <div class="form-group">
                    <label>Name</label>
                    <input name="name" type="text" placeholder="Please Enter Name"
                        class="form-control"value="{{ old('name') }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <input name="description" type="text" placeholder="Please Enter Description" class="form-control"
                        value="{{ old('description') }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Intensity</label>
                    <select name="intensity" class="form-control">
                        {{-- @foreach ($genders as $gender)
                    <option value="{{$gender->name}}">{{ $gender->name}}</option>
                @endforeach --}}

                        <option value="High">High</option>
                        <option value="Medium">Medium</option>
                        <option value="Low">Low</option>
                    </select>
                    {{-- <input type="text" placeholder="PLease Enter Username"  class="form-control" />
            <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Distance</label>
                    <select name="distance" class="form-control">
                        {{-- @foreach ($genders as $gender)
                    <option value="{{$gender->name}}">{{ $gender->name}}</option>
                @endforeach --}}

                        <option value="50m">50m</option>
                        <option value="100m">100m</option>
                        <option value="200m">200m</option>
                        <option value="400m">400m</option>
                        <option value="800m">800m</option>
                        <option value="1500m">1500m</option>
                    </select>
                    {{-- <input type="text" placeholder="PLease Enter Username"  class="form-control" />
            <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Day</label>
                    <select name="day" class="form-control">
                        <option value="Monday">Monday</option>
                        <option value="Tuesday">Tuesday</option>
                        <option value="Wednesday">Wednesday</option>
                        <option value="Thursday">Thursday</option>
                        <option value="Friday">Friday</option>
                        <option value="Saturday">Saturday</option>
                    </select>
                </div>

                <div class="form-group">
                    <label>Stroke type</label>
                    <select name="stroke_type" class="form-control">
                        {{-- @foreach ($genders as $gender)
                    <option value="{{$gender->name}}">{{ $gender->name}}</option>
                @endforeach --}}

                        <option value="Backstroke">BackStroke</option>
                        <option value="Breaststroke">Breaststroke</option>
                        <option value="Butterfly">Butterfly</option>
                        <option value="Freestyle">Freestyle</option>
                    </select>
                    {{-- <input type="text" placeholder="PLease Enter Username"  class="form-control" />
            <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Start time</label>
                    <input name="start_time" type="time" placeholder="PLease Enter Username" class="form-control"
                        value="{{ old('start_time') }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>



                <div class="form-group">
                    <label>End time</label>
                    <input name="end_time" type="time" placeholder="PLease Enter Username" class="form-control"
                        value="{{ old('end_time') }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>


                <div class="form-group">
                    <label>Squad</label>
                    <select name="squad" name="gender" class="form-control">
                        @foreach ($squads as $squad)
                            <option value="{{ $squad->name }}">{{ $squad->name }}</option>
                        @endforeach

                    </select>
                </div>


                <div class="form-group">
                    {{-- <label>End time</label> --}}
                    <input type="submit" value="Submit" class="form-control"
                        style="background-color: #71b7e6; font-weight: bold" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>

            </div>

        </form>

    </div>

@endsection
