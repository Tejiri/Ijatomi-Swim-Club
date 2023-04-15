@extends('layouts.base')


@section('content')
    <h2 style="color: black;">Training schedules</h2>
    <u> <span style="margin-bottom: 20px; color: black; font-weight: 600; font-size: 17px;">Key guides</span></u>
    <div style="display: flex; place-items: center;margin-top: 5px">
        <span style="margin-right: 7px; font-weight: bold;">High Intensity Training:</span>
        <div style="height: 10px; width: 100px; background-color:rgb(220, 64, 64);">

        </div>
    </div>

    <div style="display: flex; place-items: center;margin-top: 5px">
        <span style="margin-right: 7px; font-weight: bold;">Medium Intensity Training:</span>
        <div style="height: 10px; width: 100px;background-color: #b8b821; ">

        </div>
    </div>

    <div style="display: flex; place-items: center;margin-top: 5px; margin-bottom: 10px;">
        <span style="margin-right: 7px; font-weight: bold;">Low Intensity Training:</span>
        <div style="height: 10px; width: 100px; background-color: #27ab27; ">

        </div>
    </div>
    <div class="container-fluid">
        <div class="row">

            <div class="table-responsive  col-md-6 col-lg-6"
                style="float: none; margin: 0 auto;  width: 100%; overflow-x: scroll">
                <table class="table table-bordered text-center">
                    <thead>
                        <tr class="bg-light-gray">
                            <th class="text-uppercase">Squad
                            </th>
                            <th class="text-uppercase">Monday</th>
                            <th class="text-uppercase">Tuesday</th>
                            <th class="text-uppercase">Wednesday</th>
                            <th class="text-uppercase">Thursday</th>
                            <th class="text-uppercase">Friday</th>
                            <th class="text-uppercase">Saturday</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($squads as $squad)
                            <tr>

                                <td class="align-middle" style="font-weight: bolder">{{ $squad->name }}</td>

                                @if (count($squad->trainingSessions->where('day', 'Monday')))
                                    <td>
                                        @if (Auth::user()->role == 'admin')
                                            <a href="{{ url('/upload-training-result/' . $squad->name . '/Monday') }}"
                                                style="color: black; text-decoration: none;">
                                                @if ($squad->trainingSessions->where('day', 'Monday')->first()->intensity == 'High')
                                                    <span
                                                        class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                        style="background-color: rgb(220, 64, 64); color: white; font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Monday')->first()->name }}</span>
                                                @elseif($squad->trainingSessions->where('day', 'Monday')->first()->intensity == 'Medium')
                                                    <span
                                                        class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                        style="background-color: #b8b821; color: white; font-weight: bolder">{{ $squad->trainingSessions->where('day', 'Monday')->first()->name }}</span>
                                                @else
                                                    <span
                                                        class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                        style="background-color: #27ab27; color: white;  font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Monday')->first()->name }}</span>
                                                @endif
                                                <div class="margin-10px-top font-size14" style="font-weight: bolder;">
                                                    {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Monday')->first()->start_time)) }}
                                                    -
                                                    {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Monday')->first()->end_time)) }}
                                                </div>
                                                <div class="font-size13 text-bold">
                                                    {{ $squad->trainingSessions->where('day', 'Monday')->first()->distance . ' ' . $squad->trainingSessions->where('day', 'Monday')->first()->intensity . ' intensity ' . $squad->trainingSessions->where('day', 'Monday')->first()->stroke_type . ' training' }}
                                                </div>
                                            </a>
                                        @else
                                            @if ($squad->trainingSessions->where('day', 'Monday')->first()->intensity == 'High')
                                                <span
                                                    class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                    style="background-color: rgb(220, 64, 64); color: white; font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Monday')->first()->name }}</span>
                                            @elseif($squad->trainingSessions->where('day', 'Monday')->first()->intensity == 'Medium')
                                                <span
                                                    class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                    style="background-color: #b8b821; color: white; font-weight: bolder">{{ $squad->trainingSessions->where('day', 'Monday')->first()->name }}</span>
                                            @else
                                                <span
                                                    class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                    style="background-color: #27ab27; color: white;  font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Monday')->first()->name }}</span>
                                            @endif
                                            <div class="margin-10px-top font-size14" style="font-weight: bolder;">
                                                {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Monday')->first()->start_time)) }}
                                                -
                                                {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Monday')->first()->end_time)) }}
                                            </div>
                                            <div class="font-size13 text-bold">
                                                {{ $squad->trainingSessions->where('day', 'Monday')->first()->distance . ' ' . $squad->trainingSessions->where('day', 'Monday')->first()->intensity . ' intensity ' . $squad->trainingSessions->where('day', 'Monday')->first()->stroke_type . ' training' }}
                                            </div>
                                        @endif


                                    </td>
                                @else
                                    <td class="bg-light-gray">
                                    </td>
                                @endif


                                @if (count($squad->trainingSessions->where('day', 'Tuesday')))
                                    <td>
                                        @if ($squad->trainingSessions->where('day', 'Tuesday')->first()->intensity == 'High')
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: rgb(220, 64, 64); color: white; font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Tuesday')->first()->name }}</span>
                                        @elseif($squad->trainingSessions->where('day', 'Tuesday')->first()->intensity == 'Medium')
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: #b8b821; color: white; font-weight: bolder">{{ $squad->trainingSessions->where('day', 'Tuesday')->first()->name }}</span>
                                        @else
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: #27ab27; color: white;  font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Tuesday')->first()->name }}</span>
                                        @endif
                                        <div class="margin-10px-top font-size14" style="font-weight: bolder;">
                                            {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Tuesday')->first()->start_time)) }}
                                            -
                                            {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Tuesday')->first()->end_time)) }}
                                        </div>
                                        <div class="font-size13 text-bold">
                                            {{ $squad->trainingSessions->where('day', 'Tuesday')->first()->distance . ' ' . $squad->trainingSessions->where('day', 'Tuesday')->first()->intensity . ' intensity ' . $squad->trainingSessions->where('day', 'Tuesday')->first()->stroke_type . ' training' }}
                                        </div>
                                    </td>
                                @else
                                    <td class="bg-light-gray">
                                    </td>
                                @endif


                                @if (count($squad->trainingSessions->where('day', 'Wednesday')))
                                    <td>
                                        @if ($squad->trainingSessions->where('day', 'Wednesday')->first()->intensity == 'High')
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: rgb(220, 64, 64); color: white; font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Wednesday')->first()->name }}</span>
                                        @elseif($squad->trainingSessions->where('day', 'Wednesday')->first()->intensity == 'Medium')
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: #b8b821; color: white; font-weight: bolder">{{ $squad->trainingSessions->where('day', 'Wednesday')->first()->name }}</span>
                                        @else
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: #27ab27; color: white;  font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Wednesday')->first()->name }}</span>
                                        @endif
                                        <div class="margin-10px-top font-size14" style="font-weight: bolder;">
                                            {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Wednesday')->first()->start_time)) }}
                                            -
                                            {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Wednesday')->first()->end_time)) }}
                                        </div>
                                        <div class="font-size13 text-bold">
                                            {{ $squad->trainingSessions->where('day', 'Wednesday')->first()->distance . ' ' . $squad->trainingSessions->where('day', 'Wednesday')->first()->intensity . ' intensity ' . $squad->trainingSessions->where('day', 'Wednesday')->first()->stroke_type . ' training' }}
                                        </div>
                                    </td>
                                @else
                                    <td class="bg-light-gray">
                                    </td>
                                @endif


                                @if (count($squad->trainingSessions->where('day', 'Thursday')))
                                    <td>
                                        @if ($squad->trainingSessions->where('day', 'Thursday')->first()->intensity == 'High')
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: rgb(220, 64, 64); color: white; font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Thursday')->first()->name }}</span>
                                        @elseif($squad->trainingSessions->where('day', 'Thursday')->first()->intensity == 'Medium')
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: #b8b821; color: white; font-weight: bolder">{{ $squad->trainingSessions->where('day', 'Thursday')->first()->name }}</span>
                                        @else
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: #27ab27; color: white;  font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Thursday')->first()->name }}</span>
                                        @endif
                                        <div class="margin-10px-top font-size14" style="font-weight: bolder;">
                                            {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Thursday')->first()->start_time)) }}
                                            -
                                            {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Thursday')->first()->end_time)) }}
                                        </div>
                                        <div class="font-size13 text-bold">
                                            {{ $squad->trainingSessions->where('day', 'Thursday')->first()->distance . ' ' . $squad->trainingSessions->where('day', 'Thursday')->first()->intensity . ' intensity ' . $squad->trainingSessions->where('day', 'Thursday')->first()->stroke_type . ' training' }}
                                        </div>
                                    </td>
                                @else
                                    <td class="bg-light-gray">
                                    </td>
                                @endif

                                @if (count($squad->trainingSessions->where('day', 'Friday')))
                                    <td>
                                        @if ($squad->trainingSessions->where('day', 'Friday')->first()->intensity == 'High')
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: rgb(220, 64, 64); color: white; font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Friday')->first()->name }}</span>
                                        @elseif($squad->trainingSessions->where('day', 'Friday')->first()->intensity == 'Medium')
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: #b8b821; color: white; font-weight: bolder">{{ $squad->trainingSessions->where('day', 'Friday')->first()->name }}</span>
                                        @else
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: #27ab27; color: white;  font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Friday')->first()->name }}</span>
                                        @endif
                                        <div class="margin-10px-top font-size14" style="font-weight: bolder;">
                                            {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Friday')->first()->start_time)) }}
                                            -
                                            {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Friday')->first()->end_time)) }}
                                        </div>
                                        <div class="font-size13 text-bold">
                                            {{ $squad->trainingSessions->where('day', 'Friday')->first()->distance . ' ' . $squad->trainingSessions->where('day', 'Friday')->first()->intensity . ' intensity ' . $squad->trainingSessions->where('day', 'Friday')->first()->stroke_type . ' training' }}
                                        </div>
                                    </td>
                                @else
                                    <td class="bg-light-gray">
                                    </td>
                                @endif


                                @if (count($squad->trainingSessions->where('day', 'Saturday')))
                                    <td>
                                        @if ($squad->trainingSessions->where('day', 'Saturday')->first()->intensity == 'High')
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: rgb(220, 64, 64); color: white; font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Saturday')->first()->name }}</span>
                                        @elseif($squad->trainingSessions->where('day', 'Saturday')->first()->intensity == 'Medium')
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: #b8b821; color: white; font-weight: bolder">{{ $squad->trainingSessions->where('day', 'Saturday')->first()->name }}</span>
                                        @else
                                            <span
                                                class="bg-sky padding-5px-tb padding-15px-lr border-radius-5 margin-10px-bottom text-white font-size16 xs-font-size13"
                                                style="background-color: #27ab27; color: white;  font-weight: bolder;">{{ $squad->trainingSessions->where('day', 'Saturday')->first()->name }}</span>
                                        @endif
                                        <div class="margin-10px-top font-size14" style="font-weight: bolder;">
                                            {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Saturday')->first()->start_time)) }}
                                            -
                                            {{ date('g:ia', strtotime($squad->trainingSessions->where('day', 'Saturday')->first()->end_time)) }}
                                        </div>
                                        <div class="font-size13 text-bold">
                                            {{ $squad->trainingSessions->where('day', 'Saturday')->first()->distance . ' ' . $squad->trainingSessions->where('day', 'Saturday')->first()->intensity . ' intensity ' . $squad->trainingSessions->where('day', 'Saturday')->first()->stroke_type . ' training' }}
                                        </div>
                                    </td>
                                @else
                                    <td class="bg-light-gray">
                                    </td>
                                @endif


                            </tr>
                        @endforeach


                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
