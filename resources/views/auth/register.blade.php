@extends('layouts.app')

@section('content')
<div class="container position-sticky z-index-sticky top-0">
    <div class="row">
        <div class="col-12">
            @include('layouts.navbars.guest.navbar')
        </div>
    </div>
</div>
<main class="main-content  mt-0">
    <section>
        <div class="page-header min-vh-100 d-flex align-items-center">
            <div class="container">
                <div class="row justify-content-center">
                    <div class="col-xl-4 col-lg-5 col-md-7 d-flex flex-column mx-lg-0 mx-auto">
                        <div class="card card-plain">
                            <div class="card-header pb-0 text-center">
                                <img src="{{ asset('img/sikolamlogo.png') }}" alt="Logo" class="mb-1" style="max-width: 120px;">
                                <h4 class="font-weight-bolder">SIKOLAM</h4>
                                <p class="mb-0">Sistem Informasi Kontrol Lampu</p>
                            </div>
                            <div class="card-header pb-0 text-start">
                                <h4 class="font-weight-bolder">Sign Up</h4>
                                <p4>Enter your personal informations to sign up</p4>
                            </div>
                            <div class="card-body">
                                <form method="POST" action="{{ route('register.perform') }}">
                                    @csrf
                                    <div class="flex flex-col mb-3">
                                        <input type="text" name="username" class="form-control" placeholder="Username" aria-label="Username" value="{{ old('username') }}">
                                        @error('username') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                    <div class="flex flex-col mb-3">
                                        <input type="text" name="name" class="form-control" placeholder="Name" aria-label="Name" value="{{ old('Name') }}">
                                        @error('name') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                    <div class="flex flex-col mb-3">
                                        <input type="email" name="email" class="form-control" placeholder="Email" aria-label="Email" value="{{ old('email') }}">
                                        @error('email') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                    <div class="flex flex-col mb-3">
                                        <input type="password" name="password" class="form-control" placeholder="Password" aria-label="Password">
                                        @error('password') <p class='text-danger text-xs pt-1'> {{ $message }} </p> @enderror
                                    </div>
                                    <div class="form-check form-check-info text-start">
                                        <input class="form-check-input" type="checkbox" name="terms" id="flexCheckDefault">
                                        <label class="form-check-label" for="flexCheckDefault">
                                            I agree the <a href="javascript:;" class="text-dark font-weight-bolder">Terms and
                                                Conditions</a>
                                        </label>
                                        @error('terms') <p class='text-danger text-xs'> {{ $message }} </p> @enderror
                                    </div>
                                    <div class="text-center">
                                        <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Sign up</button>
                                    </div>
                                    <p class="text-sm mt-3 mb-0">Already have an account? <a href="{{ route('login') }}"
                                            class="text-dark font-weight-bolder">Sign in</a></p>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
</main>
@include('layouts.footers.guest.footer')
@endsection