@extends('layouts.master')
@section('title','ATTENDANCE')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>BAIUSTIAN</h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>Date</li>
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
                                                    <th>ID</th>
                                                    <th>Name</th>
                                                    <th>Action</th>
                                                </tr>
                                            </thead>
                                            <tbody>

                                                <form action="{{ route('attendance.store') }}" method="post" id="take_atn">
                                                @foreach ($student as $i => $item)
                                                @csrf
                                                    <tr>
                                                        <td>{{$i+1}}</td>
                                                        <td>{{$item->s_id}}</td>
                                                        <td>{{$item->name}}</td>
                                                        <td>


                                                            <label class="radio radio-outline-success">
                                                                <input type="radio"  name="attendance[{{ $item->s_id }}]" value="p"><span>Present</span><span class="checkmark"></span>
                                                            </label>
                                                            <label class="radio radio-outline-danger">
                                                                <input type="radio" name="attendance[{{ $item->s_id }}]" value="a"><span>Absent</span><span class="checkmark"></span>
                                                            </label>
                                                            <input type="hidden" name="course_id" value="{{ $course->id }}">
                                                            {{-- <input type="hidden" name="teacher_id" value="{{ $class->teacher_id }}"> --}}


                                                        </td>
                                                    </tr>
                                                <tr>

                                                </tr>
                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>

                                                    <th colspan="4">



                                                        <button class="btn btn-primary ml-2" type="submit">Save</button>
                                                    </form>
                                                    </th>

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
                function access_form(){

                    var atn= $('#attn option:selected').val();
                    alert(atn);
                    // var action="{{url('')}}/search_dueType/"+type;
                    // $('#due_search_form').attr('action',action);

                }
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
