@extends('layouts.master')


        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">List of All Admin</h1>
                    <ul>
                        <li><a href="{{ route('home') }}">Dashboard</a></li>
                    </ul>
                </div>
                
  
                <!-- end of row-->
                <div class="row mb-4">
                    <div class="col-md-12 mb-4">
                        <div class="card text-left">
                            <div class="card-body">
                                
                                <div class="table-responsive">
                                    <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>#SL</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($admins as $i => $data)
                                                
                                            <tr>
                                                <td>{{$i+1}}</td>
                                                <td>{{$data->name}}</td>
                                                <td>{{$data->email}}</td>
                                            </tr>
                                            @endforeach
                                           
                                        </tbody>
                                        <tfoot>
                                            <tr>
                                                
                                                <th>#SL</th>
                                                <th>Name</th>
                                                <th>Email</th>                                          
                                            </tr>
                                        </tfoot>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        @endsection
   