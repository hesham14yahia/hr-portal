@extends('layouts.app')

@section('title')
    /Edit Employee
@endsection

@section('page_header')
    Edit Employee
@endsection

@section('content')
    {!! Form::open(['action' => ['HomeController@update', $emp->id], 'method' => 'PUT']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $emp->name, ['class' => 'form-control', 'placeholder' => 'Enter Your Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', $emp->email, ['class' => 'form-control', 'placeholder' => 'Enter Your Email'])}}
        </div>
        <div class="form-group">
            {{Form::label('mobile', 'Mobile Number')}}
            {{Form::text('mobile', $emp->mobile, ['class' => 'form-control', 'placeholder' => 'Enter Your Mobile Number'])}}
        </div>
        <div class="form-group">
            {{Form::label('hire_date', 'Hire Date')}}
            {{Form::date('hire_date', \Carbon\Carbon::now(), ['class' => 'form-control', 'value' =>$emp->hire_date ])}}
        </div>
        {{Form::submit('Submit', ['class'=>'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
