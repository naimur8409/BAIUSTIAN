@extends('layouts.master')
@section('title','STUDENT')
        @section('main-content')
        <div class="main-content-wrap sidenav-open d-flex flex-column">
            <!-- ============ Body content start ============= -->
            <div class="main-content">
                <div class="breadcrumb">
                    <h1>{{ $data->name }}</h1>
                    <ul>
                        <li><a href="{{route('home')}}">Dashboard</a></li>
                        <li>Home</li>
                    </ul>
                </div>

                <div class="card card-profile-1 mb-4">
                    <div class="card-body text-center">
                        <div class="avatar box-shadow-2 mb-3">
                            <img src="{{ asset('images/students/') }}/{{ $data->photo }}" id="myImg" alt="{{ $data->name }}">
                        </div>

                        {{-- ============================== --}}
                        <div id="photoModal" class="photoModal">
                            <span class="close">&times;</span>
                            <img class="modal-content" id="img01">
                            <div id="caption"></div>
                          </div>
                          {{-- ============================= --}}
                        <h5 class="m-0">{{ $data->name }}</h5>
                        <p class="mt-0">{{ $data->s_id}}</p>
                        <p class="mt-0">Email - {{ $data->email  }}</p>
                        <p class="mt-0">Address - {{ $data->address  }}</p>
                        <p class="mt-0">Phone - {{ $data->phone  }}</p>
                        <p class="mt-0">Blood Group - {{ $data->blood_group  }}</p>
                        <p class="mt-0">Batch - {{ $data->semester->semester }}</p>

                    </div>
                </div>



            </div>

            <div class="app-footer">

                @include('include.footer')
            </div>
            <!-- fotter end -->
        </div>
        @endsection
