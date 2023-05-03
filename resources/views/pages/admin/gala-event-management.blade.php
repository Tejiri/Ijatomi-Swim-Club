@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Gala Event Management
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#create-event" data-toggle="tab">Create Gala Event</a>
                        </li>
                        <li class=""><a href="#upload-result" data-toggle="tab">Upload Result</a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="create-event">

                            <div class="row " style="padding-top: 20px;">
                                <p class="col-md-12" style="color: green;  padding-top: 0px; font-weight: bold;">
                                    {{ session('success') }}</p>

                                @if ($errors->any())
                                    @foreach ($errors->all() as $error)
                                        <p class="col-md-12" style="color: red;  padding-top: 0px; margin-top: 0px">
                                            {{ $error }}</p>
                                    @endforeach
                                @else
                                @endif
                                <form action="{{ url('/create-event') }}" method="POST" class="col-md-8">
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
                                            <input name="description" type="text" placeholder="Please Enter Description"
                                                class="form-control" value="{{ old('description') }}" />
                                            {{-- <p class="help-block">Help text here.</p> --}}
                                        </div>

                                        <div class="form-group">
                                            <label>Location</label>
                                            <input name="location" type="text" placeholder="Please Enter Description"
                                                class="form-control" value="{{ old('location') }}" />
                                            {{-- <p class="help-block">Help text here.</p> --}}
                                        </div>

                                        <div class="form-group">
                                            <label>Gala date</label>
                                            <input name="date" type="date"
                                                class="form-control"value="{{ old('date') }}" />
                                            {{-- <p class="help-block">Help text here.</p> --}}
                                        </div>


                                        <div class="form-group">
                                            <label>Start time</label>
                                            <input name="start_time" type="time" placeholder="PLease Enter Username"
                                                class="form-control" value="{{ old('start_time') }}" />
                                            {{-- <p class="help-block">Help text here.</p> --}}
                                        </div>



                                        <div class="form-group">
                                            <label>End time</label>
                                            <input name="end_time" type="time" placeholder="PLease Enter Username"
                                                class="form-control" value="{{ old('end_time') }}" />
                                            {{-- <p class="help-block">Help text here.</p> --}}
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
                        </div>
                        <div class="tab-pane fade" id="upload-result">
                            <div class="row " style="padding-top: 20px;">
                                <form action="{{ url('/add-gala-result') }}" method="post" class="col-md-8">
                                    @csrf
                        
                                    <div>

                                        <div class="form-group">
                                            <label>Select Gala Event</label>
                                            @if (count($events))
                                                <select name="event" class="form-control">
                                                    @foreach ($events as $event)
                                                        <option value={{ $event->id }}>
                                                            {{ $event->name }}
                                                        </option>
                                                    @endforeach
                        
                        
                                                </select>
                                            @else
                                           
                                                <div style="color: red; font-weight: bolder;font-size: 16px">No created Gala Events
                                                </div>
                                            @endif
                        
                                            {{-- <input type="text" placeholder="PLease Enter Username"  class="form-control" />
                                    <p class="help-block">Help text here.</p> --}}
                                        </div>


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
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
