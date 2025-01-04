@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => 'Dashboard'])

<div class="container-fluid pb-4 px-4 mt-1">
    <div id="alert">
        @include('components.alert')
    </div>
    <div class="card min-vh-70">
        <div class="card-body justify-content-center">
            <h5 class="card-title"></h5>
            <div class="row">
                <!-- Card 1 -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Lampu 1</h6>
                            <div class="btn-switch pt-5 ">
                                <form method="POST" action="/Relay1">
                                    @csrf
                                    <input type="hidden" name="status" value="1" id="relay-status1">
                                    <label class="switch">
                                        <input type="checkbox" id="relay-toggle1" onchange="toggleRelay1()">
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 2 -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Lampu 2</h6>
                            <div class="btn-switch pt-5 ">
                                <form method="POST" action="/Relay2">
                                    @csrf
                                    <input type="hidden" name="status" value="1" id="relay-status2">
                                    <label class="switch">
                                        <input type="checkbox" id="relay-toggle2" onchange="toggleRelay2()">
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 3 -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Lampu 3</h6>
                            <div class="btn-switch pt-5 ">
                                <form method="POST" action="/Relay3">
                                    @csrf
                                    <input type="hidden" name="status" value="1" id="relay-status3">
                                    <label class="switch">
                                        <input type="checkbox" id="relay-toggle3" onchange="toggleRelay3()">
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Card 4 -->
                <div class="col-md-3 col-sm-6 mb-3">
                    <div class="card">
                        <div class="card-body">
                            <h6 class="card-title">Lampu 4</h6>
                            <div class="btn-switch pt-5 ">
                                <form method="POST" action="/Relay4">
                                    @csrf
                                    <input type="hidden" name="status" value="1" id="relay-status4">
                                    <label class="switch">
                                        <input type="checkbox" id="relay-toggle4" onchange="toggleRelay4()">
                                        <span class="slider round"></span>
                                    </label>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection

<style>
    .card-body {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    @media (max-width: 576px) {
        .col-sm-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
    }
</style>