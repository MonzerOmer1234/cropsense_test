@extends('layouts.dashboard')



@section('content')
    <section class="tab-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>{{ __('Settings') }}</h2>
                        </div>
                    </div>
                    <!-- end col -->
                    <div class="col-md-6">
                        <div class="breadcrumb-wrapper">
                            <nav aria-label="breadcrumb">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item">
                                        <a href="#0">{{ __('Dashboard') }}</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#0">{{ __('Settings') }}</a></li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ============== End ============== -->

            <div class="form-elements-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <!-- input style start -->
                        <div class="card-style mb-30">
                            <div class="">
                                <h2 class="h5 mb-4">{{ __('account info') }}</h2>
                                <form action="{{ route('settings.account_update') }}" method="POST">
                                    @csrf
                                    @if (Session::has('msg'))
                                        <div class="alert alert-success alert-dismissible text-white" role="alert">
                                            <span class="text-sm">{{ __('success') }} , {{ __('updated') }}.</span>
                                            <button type="button" class="btn-close text-lg py-3 opacity-10"
                                                data-bs-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true" style="display: none !important"></span>
                                            </button>
                                        </div>
                                    @endif
                                    <div class="row">
                                        <div class="col-md-6 mb-3">
                                            <div>
                                                <label for="first_name">{{ __('name') }} <small
                                                        style="color:red">*</small> </label>
                                                <div class="input-group input-group-outline ">

                                                    <input class="form-control" id="first_name" name="name"
                                                        type="text" placeholder="" value="{{ Auth::user()->name }}"
                                                        required>
                                                </div>
                                                @error('name')
                                                    <small style="color: red">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div>
                                                <label for="first_name">{{ __('email') }}</label>
                                                <div class="input-group input-group-outline ">
                                                    <input class="form-control" id="first_name" name="email"
                                                        type="text" placeholder="" value="{{ Auth::user()->email }}">
                                                </div>
                                                @error('email')
                                                    <small style="color: red">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-md-6 mb-3">
                                            <div>
                                                <label for="first_name">{{ __('phone') }}</label>
                                                <div class="input-group input-group-outline ">

                                                    <input class="form-control" id="first_name" name="phone"
                                                        type="text" placeholder="" value="{{ Auth::user()->phone }}">
                                                </div>
                                                @error('phone')
                                                    <small style="color: red">
                                                        {{ $message }}
                                                    </small>
                                                @enderror
                                            </div>
                                        </div>
                                    </div>
                                    <div class="mt-3">
                                        <button class="btn btn-info mt-2 animate-up-2"
                                            type="submit">{{ __('update info') }}</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <!-- end card -->


                        <div class="card-style mb-30" >
                            <form action="{{ route('settings.account_update_password') }}" method="POST">
                                @csrf
                                @if (Session::has('pass_msg'))
                                    @if (Session::get('pass_msg') == 'success')
                                        <div class="alert  alert-success alert-dismissible text-white" role="alert">
                                            <span class="text-sm">{{ __('success') }} , {{ __('updated') }}.</span>
                                        @else
                                            <div class="alert  alert-danger alert-dismissible text-white" role="alert">
                                                <span class="text-sm">{{ __('error') }} , {{ __('old_pass_error') }}. </span>
                                    @endif

                                    <button type="button" class="btn-close text-lg py-3 opacity-10" data-bs-dismiss="alert"
                                        aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                        </div>
                                @endif
                        <div class="row">
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="first_name">{{ __('password') }} <small style="color:red">*</small> </label>
                                    <div class="input-group input-group-outline ">

                                        <input class="form-control" id="first_name" name="password" type="password"
                                            placeholder=""required>
                                    </div>
                                    @error('password')
                                        <small style="color: red">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                            <div class="col-md-6 mb-3">
                                <div>
                                    <label for="first_name">{{ __('old_password') }}</label>
                                    <div class="input-group input-group-outline ">

                                        <input class="form-control" id="first_name" name="old_password" type="password" placeholder="">
                                    </div>
                                    @error('old_password')
                                        <small style="color: red">
                                            {{ $message }}
                                        </small>
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="mt-3">
                            <button class="btn btn-info mt-2 animate-up-2" type="submit">{{ __('update_info') }}</button>
                        </div>
                        </form>
                        </div>
                        <!-- ======= input switch style end ======= -->
                    </div>


    </section>
@endsection
