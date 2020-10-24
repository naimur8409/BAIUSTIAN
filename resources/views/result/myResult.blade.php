@extends('layouts.master')
@section('title','My Result')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>Result
                    </h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>My Result</li>
                    </ul>
                </div>

                <div class="col-md-12 mb-4">

                    <div class="card-body">

                        {{--  ====================Semester List========================  --}}
                        <div class="col-md-12 mb-4">
                            <div class="card text-left">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Select Semester</h4>
                                    <div class="row">

                                        @foreach ($levelterms as $lt)

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
                                                                                        <th scope="col">Credit</th>
                                                                                        <th scope="col">Taken By</th>
                                                                                        <th scope="col">GPA</th>
                                                                                        <th scope="col">Retake</th>
                                                                                        <th scope="col">Back Log</th>
                                                                                    </tr>
                                                                                </thead>
                                                                                <tbody>
                                                                                    @forelse ($datas as $data)
                                                                                        @if($data->levelterm_id == $lt->id )
                                                                                    <tr>
                                                                                        <td>{{ $data->course->c_code }}</td>
                                                                                        <td>{{ $data->course->name }}</td>
                                                                                        <td>{{ $data->course->credit }}</td>
                                                                                        <td>{{ $data->faculty->name }}</td>
                                                                                        <td>{{ $data->gpa }}</td>
                                                                                        <td>{{ $data->retake }}</td>
                                                                                        <td>{{ $data->backlog }}</td>

                                                                                    </tr>


                                                                                        @endif
                                                                                        @empty
                                                                                    @endforelse

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
                                </div>
                            </div>
                        </div>



                    </div>

                </div>

            </div>

            <div class="app-footer">

                @include('include.footer')
            </div>
            <!-- fotter end -->
        </div>
        @endsection
