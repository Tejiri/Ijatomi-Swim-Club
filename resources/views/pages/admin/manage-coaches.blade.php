@extends('layouts.base')

@section('content')
@if (count($coaches))
<div class="table-responsive" style="margin-top: 40px;">

    <table class="table table-striped table-bordered table-hover" id="performance-history-50m">
        <thead>
            <tr>
                <th>Firstname</th>
                <th>Lastname</th>
                <th>Middlename</th>
                <th>Phone Number</th>
                <th>Date of Birth</th>
                <th>Update</th>
                {{-- <th>CSS grade</th> --}}
            </tr>
        </thead>
        <tbody>

            @foreach ($coaches as $coach)
                <tr class="gradeU">
                    <td>{{ $coach->first_name }}</td>
                    <td>{{ $coach->last_name }}</td>
                    <td>{{ $coach->middle_name }}</td>
                    <td>{{ $coach->phone_number }}</td>
                    <td>{{ $coach->date_of_birth }}</td>
                    <td>
                        <a href="{{ url('update-user-account/' . $coach->id) }}">
                            <input type="submit" value="UPDATE" class="form-control"
                                style="width: 100%; background-color: #bf3c3c; color: white;">
                        </a>
                    </td>
                </tr>
            @endforeach



        </tbody>
    </table>

</div>
@endif
 
@endsection
