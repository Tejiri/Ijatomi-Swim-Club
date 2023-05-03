@extends('layouts.base')

@section('content')

    <div class="row" style="margin-bottom: 10px">
        <h3 class="col-md-12">Upload Swimmer Training Result</h3>
    </div>

    {{-- <div class="row">

        @csrf
        <div class="col-md-3 col-sm-12 col-xs-12 ">
            <div class="panel panel-primary text-center no-boder bg-color-blue"
                style="border-radius: 30px; background-color: transparent; color: black; ">
                <div class="panel-body"style="border: #71b7e6  0.5px solid;">
                     <h3>{{ $squad->name }} </h3>
                </div>
                <div class="panel-footer" style="font-weight: bolder; background-color: #71b7e6;">
                    Squad

                </div>
            </div>

        </div>
        <div class="col-md-3 col-sm-12 col-xs-12 ">
            <div
                class="panel panel-primary text-center no-boder bg-color-brown"style="border-radius: 30px;  background-color: transparent; color: black; ">
                <div class="panel-body" style="border: #71b7e6  0.5px solid;">
                    <h3>{{ $trainingSession->day }}</h3>
                </div>
                <div class="panel-footer back-footer-green" style="font-weight: bolder; background-color: #71b7e6;">
                    Day

                </div>
            </div>

        </div>
        <div class="col-md-3 col-sm-12 col-xs-12 ">
            <div
                class="panel panel-primary text-center no-boder bg-color-green"style="border-radius: 30px; background-color: transparent; color: black; ">
                <div class="panel-body" style="border: #71b7e6  0.5px solid;">
                    <h3>{{ $trainingSession->distance }} </h3>
                </div>
                <div class="panel-footer back-footer-green" style="font-weight: bolder; background-color: #71b7e6;">
                    Distance

                </div>
            </div>
        </div>

        <div class="col-md-3 col-sm-12 col-xs-12 ">
            <div
                class="panel panel-primary text-center no-boder bg-color-red"style="border-radius: 30px; background-color: transparent; color: black; ">
                <div class="panel-body" style="border: #71b7e6  0.5px solid;">
                    <h3>{{ $trainingSession->stroke_type }}</h3>
                </div>
                <div class="panel-footer back-footer-red" style="font-weight: bolder; background-color: #71b7e6;">
                    Stroke Type

                </div>
            </div>
        </div>

       
    </div> --}}


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
        <form action="{{ url('/upload-training-result') }}" method="post" class="col-md-8">
            @csrf

            <div>
                <div class="form-group">
                    <label>Select Swimmer</label>
                    @if (count($swimmers))
                        <select name="swimmer" class="form-control">
                            @foreach ($swimmers as $swimmer)
                                <option value={{ $swimmer->id }}>
                                    {{ $swimmer->first_name . ' ' . $swimmer->last_name . ' ( ' . $swimmer->username . ' ) ' }}
                                </option>
                            @endforeach


                        </select>
                    @else
                   
                        <div style="color: red; font-weight: bolder;font-size: 16px">No registered swimmers in this squad
                        </div>
                    @endif

                    {{-- <input type="text" placeholder="PLease Enter Username"  class="form-control" />
            <p class="help-block">Help text here.</p> --}}
                </div>
                <div class="form-group">
                    <label>Training date</label>
                    <input name="training_date" type="date" class="form-control"value="{{ old('training_date') }}" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Remark</label>
                    <input name="remark" type="text" placeholder="Please Enter Remark"
                        class="form-control"value="{{ old('remark') }}" />
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
                    <label>Time Spent</label>
                    <div>
                        <input id='h' name='h' type='number' min='0' max='23'
                            value="{{ old('h') }}">
                        <label for='h'>Hours</label>
                        <input id='m' name='m' type='number' min='0' max='59'
                            value="{{ old('m') }}">
                        <label for='m'>Minutes</label>
                        <input id='s' name='s' type='number' min='0' max='59'
                            value="{{ old('s') }}">
                        <label for='s'>Seconds</label>
                    </div>
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
