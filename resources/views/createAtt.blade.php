@extends('layouts.app')

@section('title')
    /Create Attendance
@endsection

@section('page_header')
    Create Attendance
@endsection

@section('content')
    {!! Form::open(['action' => 'HomeController@storeAtt', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('employee_id', 'Employee')}}
            {{Form::text('employee_id', '', ['class' => 'form-control', 'placeholder' => 'Enter Employee'])}}
        </div>
        <div class="form-group">      
            {{Form::label('status_id', 'Employee Status')}}
            {{Form::select('status_id' , $status, null, ['class' => 'form-control', 'placeholder' => 'Employee Status'])}}
        </div>
        <div class="form-group">
            {{Form::label('work_hours', 'Work Hours')}}
            {{Form::text('work_hours', '', ['class' => 'form-control', 'placeholder' => 'Enter Work Hours'])}}
        </div>
        <div class="form-group">
            {{Form::label('day', 'Day Date')}}
            {{Form::date('day', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
