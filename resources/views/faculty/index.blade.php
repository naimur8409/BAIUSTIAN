@extends('layouts.master')
@section('title','FACULTY')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Faculty</h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>Faculty List</li>
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
                        {{--  ====================Create new faculty========================  --}}
                        <div class="accordion" id="accordionExample">
                            <div class="card ul-card__border-radius">
                                <div class="card-header">
                                        <a class="text-default collapsed btn btn-primary" data-toggle="collapse" href="#accordion-item-group1" aria-expanded="false">
                                            Add New
                                        </a>
                                </div>
                                <div class="collapse" id="accordion-item-group1" data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        <form action="{{ route('faculty.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <input name="f_id" class="form-control" type="text" placeholder="Faculty ID">
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
                                                    <input name="designation" class="form-control" type="text" placeholder="Designation">
                                                </div>
                                                <div class="col-md-3">
                                                    <input name="blood_group" class="form-control" type="text" placeholder="Blood Group">
                                                </div>
                                            </div>

                                            <br>
                                            <div class="row">
                                                <div class="col-md-3">
                                                    <label for="">Joining Date</label>
                                                    <input name="joining_date" class="form-control" type="date" placeholder="Joining Date">
                                                </div>
                                                <div class="col-md-6">
                                                    <label for="">Faculty Photo</label>
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
                                    </div>
                                </div>
                            </div>
                        </div>
                        <br>
                        {{--  ====================Faculty List========================  --}}
                        <div class="col-md-12 mb-4">
                            <div class="card text-left">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">List of all faculties</h4>
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
                                                    <th>Designation</th>
                                                    <th>Blood Group</th>
                                                    <th>Joining Date</th>
                                                    <th>Created at</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($faculties as $i => $item)
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td>{{$item->f_id}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td><img src="{{ asset('images/faculties/') }}/{{$item->photo}}" alt="" width="50px"></td>
                                                    <td>{{$item->address}}</td>
                                                    <td>{{$item->phone}}</td>
                                                    <td>{{$item->designation}}</td>
                                                    <td>{{$item->blood_group}}</td>
                                                    <td>{{$item->joining_date}}</td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm m-1 text-white" data-toggle="modal" data-target="#update" type="button" onclick="editForm({{ $item }})" title="Edit Customer">
                                                            <i class="text-20 i-Edit" title="Edit"></i>
                                                        </button>
                                                        <a href="{{ route('faculty.delete',[$item->id, $item->email]) }}" class="btn btn-danger btn-sm m-1 text-white" type="button" title="Delete Customer"
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
                                                    <th>Designation</th>
                                                    <th>Blood Group</th>
                                                    <th>Joining Date</th>
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
                                    <form action="" method="POST" enctype="multipart/form-data" id="faculty_edit_form">
                                        @csrf

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <label for="">ID</label>
                                                <input name="f_id" id="f_id" value="" class="form-control" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <label for="">Name</label>
                                                <input name="name" id="name" value="" class="form-control" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <label for="">Email</label>
                                                <input name="email" id="email" value="" class="form-control" type="email">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <label for="">Designation</label>
                                                <input name="designation" id="designation" value="" class="form-control" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <label for="">Phone</label>
                                                <input name="phone" id="phone" value="" class="form-control" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <label for="">Address</label>
                                                <input name="address" id="address" value="" class="form-control" type="text">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <label for="">Joining Date</label>
                                                <input name="joining_date" id="joining_date" value="" class="form-control" type="date">
                                            </div>
                                        </div>

                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <label for="">Blood Group</label>
                                                <input name="blood_group" id="blood_group" value="" class="form-control" type="text">
                                            </div>
                                        </div>


                                        <div class="form-group row">
                                            <div class="col-sm-10">
                                                <div class="input-group mb-3">
                                                    <div class="input-group-prepend"><span class="input-group-text" id="inputGroupFileAddon01">Upload</span></div>
                                                    <div class="custom-file">
                                                        <input name="photo" class="custom-file-input" id="inputGroupFile01" type="file" aria-describedby="inputGroupFileAddon01">
                                                        <label class="custom-file-label" for="inputGroupFile01">Choose photo</label>
                                                    </div>
                                                </div>
                                            </div>
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
                    var action="{{url('')}}/update_faculty/"+data.id;
                    $('#faculty_edit_form').attr('action',action);
                    $('#f_id').attr('value',data.f_id);
                    $('#name').attr('value',data.name);
                    $('#email').attr('value',data.email);
                    $('#password').attr('value',data.password);
                    $('#phone').attr('value',data.phone);
                    $('#address').attr('value',data.address);
                    $('#designation').attr('value',data.designation);
                    $('#joining_date').attr('value',data.joining_date);
                    $('#blood_group').attr('value',data.blood_group);
                    $('#photo').attr('value',data.photo);

                }
            </script>
            <div class="app-footer">

                @include('include.footer')
            </div>
            <!-- fotter end -->
        </div>
        @endsection
