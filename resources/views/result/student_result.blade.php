@extends('layouts.master')
@section('title','RESULT')
        @section('main-content')
            <div class="main-content-wrap sidenav-open d-flex flex-column">
                <!-- ============ Body content start ============= -->
                <div class="main-content">
                    <div class="breadcrumb">
                        <h1>Result</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Dashboard</a></li>
                            <li>Result</li>
                        </ul>
                    </div>

                    <div class="col-md-12 mb-4">

                        <div class="card-body">

                            @foreach ($errors->all() as $error)
                            <div class="alert alert-card alert-danger" role="alert"><strong class="text-capitalize">Alert!</strong>{{ $error }}
                                <button class="close" type="button" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            @endforeach

                            @if ($message = Session::get('success'))
                            <div class="alert alert-success alert-dismissible m-4">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-check"></i> Success!</h5>
                                <strong>{{ $message }}</strong>
                            </div>

                        @endif

                        @if ($message = Session::get('error'))
                            <div class="alert alert-danger alert-dismissible m-4">
                            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                            <h5><i class="icon fa fa-check"></i> Error!</h5>
                                <strong>{{ $message }}</strong>
                            </div>

                        @endif
                            {{--  ====================Semester List========================  --}}
                            <div class="col-md-12 mb-4">
                                <div class="card text-left">
                                    <div class="card-body">
                                        @if($gpa != '')
                                        <span class="card-title mb-3 ">Result of {{ $lt->levelterm}}  </span>
                                        <span class="card-title mb-3 " style="float: right;">GPA {{ $gpa}} </span>
                                        @endif
                                        <div class="table-responsive">
                                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#SL</th>
                                                        <th>Student_id</th>

                                                        <th>Course Code</th>
                                                        <th>Credit</th>
                                                        <th>Taken By</th>
                                                        <th>Semester</th>
                                                        <th>Grade</th>
                                                        <th>Retake</th>
                                                        <th>Back Log</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($datas as $i => $item)
                                                        <tr>
                                                            <td>{{$i+1}}</td>
                                                            <td>{{$item->student->s_id}}</td>
                                                            <td>{{$item->course->c_code}}</td>
                                                            <td>{{$item->course->credit}}</td>
                                                            <td>{{$item->faculty->name}}</td>
                                                            <td>{{$item->semester->semester}}</td>
                                                            <td>{{$item->gpa}}</td>
                                                            <td>@if($item->retake == 0)No @endif @if($item->retake == 1)Yes @endif</td>
                                                            <td>@if($item->backlog == 0)No @endif @if($item->backlog == 1)Yes @endif</td>
                                                            <td>
                                                                <a href="{{ route('result.edit',$item->id) }}" class="btn btn-warning btn-sm m-1 text-white" type="button" title="Edit Result">
                                                                    <i class="text-20 i-Edit" title="Edit"></i>
                                                                </a>
                                                                <a href="{{ route('result.delete',$item->id) }}" class="btn btn-danger btn-sm m-1 text-white" type="button" title="Delete Customer"
                                                                    onclick="confirm('Are you sure !')">
                                                                    <i class="text-20 i-Remove-User" title="Delete"></i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#SL</th>
                                                        <th>Name</th>
                                                        <th>Course Code</th>
                                                        <th>Credit</th>
                                                        <th>Taken By</th>
                                                        <th>Semester</th>
                                                        <th>GPA</th>
                                                        <th>Retake</th>
                                                        <th>Back Log</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table>

                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>

                </div>


                <div class="app-footer">

                    @include('include.footer')
                </div>
                <!-- fotter end -->
            </div>
        @endsection
