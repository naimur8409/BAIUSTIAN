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
                    @if ($message = Session::get('error'))
                    <div class="alert alert-danger alert-dismissible m-4">
                    <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                    <h5><i class="icon fa fa-check"></i> Error!</h5>
                        <strong>{{ $message }}</strong>
                    </div>

                @endif
                    <div class="card-body">

                        {{--  ====================Semester List========================  --}}
                        <div class="col-md-12 mb-4">
                            <div class="card text-left">
                                <div class="card-body">
                                    <h4 class="card-title mb-3">Select Level Term</h4>
                                    <div class="row">

                                        @foreach ($levelterms as $lt)

                                            <div class="col-md-4">
                                                <div class="card card-icon-big mb-4">
                                                    <div class="card-body text-center">
                                                        <h4>{{ $lt->levelterm }}</h4>
                                                        <a class="btn btn-info" target="_blank" href="{{ route('result.my_details_result',$lt->id) }}" >View</a>

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
