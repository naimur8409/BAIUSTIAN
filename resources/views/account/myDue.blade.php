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
                        <li> My Due</li>
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
                        <br>

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


            <div class="app-footer">

                @include('include.footer')
            </div>
            <!-- fotter end -->
        </div>
        @endsection
