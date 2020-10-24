@extends('layouts.master')
@section('title','RESULT')
        @section('main-content')
            <div class="main-content-wrap sidenav-open d-flex flex-column">
                <!-- ============ Body content start ============= -->
                <div class="main-content">
                    <div class="breadcrumb">
                        <h1>CT Result</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Dashboard</a></li>
                            <li>CT Result</li>
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
                                            <form action="{{ route('result.ct_store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                                <div class="row">

                                                    <div class="col-md-12 mb-2" >
                                                        <select name="semester_id" class="form-control" required>
                                                            <option >Select Batch</option>
                                                            @foreach ($semesters as $sem)
                                                                <option value="{{$sem->id}}">{{$sem->semester}}</option>
                                                            @endforeach
                                                        </select>
                                                    </div>

                                                    <div class="col-md-12">
                                                        <input name="title" class="form-control" type="text" placeholder="Title" required>
                                                    </div>

                                                    <div class="col-md-12  mt-2">
                                                        <div class="input-group">
                                                            <div class="input-group-prepend"><span class="input-group-text">Text</span></div>
                                                            <textarea name="text" class="form-control" aria-label="With textarea"></textarea>
                                                        </div>
                                                    </div>



                                                    <div class="col-md-6 mt-2">
                                                        <label for="">Result DOC</label>
                                                        <div class="input-group mb-3">
                                                            <div class="input-group-prepend"><span class="input-group-text" id="inputGroupFileAddon02">Upload</span></div>
                                                            <div class="custom-file">
                                                                <input name="documents" class="custom-file-input" id="inputGroupFile02" type="file" aria-describedby="inputGroupFileAddon02">
                                                                <label class="custom-file-label" for="inputGroupFile02">Choose Document</label>
                                                            </div>
                                                        </div>

                                                    </div>



                                                </div>
                                                <br>
                                                <div class="row">
                                                    <div class="col-md-1 mt-3 mt-md-0">
                                                        <button class="btn btn-primary">Add</button>
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
                                        <h4 class="card-title mb-3">List of all notice</h4>
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
                                                        <th>Title</th>
                                                        <th>Photo</th>
                                                        <th>Document</th>
                                                        <th>Created At</th>

                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    @foreach ($results as $i => $item)
                                                        <tr>
                                                            <td>{{$i+1}}</td>
                                                            <td>{{$item->semester->semester}}</td>
                                                            <td>{{$item->title}}</td>
                                                            <td>{{$item->photo ? $item->photo : '' }}</td>
                                                            <td>{{$item->documents ? $item->documents : '' }}</td>
                                                            <td>{{$item->created_at}}</td>
                                                        </tr>
                                                    @endforeach
                                                </tbody>
                                                <tfoot>
                                                    <tr>
                                                        <th>#SL</th>
                                                        <th>Batch</th>
                                                        <th>Title</th>
                                                        <th>Photo</th>
                                                        <th>Document</th>
                                                        <th>Created At</th>
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
