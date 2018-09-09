@extends('layouts.app')

@section('filters')
        {!! Form::open(['action' => 'HomeController@report', 'method' => 'Get']) !!}
        <div class="col-xs-3">
            {{Form::label('emp_name', 'Enter Employee')}}
            {{Form::text('emp_name', '', ['class' => 'form-control', 'placeholder' => 'Enter Employee'])}}
        </div>
        <div class="col-xs-3">
            {{Form::label('start_date', 'Enter Initial Date')}}
            {{Form::date('start_date' , \Carbon\Carbon::now(), ['class' => 'form-control'])}}
        </div>
        <div class="col-xs-3">
            {{Form::label('last_date', 'Enter Last Date')}}
            {{Form::date('last_date',  \Carbon\Carbon::now(), ['class' => 'form-control'])}}
        </div>
        <div class="col-xs-3">
            {{Form::submit('Filter', ['class' => 'btn btn-info col-xs-12 btn-report'])}}
        </div>
        {!! Form::close() !!}
@endsection

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody> 
                    <tr>
                        <th></th>
                        <th>Date</th>
                        <th>Work Hours</th>
                    </tr>                    
                    @if(count($atts) > 0)
                        @foreach($atts as $att)
                            <tr>
                                <td></td>
                                <td>{{$att->day}}</td>
                                <td>{{$att->work_hours}}</td>
                            </tr>
                        @endforeach
                    @endif
                    <tr>
                        <th>Name</th>
                        <th>Days Count</th>
                        <th>Average Hours</th>
                    </tr>
                    <tr>
                        <td>{{$emp_name}}</td>
                        <td>{{$days_count}}</td>
                        <td>{{$hours_total}}</td>
                    </tr>
                 </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
@endsection
