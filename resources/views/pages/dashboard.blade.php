@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12">
            <h2>Dashboard</h2>
            <h4>Welcome {{ Auth::user()->first_name . ' ' . Auth::user()->last_name }} , Love to see you back. </h4>
        </div>
    </div>
    <div class="row">
        <div class="col-md-6 col-sm-12 col-xs-12">
            <div class="panel panel-back noti-box" style="height: 320px; overflow-y: scroll">
                <span class="icon-box bg-color-blue">
                    <i class="fa fa-warning"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">Alert !!!!</p>
                    {{-- <p class="text-muted">Please fix these issues to work smooth</p>
                <p class="text-muted">Time Left: 30 mins</p> --}}
                    <hr />
                    <p class="text-muted">
                        <span class="text-muted color-bottom-txt"><i class="fa fa-edit"></i>
                            Important information about the Ijatomi Swim club membership will be broadcasted here. Please
                            endeavour to check your dashboard regularly for updates.

                        </span>
                    </p>
                </div>
            </div>
        </div>


        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="{{url("squads")}}" style="text-decoration: none; color: black;">
                <div class="panel panel-back noti-box">
                    <span class="icon-box bg-color-red set-icon">
                        {{-- <i class="fa fa-envelope-o"></i> --}}
                        <i class="fa-solid fa-people-group "></i>
                    </span>
                    <div class="text-box">
                        <p class="main-text">{{ count($developmentSquad->users) }}</p>
                        <p class="text-muted" style="font-weight: bolder">{{ $developmentSquad->name }}</p>
                    </div>
                </div>
            </a>
           
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="{{url("squads")}}" style="text-decoration: none; color: black;">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    {{-- <i class="fa fa-bars"></i> --}}
                    <i class="fa-solid fa-people-group "></i>
                </span>
                <div class="text-box">
                    <p class="main-text">{{ count($intermediateSquad->users) }}</p>
                    <p class="text-muted" style="font-weight: bolder">{{ $intermediateSquad->name }}</p>
                </div>
            </div>
            </a>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <a href="{{url("squads")}}" style="text-decoration: none; color: black;">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    {{-- <i class="fa fa-bell-o"></i> --}}
                    <i class="fa-solid fa-people-group "></i>
                </span>
                <div class="text-box">
                    <p class="main-text">{{ count($performanceSquad->users) }}</p>
                    <p class="text-muted" style="font-weight: bolder">{{ $performanceSquad->name }}</p>
                </div>
            </div>
            </a>
        </div>
        {{-- <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                    <i class="fa-solid fa-people-group "></i>
                </span>
                <div class="text-box">
                    <p class="main-text" >240</p>
                    <p class="text-muted" style="font-weight: bolder">Coming soon (Para Squad)</p>
                </div>
            </div>
        </div> --}}

    </div>

    {{-- <div class="row">
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-red set-icon">
                    <i class="fa fa-envelope-o"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">120 New</p>
                    <p class="text-muted">Messages</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-green set-icon">
                    <i class="fa fa-bars"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">30 Tasks</p>
                    <p class="text-muted">Remaining</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-blue set-icon">
                    <i class="fa fa-bell-o"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">240 New</p>
                    <p class="text-muted">Notifications</p>
                </div>
            </div>
        </div>
        <div class="col-md-3 col-sm-6 col-xs-6">
            <div class="panel panel-back noti-box">
                <span class="icon-box bg-color-brown set-icon">
                    <i class="fa fa-rocket"></i>
                </span>
                <div class="text-box">
                    <p class="main-text">3 Orders</p>
                    <p class="text-muted">Pending</p>
                </div>
            </div>
        </div>
    </div> --}}
@endsection
