@extends('layouts.master')
@section('title','RESULT')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Result</h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>Result</li>
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
                        {{--  ====================Update result========================  --}}


                    </div>
                    <div class="card-body">
                        <form action="{{ route('result.update',$result->id) }}" method="POST">
                            @csrf
                            <div class="row">

                                <div class="col-md-6 mb-2" >
                                    <label for="">Select Student</label>
                                    <select name="student_id" class="form-control" required>
                                        @foreach ($students as $sem)
                                            <option value="{{$sem->id}}"

                                                @if($result->student_id == $sem->id) selected @endif

                                                >{{$sem->s_id}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-6 mb-2" >
                                    <label for="">Course Code</label>
                                    <select name="course_id" class="form-control">
                                        <option >Course Code</option>
                                        @foreach ($courses as $item)
                                            <option value="{{$item->id}}"

                                                @if($result->course_id == $item->id) selected @endif

                                                >{{$item->c_code}}</option>
                                        @endforeach
                                    </select>
                                </div>


                                <div class="col-md-6 mb-2" >
                                    <label for="">Taken by</label>
                                    <select name="faculty_id" class="form-control">

                                        @foreach ($faculties as $item)
                                            <option value="{{$item->id}}"

                                                @if($result->faculty_id == $item->id) selected @endif

                                                >{{$item->name}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-2" >
                                    <label for="">Batch</label>
                                    <select name="semester_id" class="form-control">
                                        @foreach ($semesters as $sem)
                                            <option value="{{$sem->id}}"

                                                @if($result->semester_id == $item->id) selected @endif

                                                >{{$sem->semester}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-2" >
                                    <label for="">Level Term</label>
                                    <select name="levelterm_id" class="form-control">
                                        @foreach ($levelterm as $item)
                                            <option value="{{$item->id}}"

                                                @if($result->levelterm_id == $item->id) selected @endif

                                                >{{$item->levelterm}}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="col-md-6 mb-2" >
                                    <label for="">GPA</label>
                                    <input name="gpa" class="form-control" value="{{ $result->gpa }}" type="text" placeholder="GPA">
                                </div>

                                <div class="col-md-6 mb-2" >
                                    <label for="">Retake</label>
                                    <select name="retake" class="form-control">
                                        <option value="1" @if ($result->retake=='1') selected @endif>Yes</option>
                                        <option value="0" @if ($result->retake=='0') selected @endif>No</option>

                                    </select>
                                </div>

                                <div class="col-md-6 mb-2" >
                                    <label for="">Backlog</label>
                                    <select name="backlog" class="form-control">
                                        <option value="1" @if ($result->retake=='1') selected @endif>Yes</option>
                                        <option value="0" @if ($result->retake=='0') selected @endif>No</option>

                                    </select>
                                </div>

                            </div>
                            <br>
                            <div class="row">
                                <div class="col-md-1 mt-3 mt-md-0">
                                    <button class="btn btn-primary">Update</button>
                                </div>
                            </div>
                        </form>
                    </div>

                </div>

            </div>




        <div class="app-footer">

            @include('include.footer')
        </div>
            <!-- fotter end -->
        </div>
        @endsection
