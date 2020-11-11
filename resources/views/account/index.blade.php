@extends('layouts.master')
@section('title','Accounts')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>BAIUSTIAN</h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li> Account</li>
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
                        {{--  ====================Create New========================  --}}
                        <div class="accordion" id="accordionExample">
                            <div class="card ul-card__border-radius ">
                                        <a class="text-default collapsed btn btn-primary p-2" data-toggle="collapse" href="#accordion-item-group1" aria-expanded="false">
                                            Add New
                                        </a>
                                <div class="collapse" id="accordion-item-group1" data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        <form action="{{ route('account.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-6 mb-6 mb-2" >
                                                    <label for="">Select Student</label>
                                                    <select name="student_id"  class="form-control select2" style="width: 100%;">
                                                        <option value="" >Select Student</option>
                                                        @foreach ($students as $item)
                                                            <option value="{{$item->id}}">{{$item->s_id}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-6 mb-6 mb-2" >
                                                    <label for="">Select Semester</label>
                                                    <select name="semester_id" class="form-control select2" style="width: 100%;">
                                                        <option value="" >Select Semester</option>
                                                        @foreach ($semesters as $item)
                                                            <option value="{{$item->id}}">{{$item->semester}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                @foreach ($due_type as $item)
                                                <input type="hidden" name="due_id[]" value="{{ $item->id }}" >
                                                <div class="col-md-3">
                                                    <label for="">{{ $item->name }}</label>
                                                    <input name="ammount[]" class="form-control" type="number" step="any" placeholder="2000">
                                                </div>
                                                @endforeach

                                            </div>
                                            <br>

                                            <br>

                                            <div class="row">
                                                <div class="col-md-1 mt-3 mt-md-0">
                                                    <button class="btn btn-primary" type="submit">Create</button>
                                                </div>

                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{--  ====================Search By========================  --}}
                        <div class="row">
                        {{-- =======Type==== --}}
                        <div class="col-md-4 mb-4">
                            <div class="card text-left">
                                <div class="card-body">
                                        <h4 class="card-title mb-3">Search by due type</h4>
                                        <div class="row">

                                            <div class="col-md-9 mb-9" >
                                                <select name="due_id" id="due_type" class="form-control select2" style="width: 100%;">
                                                    <option value="" >Select Type</option>
                                                    @foreach ($due_type as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-md-2 mt-3 mt-md-0">
                                                <form action="" method="GET" enctype="multipart/form-data" id="due_search_form">

                                                    <button class="btn btn-primary" type="submit" onclick="due_search_button()">Search</button>

                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                        {{-- ====Id==== --}}
                        <div class="col-md-4 mb-4">
                            <div class="card text-left">
                                <div class="card-body">
                                        <h4 class="card-title mb-3">Search by student ID</h4>
                                        <div class="row">

                                            <div class="col-md-9 mb-9" >
                                                <select name="student_id" id="student_id" class="form-control select2" style="width: 100%;">
                                                    <option value="" >Select Student</option>
                                                    @foreach ($students as $item)
                                                        <option value="{{$item->id}}">{{$item->s_id}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-md-2 mt-3 mt-md-0">
                                                <form action="" method="GET" enctype="multipart/form-data" id="student_search_form">

                                                    <button class="btn btn-primary" type="submit" onclick="student_search_button()">Search</button>

                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>


                        {{-- ====Semester==== --}}
                        <div class="col-md-4 mb-4">
                            <div class="card text-left">
                                <div class="card-body">
                                        <h4 class="card-title mb-3">Search by semester</h4>
                                        <div class="row">

                                            <div class="col-md-9 mb-9" >
                                                <select name="semester_id" id="semester_id" class="form-control select2" style="width: 100%;">
                                                    <option value="" >Select Semester</option>
                                                    @foreach ($semesters as $item)
                                                        <option value="{{$item->id}}">{{$item->semester}}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                            <br>
                                            <div class="col-md-2 mt-3 mt-md-0">
                                                <form action="" method="GET" enctype="multipart/form-data" id="semester_search_form">

                                                    <button class="btn btn-primary" type="submit" onclick="semester_search_button()">Search</button>

                                                </form>
                                            </div>
                                        </div>
                                </div>
                            </div>
                        </div>
                    </div>
                        {{--  ====================List========================  --}}

                        <div class="col-md-12 mb-4">
                            <div class="card text-left">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">List of all Dues</h4>

                                    <div class="table-responsive">
                                        <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#SL</th>
                                                    <th>Student ID</th>
                                                    <th>Ammount</th>
                                                    <th>Semester</th>
                                                    <th>Due Type</th>
                                                    {{-- <th>Action</th> --}}
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($account as $i => $item)
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td>{{ $item->student->s_id }}</td>
                                                    <td>{{ $item->ammount }}</td>
                                                    <td>{{ $item->semester->semester}}</td>
                                                    <td>{{ $item->due->name}}</td>

                                                    {{-- <td>
                                                        <button class="btn btn-warning btn-sm m-1 text-white" data-toggle="modal" data-target="#update" type="button" onclick="editForm({{ $item }})" title="Edit Due">
                                                            <i class="text-20 i-Edit" title="Edit"></i>
                                                        </button>
                                                        <a href="" class="btn btn-danger btn-sm m-1 text-white" type="button" title="Delete"
                                                            onclick="confirm('Are you sure !')">
                                                            <i class="text-20 i-Remove-User" title="Delete"></i>
                                                        </a>
                                                    </td> --}}
                                                </tr>

                                                @endforeach
                                            </tbody>
                                            <tfoot>

                                                <tr>
                                                    <th>#SL</th>
                                                    <th>Student ID</th>
                                                    <th>Ammount</th>
                                                    <th>Semester</th>
                                                    <th>Due Type</th>
                                                    {{-- <th>Action</th> --}}
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

                                                        {{-- =============== Update Semester Modal========= --}}

            <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle-2"> Update Accounts</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="card mb-5">
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data" id="account_edit_form">
                                        @csrf
                                            <div class="row">
                                                <div class="col-md-12 mb-12 mb-2" >
                                                    <label for="">Select Student</label>
                                                    <select name="student_id"  class="form-control select2" style="width: 100%;">
                                                        <option value="" >Select Student</option>
                                                        @foreach ($students as $std)
                                                            <option value="{{$std->id}}" @if($std->id==$item->student_id) selected @endif>{{$std->s_id}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-md-12 mb-12 mb-2" >
                                                    <label for="">Select Semester</label>
                                                    <select name="semester_id" class="form-control select2" style="width: 100%;">
                                                        <option value="" >Select Semester</option>
                                                        @foreach ($semesters as $sem)
                                                            <option value="{{$sem->id}}" @if($sem->id==$item->student_id) selected @endif >{{$sem->semester}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                @foreach ($due_type as $item)
                                                <input type="hidden" name="due_id[]" value="{{ $item->id }}" >
                                                <div class="col-md-12">
                                                    <label for="">{{ $item->name }}</label>
                                                    <input name="ammount[]" id="ammount" class="form-control" type="number" step="any" placeholder="2000">
                                                </div>
                                                @endforeach

                                            </div>
                                            <br>
                                        <button class="btn btn-primary ml-2" type="submit">Update</button>
                                    </form>
                                </div>
                            </div>

                        </div>
                        <div class="modal-footer">
                            <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                        </div>
                    </div>
                </div>
            </div>

            <script>
                function due_search_button(){
                    var type= $('#due_type option:selected').val();

                    var action="{{url('')}}/search_dueType/"+type;
                    $('#due_search_form').attr('action',action);


                }
                function student_search_button(){
                    var type= $('#student_id option:selected').val();

                    var action="{{url('')}}/search_student/"+type;
                    $('#student_search_form').attr('action',action);


                }
                function semester_search_button(){
                    var type= $('#semester_id option:selected').val();

                    var action="{{url('')}}/search_semester/"+type;
                    $('#semester_search_form').attr('action',action);


                }
                function editForm(data){
                    var action="{{url('')}}/update_faculty/"+data.id;
                    $('#account_edit_form').attr('action',action);
                    $('#ammount').attr('value',data.ammount);
                }
            </script>
            <div class="app-footer">

                @include('include.footer')
            </div>
            <!-- fotter end -->
        </div>
        @endsection
