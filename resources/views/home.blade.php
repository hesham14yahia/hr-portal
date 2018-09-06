@extends('layouts.app')

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
                    
                    {{-- @if(count($fixers) > 0)
                        @foreach($fixers as $fixer)
                            <tr>
                                <td>{{$fixer->id}}</td>
                                <td style="width:10%">
                                    <img class="img-responsive text-center fixer-img" src="/storage/image_bath/{{$fixer->image_bath}}">
                                </td>
                                <td>{{$fixer->name}}</td>
                                <td>{{$fixer->birth_date}}</td>
                                <td>{{$fixer->city->name}}</td>
                                <td>
                                    @foreach($fixer->areas as $area)
                                        {{$area->name}} 
                                    @endforeach
                                </td>
                                <td>{{$fixer->category->name}}</td>
                                <td>                
                                    <a href="{{url('/create')}}"><i class="btn btn-primary"></i> Add Employee</a>
                                    <a href="{{url('/create')}}"><i class="btn btn-success"></i> Edit Employee</a>
                                    <a href="{{url('/create')}}"><i class="btn btn-danger"></i> Delete Employee</a>
                                </td>
                            </tr>
                        @endforeach
                    @endif --}}
                 </tbody>
            </table>
        </div><!-- /.box-body -->
    </div><!-- /.box -->
</div>
@endsection
