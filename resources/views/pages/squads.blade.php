@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-md-12 col-sm-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                    Select a squad to view swimmers
                </div>
                <div class="panel-body">
                    <ul class="nav nav-pills">
                        <li class=""><a href="#development-squad" data-toggle="tab">Development</a>
                        </li>
                        <li class=""><a href="#intermediate-squad" data-toggle="tab">Intermediate</a>
                        </li>
                        <li class=""><a href="#performance-squad" data-toggle="tab">Performance</a>
                        </li>
                        <li class=""><a href="#para-squad" data-toggle="tab">Para Swimming</a>
                        </li>

                    </ul>

                    <div class="tab-content">
                        <div class="tab-pane fade" id="development-squad">
                            <h4>Development Squad Members
                                @if (Auth::user()->role == 'admin' ||
                                        (Auth::user()->role == 'coach' && Auth::user()->squad->id == $developmentSquad->id))
                                    <a href="{{ url('edit-squad/' . $developmentSquad->id) }}">Edit</a>
                                @endif
                            </h4>

                            @if (count($developmentSquad->users))
                                <div class="table-responsive" style="margin-top: 20px">
                                    <table class="table table-striped table-bordered table-hover" id="development">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Gender</th>
                                                <th>View Performance</th>
                                                @if (Auth::user()->role == 'admin')
                                                    <th>Update</th>
                                                @endif
                                                {{-- <th>CSS grade</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($developmentSquad->users as $user)
                                                @if ($user->role == 'swimmer')
                                                    <tr class="gradeU">
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->first_name }}</td>
                                                        <td>{{ $user->last_name }}</td>
                                                        <td>{{ $user->gender_id == 1 ? 'Male' : 'Female' }}</td>
                                                        <td>
                                                            <a href="{{ url('performance-history/' . $user->id) }}">

                                                                <input type="submit" value="VIEW" class="form-control"
                                                                    style="width: 100%; background-color: #52a3d9; color: white;">
                                                            </a>
                                                        </td>

                                                        @if (Auth::user()->role == 'admin')
                                                            <td>
                                                                <a href="{{ url('update-user-account/' . $user->id) }}">
                                                                    <input type="submit" value="UPDATE"
                                                                        class="form-control"
                                                                        style="width: 100%; background-color: #bf3c3c; color: white;">

                                                                </a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            @else
                                No registered swimmers for this squad
                            @endif
                        </div>
                        <div class="tab-pane fade" id="intermediate-squad">
                            <h4>Intermediate Squad Members
                                @if (Auth::user()->role == 'admin' ||
                                        (Auth::user()->role == 'coach' && Auth::user()->squad->id == $intermediateSquad->id))
                                    <a href="{{ url('edit-squad/' . $intermediateSquad->id) }}">Edit</a>
                                @endif
                            </h4>

                            @if (count($intermediateSquad->users))
                                <div class="table-responsive" style="margin-top: 20px">
                                    <table class="table table-striped table-bordered table-hover" id="intermediate">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Gender</th>
                                                <th>View Performance</th>
                                                @if (Auth::user()->role == 'admin')
                                                    <th>Update</th>
                                                @endif

                                                {{-- <th>CSS grade</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($intermediateSquad->users as $user)
                                                @if ($user->role == 'swimmer')
                                                    <tr class="gradeU">
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->first_name }}</td>
                                                        <td>{{ $user->last_name }}</td>
                                                        <td>{{ $user->gender_id == 1 ? 'Male' : 'Female' }}</td>
                                                        <td>
                                                            {{-- <form action="{{ url('performance-history/' . $user->id) }}"
                                                                method="GET"> --}}
                                                            {{-- @csrf --}}
                                                            <a href="{{ url('performance-history/' . $user->id) }}">
                                                                <input type="submit" value="VIEW" class="form-control"
                                                                    style="width: 100%; background-color: #52a3d9; color: white;">
                                                            </a>
                                                            {{-- </form> --}}
                                                        </td>
                                                        @if (Auth::user()->role == 'admin')
                                                            <td>
                                                                <a href="{{ url('update-user-account/' . $user->id) }}">
                                                                    <input type="submit" value="UPDATE"
                                                                        class="form-control"
                                                                        style="width: 100%; background-color: #bf3c3c; color: white;">

                                                                </a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            @else
                                No registered swimmers for this squad
                            @endif



                        </div>
                        <div class="tab-pane fade" id="performance-squad">
                            <h4>Performance Squad Members
                                @if (Auth::user()->role == 'admin' ||
                                        (Auth::user()->role == 'coach' && Auth::user()->squad->id == $performanceSquad->id))
                                    <a href="{{ url('edit-squad/' . $performanceSquad->id) }}">Edit</a>
                                @endif
                            </h4>

                            @if (count($performanceSquad->users))
                                <div class="table-responsive" style="margin-top: 20px">
                                    <table class="table table-striped table-bordered table-hover" id="performance">
                                        <thead>
                                            <tr>
                                                <th>Username</th>
                                                <th>Firstname</th>
                                                <th>Lastname</th>
                                                <th>Gender</th>
                                                <th>View Performance</th>
                                                @if (Auth::user()->role == 'admin')
                                                    <th>Update</th>
                                                @endif
                                                {{-- <th>CSS grade</th> --}}
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($performanceSquad->users as $user)
                                                @if ($user->role == 'swimmer')
                                                    <tr class="gradeU">
                                                        <td>{{ $user->username }}</td>
                                                        <td>{{ $user->first_name }}</td>
                                                        <td>{{ $user->last_name }}</td>
                                                        <td>{{ $user->gender_id == 1 ? 'Male' : 'Female' }}</td>
                                                        <td>
                                                            <a href="{{ url('performance-history/' . $user->id) }}">
                                                                <input type="submit" value="VIEW" class="form-control"
                                                                    style="width: 100%; background-color: #52a3d9; color: white;">
                                                            </a>
                                                        </td>
                                                        @if (Auth::user()->role == 'admin')
                                                            <td>
                                                                <a href="{{ url('update-user-account/' . $user->id) }}">
                                                                    <input type="submit" value="UPDATE"
                                                                        class="form-control"
                                                                        style="width: 100%; background-color: #bf3c3c; color: white;">

                                                                </a>
                                                            </td>
                                                        @endif
                                                    </tr>
                                                @endif
                                            @endforeach


                                        </tbody>
                                    </table>
                                </div>
                            @else
                                No registered swimmers for this squad
                            @endif

                        </div>
                        <div class="tab-pane fade" id="para-squad">
                            <h4>Para Swimming Squad Members</h4>

                            Squad comming soon .................

                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
