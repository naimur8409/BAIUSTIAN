@extends('layouts.master')
@section('title','Notice')
        @section('main-content')
            <div class="main-content-wrap sidenav-open d-flex flex-column">
                <!-- ============ Body content start ============= -->
                <div class="main-content">
                    <div class="breadcrumb">
                        <h1>Notices</h1>
                        <ul>
                            <li><a href="{{route('home')}}">Dashboard</a></li>
                            <li>Notice List</li>
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
                            {{--  ====================Create new result========================  --}}

                            <br>
                            {{--  ====================Semester List========================  --}}
                            <div class="row">
                                <div class="col-md-6 mb-4">
                                    <div class="card text-left">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h3 class="card-title">General Notices</h3>
                                            </div>
                                            <div class="accordion" id="accordionExample">
                                                @foreach ($general_notices as $i=> $item)


                                                <div class="card ul-card__border-radius">
                                                    <div class="card-header">
                                                        <a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-group{{$item->id}}" aria-expanded="false">
                                                            <h6 class="card-title mb-0">#{{ $i+1 }} {{$item->title}}</h6></a>
                                                    </div>
                                                    <div class="collapse" id="accordion-item-group{{$item->id}}" data-parent="#accordionExample" style="">
                                                        <div class="card-body">
                                                            {{$item->text}}
                                                            <br>
                                                            @if($item->photo)
                                                            <a href="{{ asset('images/results/') }}/{{ $item->photo }}" class="btn btn-info ripple m-1" type="button" download>{{ $item->photo }}</a>
                                                            @endif
                                                            @if($item->documents)
                                                            <a href="{{ asset('images/results/') }}/{{ $item->documents }}" class="btn btn-info ripple m-1" type="button" download>{{ $item->documents }}</a>
                                                            @endif
                                                        </div>
                                                    </div>
                                                </div>
                                                @endforeach


                                            </div>
                                        </div>

                                    </div>
                                </div>

                                <div class="col-md-6 mb-4">
                                    <div class="card text-left">
                                        <div class="card-body">
                                            <div class="card-title">
                                                <h3 class="card-title">Batch Notices</h3>
                                            </div>
                                            <div class="accordion" id="accordionExample">
                                                @foreach ($batch_notices as $i=> $item)


                                                <div class="card ul-card__border-radius">
                                                    <div class="card-header">
                                                        <a class="text-default collapsed" data-toggle="collapse" href="#accordion-item-group{{$item->id}}" aria-expanded="false">
                                                            <h6 class="card-title mb-0">#{{ $i+1 }} {{$item->title}}</h6></a>
                                                    </div>
                                                    <div class="collapse" id="accordion-item-group{{$item->id}}" data-parent="#accordionExample" style="">
                                                        <div class="card-body">
                                                            {{$item->text}}
                                                            <br>
                                                            @if($item->photo)
                                                            <a href="{{ asset('images/results/') }}/{{ $item->photo }}" class="btn btn-info ripple m-1" type="button" download>{{ $item->photo }}</a>
                                                            @endif
                                                            @if($item->documents)
                                                            <a href="{{ asset('images/results/') }}/{{ $item->documents }}" class="btn btn-info ripple m-1" type="button" download>{{ $item->documents }}</a>
                                                            @endif
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

                </div>


                <div class="app-footer">

                    @include('include.footer')
                </div>
                <!-- fotter end -->
            </div>
        @endsection
