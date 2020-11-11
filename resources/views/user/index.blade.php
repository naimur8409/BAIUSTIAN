@extends('layouts.master')
@section('title','USER')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>BAIUSTIAN</h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>User List</li>
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
                        {{--  ====================Create new user========================  --}}
                        <div class="accordion" id="accordionExample">
                            <div class="card ul-card__border-radius">
                                <div class="card-header">
                                        <a class="text-default collapsed btn btn-primary" data-toggle="collapse" href="#accordion-item-group1" aria-expanded="false">
                                            Add New
                                        </a>
                                </div>
                                <div class="collapse" id="accordion-item-group1" data-parent="#accordionExample" style="">
                                    <div class="card-body">
                                        <form action="{{ route('user.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">

                                                <div class="col-md-6 mb-3" >
                                                    <input name="name" class="form-control" type="text" placeholder="Full Name">
                                                </div>
                                                <div class="col-md-6 mb-3" >
                                                    <input name="email" class="form-control" type="email" placeholder="Email">
                                                </div>
                                                <div class="col-md-6 mb-3" >
                                                    <input name="password" class="form-control" type="password" placeholder="Password">
                                                </div>

                                                <div class="col-md-6 mb-3">

                                                    <select name="role_id" class="form-control" id="role">
                                                        <option >Select Role</option>
                                                        @foreach ($roles as $item)
                                                            <option value="{{$item->id}}">{{$item->name}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>


                                            </div>
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
                        {{--  ====================Faculty List========================  --}}
                        <div class="col-md-12 mb-4">
                            <div class="card text-left">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">List of all user</h4>
                                    <div class="table-responsive">
                                        <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#SL</th>
                                                    <th>Name</th>
                                                    <th>Email</th>
                                                    <th>Role</th>
                                                    <th>Created at</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($users as $i => $item)
                                                <tr>
                                                    <td>{{$i+1}}</td>
                                                    <td>{{$item->name}}</td>
                                                    <td>{{$item->email}}</td>
                                                    <td>
                                                        @forelse ($item->roles as $role)
                                                            {{ $role->name }}
                                                        @empty

                                                        @endforelse
                                                    </td>
                                                    <td>{{$item->created_at}}</td>
                                                    <td>
                                                        <button class="btn btn-warning btn-sm m-1 text-white" data-toggle="modal" data-target="#update" type="button" onclick="editForm({{ $item }})" title="Edit User">
                                                            <i class="text-20 i-Edit" title="Edit"></i>
                                                        </button>
                                                        <a href="{{ route('user.delete',$item->id) }}" class="btn btn-danger btn-sm m-1 text-white" type="button" title="Delete User"
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
                                                    <th>Email</th>
                                                    <th>Role</th>
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

                                                        {{-- =============== Update user Modal========= --}}
            <div class="modal fade" id="update" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle-2" aria-hidden="true">
                <div class="modal-dialog modal-dialog-centered" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalCenterTitle-2"> Update User</h5>
                            <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                        </div>
                        <div class="modal-body">
                            <div class="card mb-5">
                                <div class="card-body">
                                    <form action="" method="POST" enctype="multipart/form-data" id="user_edit_form">
                                        @csrf



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

                                                <label for="">Role</label>
                                                <select name="role_id" class="form-control" id="role" required>
                                                    <option value="">Select Role</option>
                                                    @foreach ($roles as $item)
                                                        <option value="{{$item->id}}">{{$item->name}}</option>
                                                    @endforeach
                                                </select>
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
                    var action="{{url('')}}/update_user/"+data.id;
                    $('#user_edit_form').attr('action',action);
                    $('#name').attr('value',data.name);
                    $('#email').attr('value',data.email);
                }
            </script>
            <div class="app-footer">

                @include('include.footer')
            </div>
            <!-- fotter end -->
        </div>
        @endsection
