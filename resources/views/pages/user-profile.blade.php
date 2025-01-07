@extends('layouts.app', ['class' => 'g-sidenav-show bg-gray-100'])

@section('content')
@include('layouts.navbars.auth.topnav', ['title' => "Profile"])

<div class="card shadow-lg mx-4 mt-4">
    <div class="card-body p-3">
        <div class="row gx-4">
            <div class="avatar position-relative" style="width: 100px; height: 100px;">
                <div class="overflow-hidden border-radius-lg shadow-sm position-relative">
                    <img src="{{ auth()->user()->avatar_url }}" alt="profile_image" class="object-fit-cover" style="width: 100%; height: 100%;">
                </div>
            </div>
            <div class="col-auto my-auto">
                <div class="h-100">
                    <h5 class="mb-1">
                        {{ auth()->user()->name ?? 'name' }}
                    </h5>
                </div>
            </div>
            <div class="col-lg-4 col-md-6 my-sm-auto ms-sm-auto me-sm-0 mx-auto mt-3" hidden=true>
                <div class="nav-wrapper position-relative end-0">
                    <ul class="nav nav-pills nav-fill p-1" role="tablist">
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 active d-flex align-items-center justify-content-center "
                                data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="true">
                                <i class="ni ni-app"></i>
                                <span class="ms-2">App</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-email-83"></i>
                                <span class="ms-2">Messages</span>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link mb-0 px-0 py-1 d-flex align-items-center justify-content-center "
                                data-bs-toggle="tab" href="javascript:;" role="tab" aria-selected="false">
                                <i class="ni ni-settings-gear-65"></i>
                                <span class="ms-2">Settings</span>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<div id="alert">
    @include('components.alert')
</div>
<div class="container-fluid py-4">
    <div class="card">
        <div class="card-header pb-0">
            <div class="d-flex align-items-center">
                <p class="mb-0">User Information</p>
                <button class="btn btn-success btn-sm ms-auto" data-bs-toggle="modal" data-bs-target="#editProfileModal">Edit</button>
            </div>
        </div>
        <div class="card-body">
            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Name</label>
                        <input class="form-control" type="text" value="{{ auth()->user()->name }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Username</label>
                        <input class="form-control" type="text" value="{{ auth()->user()->username }}" disabled>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label class="form-control-label">Email address</label>
                        <input class="form-control" type="email" value="{{ auth()->user()->email }}" disabled>
                    </div>
                </div>
            </div>
            <hr class="horizontal dark">
            <p class="text-uppercase text-sm">About me</p>
            <div class="row">
                <div class="col-md-12">
                    <div class="form-group">
                        <input class="form-control" type="text" value="{{ auth()->user()->about }}" disabled>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="modal fade" id="editProfileModal" tabindex="-1" aria-labelledby="editProfileModalLabel" aria-hidden="true" data-bs-backdrop="static">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content">
                <form role="form" method="POST" action="{{ route('profile.update') }}" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="editProfileModalLabel">Edit Profile</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <div class="form-group">
                            <label class="form-control-label">Name</label>
                            <input class="form-control" type="text" name="name" value="{{ old('name', auth()->user()->name) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Username</label>
                            <input class="form-control" type="text" name="username" value="{{ old('username', auth()->user()->username) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Email address</label>
                            <input class="form-control" type="email" name="email" value="{{ old('email', auth()->user()->email) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">About me</label>
                            <input class="form-control" type="text" name="about" value="{{ old('about', auth()->user()->about) }}">
                        </div>
                        <div class="form-group">
                            <label class="form-control-label">Profile Picture</label>
                            <input class="form-control" type="file" name="avatar" accept="image/*">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-success">Save</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
@endsection