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
                            {{--  ====================Create new result========================  --}}
                            <div class="accordion" id="accordionExample">
                                <div class="card ul-card__border-radius">
                                    <div class="card-header">
                                            <a class="text-default collapsed btn btn-primary" data-toggle="collapse" href="#accordion-item-group1" aria-expanded="false">
                                                Add New
                                            </a>
                                    </div>
                                    <div class="collapse" id="accordion-item-group1" data-parent="#accordionExample" style="">
                                        <div class="card-body">
                                            <form action="{{ route('result.store') }}" method="POST">
                                            @csrf
                                                <div class="row">

                                                    <div class="col-md-3 mb-2" >
                                                        <select name="student_id" class="form-control" required>
                                                            <option >Select Student</option>
                                                            @foreach ($students as $sem)
                                                                <option value="{{$sem->id}}">{{$sem->s_id}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <div class="col-md-3 mb-2" >
                                                        <select name="course_id" class="form-control">
                                                            <option >Course Code</option>
                                                            @foreach ($courses as $item)
                                                                <option value="{{$item->id}}">{{$item->c_code}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>


                                                    <div class="col-md-3 mb-2" >
                                                        <select name="faculty_id" class="form-control">
                                                            <option >Taken by</option>
                                                            @foreach ($faculties as $item)
                                                                <option value="{{$item->id}}">{{$item->name}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-3 mb-2" >
                                                        <select name="semester_id" class="form-control">
                                                            <option >Select Batch</option>
                                                            @foreach ($semesters as $sem)
                                                                <option value="{{$sem->id}}">{{$sem->semester}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-3 mb-2" >
                                                        <select name="levelterm_id" class="form-control">
                                                            <option >Level Term</option>
                                                            @foreach ($levelterm as $item)
                                                                <option value="{{$item->id}}">{{$item->levelterm}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-3 mb-2" >
                                                        <input name="gpa" class="form-control" type="text" placeholder="GPA">
                                                    </div>

                                                    <div class="col-md-3 mb-2" >
                                                        <select name="retake" class="form-control">
                                                            <option >Retake</option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>

                                                        </select>
                                                    </div>

                                                    <div class="col-md-3 mb-2" >
                                                        <select name="backlog" class="form-control">
                                                            <option >Backlog</option>
                                                            <option value="1">Yes</option>
                                                            <option value="0">No</option>

                                                        </select>
                                                    </div>

                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-1 mt-3 mt-md-0">
                                                        <button class="btn btn-primary">Create</button>
                                                    </div>
                                                </div>
                                            </form>
                                            <hr>
                                        <span class="text-center">Or Import file</span>
                                        <hr>
                                        <form action="{{ route('result.import') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-8">
                                                    <input name="file" class="form-control" type="file">
                                                </div>
                                                <br>
                                                <div class="col-md-3">
                                                    <button class="btn btn-primary" type="submit">Import File</button>

                                                </div>

                                            </div>
                                        </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <br>
                            {{--  ====================Semester List========================  --}}
                            <div class="col-md-12 mb-4">
                                <div class="card text-left">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">List of all Batch</h4>
                                        <div class="table-responsive">
                                            {{-- <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#SL</th>
                                                        <th>Name</th>
                                                        <th>Level Term</th>
                                                        <th>Course Code</th>
                                                        <th>Taken By</th>
                                                        <th>Semester</th>
                                                        <th>GPA</th>
                                                        <th>Retake</th>
                                                        <th>Back Log</th>
                                                        <th>Created at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($results as $i => $item)
                                                        <tr>
                                                            <td>{{$i+1}}</td>
                                                            <td>{{$item->student->s_id}}</td>
                                                            <td>{{$item->levelterm->levelterm}}</td>
                                                            <td>{{$item->course->c_code}}</td>
                                                            <td>{{$item->faculty->name}}</td>
                                                            <td>{{$item->semester->semester}}</td>
                                                            <td>{{$item->gpa}}</td>
                                                            <td>{{$item->retake}}</td>
                                                            <td>{{$item->backlog}}</td>
                                                            <td>{{$item->created_at}}</td>
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
                                                        <th>Level Term</th>
                                                        <th>Course Code</th>
                                                        <th>Taken By</th>
                                                        <th>Semester</th>
                                                        <th>GPA</th>
                                                        <th>Retake</th>
                                                        <th>Back Log</th>
                                                        <th>Created at</th>
                                                        <th>Action</th>
                                                    </tr>
                                                </tfoot>
                                            </table> --}}

                                            <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                                <thead>
                                                    <tr>
                                                        <th>#SL</th>
                                                        <th>Batch</th>
                                                        <th>View</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($semesters as $i => $item)
                                                        <tr>
                                                            <td>{{$i+1}}</td>
                                                            <td>{{$item->semester}}</td>
                                                            <td>
                                                                <a href="{{ route('result.view',$item->id) }}" class="btn btn-warning btn-sm m-1 text-white" type="button" title="Edit Result">
                                                                    View</i>
                                                                </a>
                                                            </td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#SL</th>
                                                        <th>Semester</th>
                                                        <th>View</th>
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
