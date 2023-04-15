@extends('layouts.base')

@section('content')
    <h4>Validate Trianing Results
        {{-- @if (Auth::user()->role == 'admin')
            <a href="{{ url('edit-squad/' . $developmentSquad->id) }}">Edit</a>
        @endif --}}
    </h4>

    @if (count($trainingResults))
        <div class="table-responsive" style="margin-top: 20px">
            <table class="table table-striped table-bordered table-hover" id="development">
                <thead>
                    <tr>
                        {{-- <th>Username</th> --}}
                        <th>Firstname</th>
                        <th>Lastname</th>
                        <th>Distance</th>
                        <th>Stroke time</th>
                        <th>Time</th>
                        <th>Uploaded</th>
                        <th>Validate</th>
                        {{-- <th>Gender</th>
                        <th>View Performance</th> --}}
                        {{-- @if (Auth::user()->role == 'admin')
                            <th>Update</th>
                        @endif --}}
                        {{-- <th>CSS grade</th> --}}
                    </tr>
                </thead>
                <tbody>
                    @foreach ($trainingResults as $result)
                        {{-- @if ($user->role == 'swimmer') --}}
                        <tr class="gradeU">
                            <td>{{ $result->user->first_name }}</td>
                            <td>{{ $result->user->last_name }}</td>
                            <td>{{ $result->distance }}</td>
                            <td>{{ $result->stroke_type }}</td>
                            <td>{{ gmdate('H:i:s', $result->time_in_seconds) }}</td>
                            <td>{{ $result->updated_at->diffForHumans() }}</td>
                            <td>
                                <a href="{{ url('validate-training-result/' . $result->id) }}">

                                    <input type="submit" value="VALIDATE" class="form-control"
                                        style="width: 100%;  background-color: #bf3c3c; color: white;">
                                </a>
                            </td>
                            {{-- <td>{{ $user->first_name }}</td>
                                <td>{{ $user->last_name }}</td>
                                <td>{{ $user->gender_id == 1 ? 'Male' : 'Female' }}</td>
                                <td>
                                    <a href="{{ url('performance-history/' . $user->id) }}">

                                        <input type="submit" value="VIEW" class="form-control"
                                            style="width: 100%; background-color: #52a3d9; color: white;">
                                    </a>
                                </td> --}}

                            {{-- @if (Auth::user()->role == 'admin')
                                    <td><input type="submit" value="UPDATE" class="form-control"
                                            style="width: 100%; background-color: #bf3c3c; color: white;">
                                    </td>
                                @endif --}}
                        </tr>
                        {{-- @endif --}}
                    @endforeach


                </tbody>
            </table>
        </div>
    @else
    <h5 style="color: #bf3c3c; font-weight: bolder;">No training data available currently  to validate
        {{-- @if (Auth::user()->role == 'admin')
            <a href="{{ url('edit-squad/' . $developmentSquad->id) }}">Edit</a>
        @endif --}}
    </h5>
    @endif
@endsection
