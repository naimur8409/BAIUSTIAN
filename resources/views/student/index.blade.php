@extends('layouts.master')
@section('title','STUDENT')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Students</h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>Student's batch</li>
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
                        {{--  ====================Create new customer========================  --}}
                        <div class="accordion" id="accordionExample">
                            <div class="card ul-card__border-radius">
                                <div class="card-header">
                                        <a class="text-default collapsed btn btn-primary" data-toggle="collapse" href="#accordion-item-group1" aria-expanded="false">
                                            Add New
                                        </a>
                                </div>
                                <div class="collapse" id="accordion-item-group1" data-parent="#accordionExample" style="">
                                    <div class="card-body">

                                        <form action="{{ route('student.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input name="s_id" class="form-control" type="text" placeholder="Student ID">
                                                </div>
                                                <div class="col-md-3">
                                                    <input name="name" class="form-control" type="text" placeholder="Full Name">
                                                </div>
                                                <div class="col-md-3">
                                                    <input name="email" class="form-control" type="email" placeholder="Email">
                                                </div>
                                                <div class="col-md-3">
                                                    <input name="password" class="form-control" type="password" placeholder="Password">
                                                </div>
                                            </div>
                                            <br>
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <input name="address" class="form-control" type="text" placeholder="Address">
                                                </div>
                                                <div class="col-md-3">
                                                    <input name="phone" class="form-control" type="text" placeholder="Phone Number">
                                                </div>
                                                <div class="col-md-3">

                                                    <select name="semester_id" class="form-control">
                                                        <option >Select Batch</option>
                                                        @foreach ($semesters as $sem)
                                                            <option value="{{$sem->id}}">{{$sem->semester}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                                <div class="col-md-3">

                                                    <select name="levelTerm_id" class="form-control">
                                                        <option >Select Level Term</option>
                                                        @foreach ($levelTerms as $lt)
                                                            <option value="{{$lt->id}}">{{$lt->levelterm}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">

                                                <div class="col-md-3">
                                                    <label for="">Blood Group</label>
                                                    <input name="blood_group" class="form-control" type="text" placeholder="Blood Group">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Student Photo</label>
                                                    <div class="input-group mb-3">
                                                        <div class="input-group-prepend"><span class="input-group-text" id="inputGroupFileAddon01">Upload</span></div>
                                                        <div class="custom-file">
                                                            <input name="photo" class="custom-file-input" id="inputGroupFile01" type="file" aria-describedby="inputGroupFileAddon01">
                                                            <label class="custom-file-label" for="inputGroupFile01">Choose photo</label>
                                                        </div>
                                                    </div>

                                                </div>
                                            </div>



                                            <div class="row">
                                                <div class="col-md-1 mt-3 mt-md-0">
                                                    <button class="btn btn-primary" type="submit">Create</button>
                                                </div>
                                            </div>
                                        </form>
                                        <hr>
                                        <span class="text-center">Or Import file</span>
                                        <hr>
                                        <form action="{{ route('student.import') }}" method="POST" enctype="multipart/form-data">
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
                                    <h4 class="card-title mb-3">List of all batch</h4>
                                    <div class="table-responsive">
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
                                                            <a href="{{ route('student.batch',$item->id) }}" class="btn btn-warning btn-sm m-1 text-white" type="button" title="Edit Result">
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

                                                        {{-- =============== Update Semester Modal========= --}}
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
                                            <div class="col-sm-10">
                                                <label for="">Password</label>
                                                <input name="password" id="password" value="" class="form-control" type="password">
                                            </div>
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
                    $('#password').attr('value',data.password);
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
