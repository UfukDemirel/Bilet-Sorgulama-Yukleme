@extends('Frontend.home')
@section('content')
    <div class="main-panel">
        <div class="content-wrapper">
            <div class="row">
                <div class="col-md-12 grid-margin">
                    <div class="row">
                        <div class="col-12 col-xl-8 mb-4 mb-xl-0">
                            <h3 class="font-weight-bold">Welcome {{Auth::user()->name}} {{Auth::user()->surname}}</h3>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="col-md-6 grid-margin stretch-card">
                    <div class="card tale-bg">
                        <div class="card-people mt-auto">
                            <img src="/resources/images/dashboard/people.svg" alt="people">
                            <div class="weather-info">
                                <div class="d-flex">
                                    <div class="ml-2">
                                        <div class="container">
                                            <span id="hours">00</span>
                                            <span>:</span>
                                            <span id="minutes">00</span>
                                            <span>:</span>
                                            <span id="seconds">00</span>
                                            <span id="session">AM</span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-1"></div>
                <div class="col-md-4 grid-margin stretch-card">
                    <div class="card">
                        <div class="card-body">
                            <h4 class="card-title">Settings</h4>
                            <div class="template-demo">
                                <a href="{{route('balance')}}">
                                <button type="button" class="btn btn-outline-info btn-lg btn-block">
                                    <i class="ti-ticket"></i>
                                    Balance Loading
                                </button>
                                </a>
                                <br>
                                <a href="{{route('ınquiry')}}">
                                <button type="button" class="btn btn-outline-dark btn-lg btn-block">
                                    <i class="ti-ticket"></i>
                                    Balance Inquiry
                                </button>
                                </a>
                                <br>
                                <a href="{{route('useredit')}}">
                                <button type="button" class="btn btn-outline-primary btn-lg btn-block">
                                    <i class="ti-user"></i>
                                    Profile Edit
                                </button>
                                </a>
                                <br>
                                <a href="{{route('dropzone')}}">
                                <button type="button" class="btn btn-outline-warning btn-lg btn-block">
                                    <i class="ti-image"></i>
                                    Profile File
                                </button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
