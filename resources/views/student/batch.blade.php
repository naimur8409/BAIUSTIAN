@extends('layouts.master')
@section('title','STUDENT')
        @section('main-content')
            <div class="main-content-wrap sidenav-open d-flex flex-column">
                <!-- ============ Body content start ============= -->
                <div class="main-content">
                    <div class="breadcrumb">
                        <h1>Student</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Dashboard</a></li>
                            <li>Student List</li>
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

                            <br>
                            {{--  ====================Semester List========================  --}}
                            <div class="col-md-12 mb-4">
                                <div class="card text-left">
                                    <div class="card-body">
                                        <h4 class="card-title mb-3">List of student</h4>
                                        <div class="table-responsive">

                                        <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#SL</th>
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Photo</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th>Batch</th>
                                                    <th>Level Term</th>
                                                    <th>Created at</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($datas as $i => $item)
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td>{{$item->s_id}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td><img src="{{ asset('images/students/') }}/{{$item->photo}}" alt="" width="50px"></td>
                                                    <td>{{$item->address}}</td>
                                                    <td>{{$item->phone}}</td>
                                                    <td>{{$item->semester->semester}}</td>
                                                    <td>{{$item->levelterm->levelterm}}</td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm m-1 text-white" data-toggle="modal" data-target="#update" type="button" onclick="editForm({{ $item }})" title="Edit Customer">
                                                            <i class="text-20 i-Edit" title="Edit"></i>
                                                        </button>
                                                        <a href="{{ route('student.delete',[$item->id, $item->email]) }}" class="btn btn-danger btn-sm m-1 text-white" type="button" title="Delete Customer"
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
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Photo</th>
                                                    <th>Address</th>
                                                    <th>Phone</th>
                                                    <th>Batch</th>
                                                    <th>Level Term</th>
                                                    <th>Created at</th>
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
                <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                    <div class="modal-dialog modal-dialog-centered" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalCenterTitle-2"> Update Semester</h5>
                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                            </div>
                            <div class="modal-body">
                                <div class="card mb-5">
                                    <div class="card-body">
                                        <form action="" method="POST" enctype="multipart/form-data" id="student_edit_form">
                                            @csrf

                                            <div class="form-group row">
                                                <div class="col-sm-10">
                                                    <label for="">Student ID</label>
                                                    <input name="s_id" id="s_id" class="form-control" type="text">
                                                </div>
                                                <div class="col-sm-10">
                                                    <label for="">Name</label>
                                                    <input name="name" id="name" value="" class="form-control" type="text">
                                                </div>
                                                <div class="col-sm-10">
                                                    <label for="">Email</label>
                                                    <input name="email" id="email" value="" class="form-control" type="text">
                                                </div>
                                                {{-- <div class="col-sm-10">
                                                    <label for="">Password</label>
                                                    <input name="password" id="password" value="" class="form-control" type="password">
                                                </div> --}}
                                                <div class="col-sm-10">
                                                    <label for="">Phone</label>
                                                    <input name="phone" id="phone" value="" class="form-control" type="text">
                                                </div>
                                                <div class="col-sm-10">
                                                    <label for="">Address</label>
                                                    <input name="address" id="address" value="" class="form-control" type="text">
                                                </div>
                                                <div class="col-sm-10">
                                                    <label for="">Level Term</label>
                                                    <select name="levelTerm_id" class="form-control">
                                                        <option >Select Level Term</option>
                                                        @foreach ($levelTerms as $lt)
                                                            <option value="{{$lt->id}}">{{$lt->levelterm}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>
                                                <div class="col-sm-10">
                                                    <label for="">Semester</label>
                                                    <select name="semester_id" class="form-control">
                                                        <option >Select Semester</option>
                                                        @foreach ($semesters as $sem)
                                                            <option value="{{$sem->id}}" >{{$sem->semester}}</option>
                                                        @endforeach
                                                    </select>
                                                </div>

                                                <div class="col-sm-10">
                                                    <label for="">Blood Group</label>
                                                    <input name="blood_group" id="blood_group" value="" class="form-control" type="text">
                                                </div>

                                                <div class="col-sm-10">
                                                    <label for="">Student Photo</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text" id="inputGroupFileAddon01">Upload</span></div>
                                                        <div class="custom-file">
                                                            <input name="photo" class="custom-file-input" id="inputGroupFile01" type="file" aria-describedby="inputGroupFileAddon01">
                                                            <label class="custom-file-label" for="inputGroupFile01">Choose photo</label>
                                                        </div>
                                                    </div></div>
                                            </div>


                                            <button class="btn btn-primary ml-2" type="submit">Save changes</button>
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
                    function editForm(data){
                        var action="{{url('')}}/update_student/"+data.id;
                        $('#student_edit_form').attr('action',action);
                        $('#s_id').attr('value',data.s_id);
                        $('#name').attr('value',data.name);
                        $('#email').attr('value',data.email);
                        // $('#password').attr('value',data.password);
                        $('#address').attr('value',data.address);
                        $('#phone').attr('value',data.phone);
                        $('#blood_group').attr('value',data.blood_group);
                        $('#semester_id').attr('value',data.semester_id);
                        $('#levelterm_id').attr('value',data.levelterm_id);

                    }
                </script>

                <div class="app-footer">

                    @include('include.footer')
                </div>
                <!-- fotter end -->
            </div>
        @endsection
