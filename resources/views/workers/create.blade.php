@extends('layouts.dashboard');


@section('content')
    <section class="tab-components">
        <div class="container-fluid">

            <div class="form-elements-wrapper">
                <div class="row">
                    <div class="col-lg-8">
                        <!-- input style start -->
                        <div class="card-style mb-30">
                            <h6 class="mb-25">{{ __('Create Worker') }}</h6>

                            <!-- end input -->
                            <form style="" action="{{ route('workers.store') }}" method="POST">
                                @csrf
                                <div class="input-style-2" >
                                    <input type="text" placeholder="{{ __('Name') }}" required name="name" style="padding: 16px 43px !important" />
                                    <span class="icon"> <i class="lni lni-user"></i> </span>
                                </div>
                                <!-- end input -->
                                <div class="input-style-3">
                                    <input type="text" placeholder="{{ __('Email') }}" required name="email" type="email" />
                                    @error('email')
                                    <div class=" text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>
                                <!-- end input -->

                                <div class="input-style-3">
                                    <input type="text" placeholder="{{ __('Phone') }}" required name="phone" type="phone" />
                                    @error('phone')
                                    <div class=" text-danger">
                                        {{ $message }}
                                    </div>
                                @enderror
                                </div>


                                <div class="input-style-3">
                                    <input type="password" placeholder="{{ __('Password') }}" required name="password"
                                        type="password" />
                                        @error('password')
                                        <div class=" text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class=" d-flex justify-content-center align-items-center mt-5">

                                    <button type="submit" class="btn btn-primary">Submit</button>
                                </div>
                            </form>

                        </div>
                        <!-- end card -->
                        <!-- ======= input style end ======= -->

                        <!-- ======= input switch style end ======= -->
                    </div>

                </div>
                <!-- end row -->
            </div>

        </div>
    </section>

@endsection
