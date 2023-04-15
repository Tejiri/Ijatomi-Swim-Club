@extends('layouts.base')

@section('content')

    <div class="row" style="margin-bottom: 10px">
        <h3 class="col-md-12">Validate Training Session</h3>
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
        {{-- <form action="{{ url('/create-training-session') }}" method="POST" class="col-md-8">
            @csrf --}}

        <div class="col-md-8">

            <div class="form-group">
                <label>Squad</label>
                <input name="name" type="text" placeholder="Please Enter Name" class="form-control"
                    value="{{ $trainingResult->user->squad->name }}" style="font-weight: bolder;" readonly />
                {{-- <p class="help-block">Help text here.</p> --}}
            </div>

            <div class="form-group">
                <label>Firstname</label>
                <input name="description" type="text" placeholder="Please Enter Description" class="form-control"
                    value="{{ $trainingResult->user->first_name }}" style="font-weight: bolder;" readonly />
                {{-- <p class="help-block">Help text here.</p> --}}
            </div>

            <div class="form-group">
                <label>Lastname</label>
                <input name="description" type="text" placeholder="Please Enter Description" class="form-control"
                    value="{{ $trainingResult->user->last_name }}" style="font-weight: bolder;" readonly />
                {{-- <p class="help-block">Help text here.</p> --}}
            </div>

            <div class="form-group">
                <label>Training Date</label>
                <input name="description" type="text" placeholder="Please Enter Description" class="form-control"
                    value="{{ $trainingResult->training_date }}" style="font-weight: bolder;" readonly />
                {{-- <p class="help-block">Help text here.</p> --}}
            </div>

            <div class="form-group">
                <label>Remark</label>
                <input name="description" type="text" placeholder="Please Enter Description" class="form-control"
                    value="{{ $trainingResult->remark }}" style="font-weight: bolder;" readonly />
                {{-- <p class="help-block">Help text here.</p> --}}
            </div>

            <div class="form-group">
                <label>Intensity</label>
                <input name="description" type="text" placeholder="Please Enter Description" class="form-control"
                    value="{{ $trainingResult->intensity }}" style="font-weight: bolder;" readonly />
                {{-- <p class="help-block">Help text here.</p> --}}
            </div>


            <div class="form-group">
                <label>Distance</label>
                <input name="description" type="text" placeholder="Please Enter Description" class="form-control"
                    value="{{ $trainingResult->distance }}" style="font-weight: bolder;" readonly />
                {{-- <p class="help-block">Help text here.</p> --}}
            </div>

            <div class="form-group">
                <label>Stroke Type</label>
                <input name="description" type="text" placeholder="Please Enter Description" class="form-control"
                    value="{{ $trainingResult->stroke_type }}" style="font-weight: bolder;" readonly />
                {{-- <p class="help-block">Help text here.</p> --}}
            </div>

            <div class="form-group">
                <label>Time Spent</label>
                <input name="description" type="text" placeholder="Please Enter Description" class="form-control"
                    value="{{ gmdate('H:i:s', $trainingResult->time_in_seconds) }}" readonly
                    style="font-weight: bolder;" />
                {{-- <p class="help-block">Help text here.</p> --}}
            </div>

            <div class="form-group">
                {{-- <label>End time</label> --}}
                <form action="{{ url('validate-training-result/' . $trainingResult->id) }}" method="post">
                    @csrf
                    <input type="submit" value="Validate" class="form-control"
                        style="background-color: #71b7e6; color: white; font-weight: bold" />
                </form>
                {{-- <p class="help-block">Help text here.</p> --}}
            </div>

            <div class="form-group">
                <form action="{{ url('decline-training-result/' . $trainingResult->id) }}" method="post">
                    @csrf
                    {{-- <label>End time</label> --}}
                    <input type="submit" value="Decline" class="form-control"
                        style="background-color: #bf3c3c; color: white; font-weight: bold" />
                </form>
                {{-- <p class="help-block">Help text here.</p> --}}
            </div>

        </div>

        {{-- </form> --}}

    </div>


@endsection
