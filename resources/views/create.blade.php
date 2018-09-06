@extends('layouts.app')

@section('title')
    /Create Employee
@endsection

@section('page_header')
    Create Employee
@endsection

@section('content')
    {!! Form::open(['action' => 'HomeController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('mobile', 'Mobile Number')}}
            {{Form::text('mobile', '', ['class' => 'form-control', 'placeholder' => 'Enter Your Mobile Number'])}}
        </div>
        <div class="form-group">
            {{Form::label('hire_date', 'Hire Date')}}
            {{Form::date('hire_date', \Carbon\Carbon::now(), ['class' => 'form-control'])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
