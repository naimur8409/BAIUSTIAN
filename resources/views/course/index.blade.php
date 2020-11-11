@extends('layouts.master')
@section('title','COURSE')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Courses
                    </h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>Course List</li>
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
                    @if(auth()->user()->hasRole('admin'))
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

                                        <form action="{{ route('course.store') }}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="row">
                                                <div class="col-md-4">
                                                    <input name="c_code" class="form-control" type="text" placeholder="Course Code">
                                                </div>
                                                <div class="col-md-4">
                                                    <input name="name" class="form-control" type="text" placeholder="Course Name">
                                                </div>
                                                <div class="col-md-4">
                                                    <input name="credit" class="form-control" type="number" step="any" placeholder="Course Credit">
                                                </div>
                                            </div>
                                            <br>

                                            <div class="row">
                                                <div class="col-md-3">

                                                    <select name="levelterm_id" class="form-control" required>
                                                        <option value="" >Select Level Term</option>
                                                        @foreach ($levelTerms as $lt)
                                                            <option value="{{$lt->id}}">{{$lt->levelterm}}</option>
                                                        @endforeach
                                                    </select>

                                                </div>

                                                <div class="col-md-3">

                                                    <select name="f_id" class="form-control" required>
                                                        <option value="" >Assign Faculty</option>
                                                        @foreach ($faculties as $fac)
                                                            <option value="{{$fac->id}}">{{$fac->name}}</option>
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

                                        <hr>
                                        <span class="text-center">Or Import file</span>
                                        <hr>
                                        <form action="{{ route('course.import') }}" method="POST" enctype="multipart/form-data">
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
                    @endif
                        <br>
                        {{--  ====================Semester List========================  --}}
                        <div class="col-md-12 mb-4">
                            <div class="card text-left">
                                <div class="card-body">
                                    @if(Auth::user()->hasRole('admin') || Auth::user()->hasRole('student') )
                                        <h4 class="card-title mb-3">Select Level Term</h4>
                                        <div class="row">

                                            @foreach ($levelTerms as $lt)

                                                <div class="col-md-4">
                                                    <div class="card card-icon-big mb-4">
                                                        <div class="card-body text-center">
                                                            <p>{{ $lt->levelterm }}</p>
                                                            <button class="btn btn-info" data-toggle="modal" data-target="#a{{ $lt->id }}" >Course</button>

                                                            </div>
                                                    </div>
                                                </div>


                                                <div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" id="a{{ $lt->id }}">
                                                    <div class="modal-dialog modal-lg">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="exampleModalCenterTitle">Courses</h5>
                                                                <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <div class="card-body">
                                                                <div class="list-group">
                                                                        <button class="list-group-item list-group-item-action active" type="button">
                                                                            {{ $lt->levelterm }}

                                                                        </button>


                                                                                <div class="table-responsive">
                                                                                    <table class="table table-striped">
                                                                                        <thead>
                                                                                            <tr>
                                                                                                <th scope="col">Course Code</th>
                                                                                                <th scope="col">Course Name</th>
                                                                                                <th scope="col">Faculty</th>
                                                                                                <th scope="col">Credit</th>
                                                                                            </tr>
                                                                                        </thead>
                                                                                        <tbody>
                                                                                            @foreach ($course as $item)
                                                                                                @forelse ($item as $i)
                                                                                                    {{-- ===1/1== --}}
                                                                                                    @if($i->levelterm_id == $lt->id)
                                                                                                    <tr>
                                                                                                        <td>{{ $i->c_code }}</td>
                                                                                                        <td>{{ $i->name }}</td>
                                                                                                        <td>
                                                                                                            @forelse ($i->faculties as $item)
                                                                                                                {{ $item->name }}
                                                                                                            @empty

                                                                                                            @endforelse
                                                                                                        </td>
                                                                                                        <td>{{ $i->credit }}</td>

                                                                                                    </tr>
                                                                                                    @endif
                                                                                                @empty

                                                                                                @endforelse
                                                                                            @endforeach
                                                                                        </tbody>
                                                                                    </table>
                                                                                </div>

                                                                    </div>
                                                                </div>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button class="btn btn-secondary" type="button" data-dismiss="modal">Close</button>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                            @endforeach

                                        </div>
                                    @endif
                                    @if(Auth::user()->hasRole('faculty'))
                                    <h4 class="card-title mb-3">List of my courses</h4>
                                    <div class="table-responsive">
                                        <table class="display table table-striped table-bordered" id="zero_configuration_table" style="width:100%">
                                            <thead>
                                                <tr>
                                                    <th scope="col">Course Code</th>
                                                    <th scope="col">Course Name</th>
                                                    <th scope="col">Level term</th>
                                                    <th scope="col">Credit</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                @foreach ($course as $item)
                                                @forelse ($item as $course)
                                                <tr>

                                                    @forelse ($course->faculties as $f)
                                                        @if($f->email == Auth::user()->email )
                                                            <td>{{ $course->c_code }}</td>
                                                            <td>{{ $course->name }}</td>
                                                            <td>{{ $course->levelterm->levelterm }}</td>
                                                            <td>{{ $course->credit }}</td>
                                                        @endif
                                                    @empty

                                                    @endforelse

                                                </tr>
                                                @empty

                                                @endforelse

                                                @endforeach

                                            </tbody>
                                            <tfoot>
                                                <tr>
                                                    <th scope="col">Course Code</th>
                                                    <th scope="col">Course Name</th>
                                                    <th scope="col">Level term</th>
                                                    <th scope="col">Credit</th>
                                                </tr>
                                            </tfoot>
                                        </table>
                                    </div>
                                    @endif
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
        @endsection
