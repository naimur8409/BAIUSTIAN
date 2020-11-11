@extends('layouts.master')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1 class="mr-2">BAIUSTIAN</h1>
                    <ul>
                        <li><a href="">Dashboard</a></li>
                        <li>Home</li>
                    </ul>
                </div>
                <div class="separator-breadcrumb border-top"></div>
                <div class="row">
                    <!-- ICON BG-->
                    @if(auth()->user()->hasRole('student'))
                    <div class="col-12">
                        <div class="card user-profile o-hidden mb-4 pt-5">
                            <div class="user-info"><img class="profile-picture avatar-lg mb-2" src="{{ asset('images/students/') }}/{{ $student->photo }}" alt="">
                                <p class="m-0 text-24">{{ $student->name }}</p>

                                @if ($student->status == 1)<p class="m-0 text-success">Status: Active  </p>@endif
                                @if ($student->status == 0)<p class="m-0">Status: Inactive  </p>@endif
                            </div>
                            <div class="card-body">

                                    <div>

                                        <hr>
                                        <div class="row text-center">
                                            <div class="col-md-4 col-6">
                                                <div class="mb-4">

                                                    <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Email</p><span>{{ $student->email }}</span>
                                                </div>
                                                <div class="mb-4">

                                                    <p class="text-primary mb-1"><i class="i-mobile text-16 mr-1"></i> Phone</p><span>{{ $student->phone }}</span>
                                                </div>

                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="mb-4">

                                                    <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> Lives In</p><span>{{ $student->address }}</span>
                                                </div>
                                                <div class="mb-4">
                                                </div>
                                                <div class="mb-4">
                                                    <p class="text-primary mb-1"><i class="i-Blood text-16 mr-1"></i> Blood Group</p><span>{{ $student->blood_group }}</span>
                                                </div>
                                            </div>
                                            <div class="col-md-4 col-6">
                                                <div class="mb-4">
                                                    <p class="text-primary mb-1"><i class="i-Face-Style-4 text-16 mr-1"></i> Level Term</p><span>{{ $student->levelterm->levelterm }}</span>
                                                </div>
                                                <div class="mb-4">
                                                    <p class="text-primary mb-1"><i class="i-Book-4 text-16 mr-1"></i> Batch</p><span>{{ $student->semester->semester }}</span>
                                                </div>
                                            </div>
                                        </div>
                                        <hr>

                                    </div>

                            </div>
                        </div>
                    </div>


                    @endif


                    @if(auth()->user()->hasRole('admin'))
                            <div class="col-lg-6 col-md-6 col-sm-6">

                                    <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4 ">
                                        <div class="card-body text-center">
                                            <div class="">
                                                <h5>Total Faculty - {{ $faculty }} </h5>
                                            </div>
                                        </div>
                                    </div>

                            </div>
                            <div class="col-lg-6 col-md-6 col-sm-6">


                                <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4 ">
                                    <div class="card-body text-center">
                                        <div class="">
                                            <h5>Total Student - {{ $student }} </h5>
                                        </div>
                                    </div>
                                </div>




                        </div>
                        <div class="col-lg-6 col-md-6 col-sm-6">

                            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4 ">
                                <div class="card-body text-center">
                                    <div class="">
                                        <h5>Total Batch - {{ $semester }} </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">

                            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4 ">
                                <div class="card-body text-center">
                                    <div class="">
                                        <h5>Total User - {{ $user }} </h5>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-6 col-md-6 col-sm-6">

                            <div class="card card-icon-bg card-icon-bg-primary o-hidden mb-4 ">
                                <div class="card-body text-center">
                                    <div class="">
                                        <h5>Total Course - {{ $course }} </h5>
                                    </div>
                                </div>
                            </div>
                        </div>


                    @endif

                    @if(auth()->user()->hasRole('faculty'))
                        <div class="col-12">
                            <div class="card user-profile o-hidden mb-4 pt-5">
                                <div class="user-info"><img class="profile-picture avatar-lg mb-2" src="{{ asset('images/faculties/') }}/{{ $data->photo }}" alt="">
                                    <p class="m-0 text-24">{{ $data->name }}</p>
                                    <p class="text-muted m-0">{{ $data->designation }}</p>
                                </div>
                                <div class="card-body">

                                        <div>
                                            <h4>Personal Information</h4>

                                            <hr>
                                            <div class="row">
                                                <div class="col-md-4 col-6">
                                                    <div class="mb-4">

                                                        <p class="text-primary mb-1"><i class="i-MaleFemale text-16 mr-1"></i> Email</p><span>{{ $data->email }}</span>
                                                    </div>
                                                    <div class="mb-4">

                                                        <p class="text-primary mb-1"><i class="i-mobile text-16 mr-1"></i> Phone</p><span>{{ $data->phone }}</span>
                                                    </div>

                                                </div>
                                                <div class="col-md-4 col-6">
                                                    <div class="mb-4">

                                                        <p class="text-primary mb-1"><i class="i-Globe text-16 mr-1"></i> Lives In</p><span>{{ $data->address }}</span>
                                                    </div>
                                                    <div class="mb-4">
                                                    </div>
                                                    <div class="mb-4">
                                                        <p class="text-primary mb-1"><i class="i-Blood text-16 mr-1"></i> Blood Group</p><span>{{ $data->blood_group }}</span>
                                                    </div>
                                                </div>
                                                <div class="col-md-4 col-6">
                                                    <div class="mb-4">
                                                        <p class="text-primary mb-1"><i class="i-Face-Style-4 text-16 mr-1"></i> Profession</p><span>{{ $data->designation }}</span>
                                                    </div>
                                                    <div class="mb-4">
                                                        <p class="text-primary mb-1"><i class="i-Professor text-16 mr-1"></i> Joining Date</p><span>{{ $data->joining_date }}</span>
                                                    </div>
                                                </div>
                                            </div>
                                            <hr>

                                        </div>

                                </div>
                            </div>
                        </div>


                    @endif

                </div>

                <!-- end of main-content -->
            </div><!-- Footer Start -->
            <div class="flex-grow-1"></div>
            <div class="app-footer">

                @include('include.footer')
            </div>
            <!-- fotter end -->
        </div>
        @endsection
