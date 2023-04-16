@extends('layouts.base')

@section('content')

    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    All Results
                </div>
                <div class="panel-body">
                    <ul class="nav nav-tabs">
                        <li class="active"><a href="#50m" data-toggle="tab">50m</a>
                        </li>
                        <li class=""><a href="#100m" data-toggle="tab">100m</a>
                        </li>
                        <li class=""><a href="#200m" data-toggle="tab">200m</a>
                        </li>
                        <li class=""><a href="#400m" data-toggle="tab">400m</a>
                        </li>
                        <li class=""><a href="#800m" data-toggle="tab">800m</a>
                        </li>
                        <li class=""><a href="#1500m" data-toggle="tab">1500m</a>
                        </li>
                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade active in" id="50m">

                            @if (count($trainingResults_50m))
                                <div class="table-responsive" style="margin-top: 40px;">

                                    <table class="table table-striped table-bordered table-hover"
                                        id="performance-history-50m">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Intensity</th>
                                                {{-- <th>Distance</th> --}}
                                                <th>Stroke type</th>
                                                <th>Time</th>
                                                {{-- <th>Remark</th> --}}
                                                {{-- <th>CSS grade</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($trainingResults_50m as $result)
                                                <tr class="gradeU">
                                                    <td>{{ $result->user->first_name . ' ' . $result->user->last_name }}
                                                    </td>
                                                    <td>{{ $result->training_date }}</td>
                                                    <td>{{ $result->intensity }}</td>
                                                    {{-- <td>{{ $result->distance }}</td> --}}
                                                    <td>{{ $result->stroke_type }}</td>
                                                    <td>{{ gmdate('H:i:s', $result->time_in_seconds) }}</td>
                                                    {{-- <td>{{ $result->remark }}</td> --}}
                                                    {{-- {{ Carbon\CarbonInterval::seconds($duration['tracked_time'])->cascade()->forHumans()  ?? '' }} --}}



                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>

                                </div>
                            @else
                                <h4>No training performance data to display</h4>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="100m">
                            @if (count($trainingResults_100m))
                                <div class="table-responsive" style="margin-top: 40px;">

                                    <table class="table table-striped table-bordered table-hover"
                                        id="performance-history-100m">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Intensity</th>
                                                {{-- <th>Distance</th> --}}
                                                <th>Stroke type</th>
                                                <th>Time</th>
                                                {{-- <th>Remark</th> --}}
                                                {{-- <th>CSS grade</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($trainingResults_100m as $result)
                                                <tr class="gradeU">
                                                    <td>{{ $result->user->first_name . ' ' . $result->user->last_name }}
                                                    </td>
                                                    <td>{{ $result->training_date }}</td>
                                                    <td>{{ $result->intensity }}</td>
                                                    {{-- <td>{{ $result->distance }}</td> --}}
                                                    <td>{{ $result->stroke_type }}</td>
                                                    <td>{{ gmdate('H:i:s', $result->time_in_seconds) }}</td>
                                                    {{-- <td>{{ $result->remark }}</td> --}}
                                                    {{-- {{ Carbon\CarbonInterval::seconds($duration['tracked_time'])->cascade()->forHumans()  ?? '' }} --}}



                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>

                                </div>
                            @else
                                <h4>No training performance data to display</h4>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="200m">
                            @if (count($trainingResults_200m))
                                <div class="table-responsive" style="margin-top: 40px;">

                                    <table class="table table-striped table-bordered table-hover"
                                        id="performance-history-200m">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Intensity</th>
                                                {{-- <th>Distance</th> --}}
                                                <th>Stroke type</th>
                                                <th>Time</th>
                                                {{-- <th>Remark</th> --}}
                                                {{-- <th>CSS grade</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($trainingResults_200m as $result)
                                                <tr class="gradeU">
                                                    <td>{{ $result->user->first_name . ' ' . $result->user->last_name }}
                                                    </td>
                                                    <td>{{ $result->training_date }}</td>
                                                    <td>{{ $result->intensity }}</td>
                                                    {{-- <td>{{ $result->distance }}</td> --}}
                                                    <td>{{ $result->stroke_type }}</td>
                                                    <td>{{ gmdate('H:i:s', $result->time_in_seconds) }}</td>
                                                    {{-- <td>{{ $result->remark }}</td> --}}
                                                    {{-- {{ Carbon\CarbonInterval::seconds($duration['tracked_time'])->cascade()->forHumans()  ?? '' }} --}}
                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>

                                </div>
                            @else
                                <h4>No training performance data to display</h4>
                            @endif
                        </div>
                        <div class="tab-pane fade" id="400m">
                            @if (count($trainingResults_400m))
                                <div class="table-responsive" style="margin-top: 40px;">

                                    <table class="table table-striped table-bordered table-hover"
                                        id="performance-history-400m">
                                        <thead>
                                            <tr>
                                                <th>Name</th>
                                                <th>Date</th>
                                                <th>Intensity</th>
                                                {{-- <th>Distance</th> --}}
                                                <th>Stroke type</th>
                                                <th>Time</th>
                                                {{-- <th>Remark</th> --}}
                                                {{-- <th>CSS grade</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>

                                            @foreach ($trainingResults_400m as $result)
                                                <tr class="gradeU">
                                                    <td>{{ $result->user->first_name . " ". $result->user->last_name}}</td>
                                                    <td>{{ $result->training_date }}</td>
                                                    <td>{{ $result->intensity }}</td>
                                                    {{-- <td>{{ $result->distance }}</td> --}}
                                                    <td>{{ $result->stroke_type }}</td>
                                                    <td>{{ gmdate('H:i:s', $result->time_in_seconds) }}</td>
                                                    {{-- <td>{{ $result->remark }}</td> --}}
                                                    {{-- {{ Carbon\CarbonInterval::seconds($duration['tracked_time'])->cascade()->forHumans()  ?? '' }} --}}



                                                </tr>
                                            @endforeach



                                        </tbody>
                                    </table>

                                </div>
                            @else
                                <h4>No training performance data to display</h4>
                            @endif
                        </div>

                        <div class="tab-pane fade" id="800m">
                            @if (count($trainingResults_800m))
                            <div class="table-responsive" style="margin-top: 40px;">

                                <table class="table table-striped table-bordered table-hover"
                                    id="performance-history-800m">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Intensity</th>
                                            {{-- <th>Distance</th> --}}
                                            <th>Stroke type</th>
                                            <th>Time</th>
                                            {{-- <th>Remark</th> --}}
                                            {{-- <th>CSS grade</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($trainingResults_800m as $result)
                                            <tr class="gradeU">
                                                <td>{{ $result->user->first_name . " ". $result->user->last_name}}</td>
                                                <td>{{ $result->training_date }}</td>
                                                <td>{{ $result->intensity }}</td>
                                                {{-- <td>{{ $result->distance }}</td> --}}
                                                <td>{{ $result->stroke_type }}</td>
                                                <td>{{ gmdate('H:i:s', $result->time_in_seconds) }}</td>
                                                {{-- <td>{{ $result->remark }}</td> --}}
                                                {{-- {{ Carbon\CarbonInterval::seconds($duration['tracked_time'])->cascade()->forHumans()  ?? '' }} --}}



                                            </tr>
                                        @endforeach



                                    </tbody>
                                </table>

                            </div>
                        @else
                            <h4>No training performance data to display</h4>
                        @endif
                        </div>

                        <div class="tab-pane fade" id="1500m">
                            @if (count($trainingResults_1500m))
                            <div class="table-responsive" style="margin-top: 40px;">

                                <table class="table table-striped table-bordered table-hover"
                                    id="performance-history-1500m">
                                    <thead>
                                        <tr>
                                            <th>Name</th>
                                            <th>Date</th>
                                            <th>Intensity</th>
                                            {{-- <th>Distance</th> --}}
                                            <th>Stroke type</th>
                                            <th>Time</th>
                                            {{-- <th>Remark</th> --}}
                                            {{-- <th>CSS grade</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>

                                        @foreach ($trainingResults_1500m as $result)
                                            <tr class="gradeU">
                                                <td>{{ $result->user->first_name . " ". $result->user->last_name}}</td>
                                                <td>{{ $result->training_date }}</td>
                                                <td>{{ $result->intensity }}</td>
                                                <td>{{ $result->stroke_type }}</td>
                                                <td>{{ gmdate('H:i:s', $result->time_in_seconds) }}</td>
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


@endsection
