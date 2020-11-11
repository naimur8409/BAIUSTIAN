@extends('layouts.master')
@section('title','COURSE')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>BAIUSTIAN
                    </h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>Assigned Courses</li>
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
                        {{--  ====================Semester List========================  --}}

                        <div class="row">
                                    @if(Auth::user()->hasRole('faculty'))
                                        @foreach ($course as $item)

                                            @forelse ($item as $course)

                                                @forelse ($course->faculties as $f)
                                                    @if($f->email == Auth::user()->email )

                                                        <div class="col-md-3 mb-4">
                                                            <div class="card text-left">
                                                                <div class="card-body">
                                                                    <h5 class="card-title text-center">{{ $course->c_code }}</h5>
                                                                    <p class="card-text text-center">{{ $course->name }}</p>
                                                                    {{-- <p class="card-text text-center">{{ $course }}</p> --}}
                                                                    <p class="card-text text-center">{{ $course->levelterm->levelterm }}</p>
                                                                    <a class="btn btn-sm btn-primary  ml-5 mb-2" href="{{ route('attendance.student.list',$course->id) }}">Take Attandance</a>
                                                                    <a class="btn btn-sm btn-primary  ml-5" href="{{ route('attendance.list',$course->id) }}">View Attandance</a>

                                                                </div>

                                                            </div>
                                                        </div>
                                                    @endif
                                                    @empty

                                                @endforelse

                                                @empty

                                            @endforelse

                                        @endforeach
                                    @endif

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
        @endsection
