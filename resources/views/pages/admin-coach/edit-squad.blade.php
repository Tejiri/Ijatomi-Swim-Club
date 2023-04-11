@extends('layouts.base')

@section('content')

    <div class="row" style="margin-bottom: 10px">
        <h3 class="col-md-12">Update Squad Details</h3>
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
        <form action="{{ url('/edit-squad/' . $squad->id) }}" method="post" class="col-md-8">
            @csrf

            <div>
                <div class="form-group">
                    <label>Squad Name</label>
                    <input name="name" type="text" placeholder="Please Enter Remark" class="form-control"
                        value="{{ $squad->name }}" readonly />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>

                <div class="form-group">
                    <label>Description</label>
                    <br>
                    <textarea class="form-control" name="description" id="" cols="30" rows=8 style="width: 100%;">{{ $squad->description }}</textarea>
                    {{-- <input name="name" type="text" placeholder="Please Enter Remark" class="form-control"
                    maxlength="4"
                    size="4"
                    height="300"
                        value="{{ $squad->description }}"  /> --}}
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>




                <div class="form-group">
                    {{-- <label>End time</label> --}}
                    <input type="submit" value="Update Squad Details" class="form-control"
                        style="background-color: #71b7e6; font-weight: bold" />
                    {{-- <p class="help-block">Help text here.</p> --}}
                </div>

            </div>

        </form>

    </div>
@endsection
