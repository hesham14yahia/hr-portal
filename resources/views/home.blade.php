@extends('layouts.app')

{{-- @section('filters')
        <div class="col-xs-3">
            {!! Form::open(['action' => 'FixerController@index', 'method' => 'Get']) !!}
                {{Form::select('city_id', $cities, null, ['class' => 'form-control', 'placeholder' => 'Filter By City'])}}
                {{Form::submit('Filter', ['class' => 'btn btn-info col-xs-12 btn-filter'])}}
            {!! Form::close() !!}
        </div>
        <div class="col-xs-3">
            {!! Form::open(['action' => 'FixerController@index', 'method' => 'GET']) !!}
                {{Form::select('category_id', $categories, null, ['class' => 'form-control', 'placeholder' => 'Filter By Category'])}}
                {{Form::submit('Filter', ['class' => 'btn btn-info col-xs-12 btn-filter'])}}
            {!! Form::close() !!}
        </div>
@endsection --}}

@section('content')
<div class="col-xs-12">
    <div class="box">
        <div class="box-body table-responsive no-padding">
            <table class="table table-hover">
                <tbody>
                    <tr>
                        <th>ID</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Mobile Number</th>
                        <th>HireDate</th>
                        <th></th>
                    </tr>
                    
                    @if(count($emps) > 0)
                        @foreach($emps as $emp)
                            <tr>
                                <td>{{$emp->id}}</td>
                                <td>{{$emp->name}}</td>
                                <td>{{$emp->email}}</td>
                                <td>{{$emp->mobile}}</td>
                                <td>{{$emp->hire_date}}</td>
                                <td>
                                    <a href="{{url('/edit')}}{{'/'.$emp->id}}" class="btn btn-success">Edit</a>
                                    <a href="{{url('/destroy')}}{{'/'.$emp->id}}" class="btn btn-danger">Delete</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif
                 </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
    <a href="{{url('/create')}}" class="btn btn-primary col-sm-1" style="float:right;margin-right:112px">Add</a>
</div>
@endsection
