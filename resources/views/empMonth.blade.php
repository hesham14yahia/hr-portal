@extends('layouts.app')

@section('title')
    /Employee of the Month
@endsection

@section('page_header')
    Employee of the Month
@endsection

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody> 
                    <tr>
                        <th>Name</th>
                        <th>Average Hours</th>
                    </tr>
                    <tr>
                        <td>{{$emp_month_name}}</td>
                        <td>{{$emp_month}}</td>
                    </tr>
                 </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
@endsection
