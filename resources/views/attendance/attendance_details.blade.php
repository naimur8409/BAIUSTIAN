@extends('layouts.master')
@section('title','ATTENDANCE')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>BAIUSTIAN
                    </h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>Attendance Details</li>
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
                        <div class="col-md-12 mb-4">
                            <div class="card text-left">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">List of students</h4>
                                    <div class="table-responsive">
                                        <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th>#SL</th>
                                                    <th>Student Id</th>
                                                    <th>Course Code</th>
                                                    <th>Status</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                @foreach ($attendances as $i => $item)

                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$item->student_id}}</td>
                                                        <td>{{$item->course_id}}</td>
                                                        <td>
                                                            <div class="form-group">
                                                                <select name="attendance" class="custom-select mr-sm-2" id="change_status{{$item->id}}" onchange="changeStatus({{$item->id}})">
                                                                        <option value="0">Change Status</option>
                                                                        <option value="1" class="text-success" @if($item->attendence_status == 1) selected="selected" @endif>Present</option>
                                                                        <option value="0" class="text-danger" @if($item->attendence_status == 0) selected="selected" @endif >Absent</option>
                                                                    </select>
                                                                </div>


                                                        </td>
                                                    </tr>
                                                <tr>

                                                </tr>
                                                @endforeach

                                            </tbody>

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
                 function levelterm($id){
                    console.log($id);
                    // $('#semester_edit_form').attr('action',action);
                    // $('#semester').attr('value',data.semester);

                }
            </script>
            <div class="app-footer">

                @include('include.footer')
            </div>
            <!-- fotter end -->
        </div>
        <script>
            function changeStatus(student_id){
                var status=$('#change_status'+student_id).val();
                console.log(status);
                    $.ajax({
                        type: "GET",
                        url: "{{route('attendance.change_status')}}",
                        data: { status:status, student_id:student_id },
                        success: function( msg ) {
                            console.log( msg );
                            if(msg){
                                location.reload();
                            }
                        }
                    });

            }
            </script>
        @endsection
