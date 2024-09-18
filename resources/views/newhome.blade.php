@extends('layouts.dashboard')



<link rel="stylesheet" href="https://unpkg.com/leaflet@1.7.1/dist/leaflet.css" />

@vite(['resources/js/app.js'])

@section('content')
    <section class="section">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>{{ __('Dashboard') }}</h2>
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
                                    <li class="breadcrumb-item active" aria-current="page">
                                        {{ __('Home') }}
                                    </li>
                                </ol>
                            </nav>
                        </div>
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->
            </div>
            <!-- ========== title-wrapper end ========== -->
            <div class="row">
                {{-- Info Section --}}
                <div class=" col-12 col-lg-4">
                    <div>
                        <div class="card-style mb-30">
                            <div class="col-xl-12 col-lg-12 col-sm-6">
                                <div class="icon-card mb-30">
                                    <div class="icon purple">
                                        <i class="lni lni-layout"></i>
                                    </div>
                                    <div class="content">
                                        <h6 class="mb-10">{{ __('My Farms') }}</h6>
                                        <h3 class="text-bold mb-10">{{ count($farms) }}</h3>

                                    </div>
                                </div>
                                <!-- End Icon Cart -->
                            </div>
                            <!-- End Col -->
                            <div class="col-xl-12 col-lg-12 col-sm-6">
                                <div class="icon-card mb-30">
                                    <div class="icon success">
                                        <i class="lni lni-layers"></i>
                                    </div>
                                    <div class="content">
                                        <h6 class="mb-10">{{ __('Current Tasks') }}</h6>
                                        <h3 class="text-bold mb-10">{{ $tasks }}</h3>
                                    </div>
                                </div>
                                <!-- End Icon Cart -->
                            </div>
                            <!-- End Col -->
                        </div>
                    </div>
                </div>
                {{-- End of Info Section --}}


                {{-- Big Map --}}

                <div class="col-12 col-lg-8" id="app">
                    <div class="card-style mb-30">
                        <h6 class="mb-10">Farm Map</h6>
                        <dashboard-farm-map :farms="{{ json_encode($farms) }}"> </dashboard-farm-map>
                    </div>
                </div>
                {{-- Big Map End --}}

            </div>

            {{--  --}}
            <!-- End Col -->
            <div class="row">

                <!-- End Col -->

                {{--  Farm Table --}}
                <div class="col-lg-7">
                    <div class="card-style mb-30">
                        <div class="title d-flex flex-wrap justify-content-between align-items-center">
                            <div class="left">
                                <h6 class="text-medium mb-30">{{ __('Farms') }}</h6>
                            </div>

                        </div>
                        <!-- End Title -->
                        <div class="table-responsive">
                            <table class="table top-selling-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6 class="text-sm text-medium">{{ __('Name') }}</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">{{ __('Crops') }}</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">{{ __('Location') }}</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">{{ __('Size') }}</h6>
                                        </th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($farms as $farm)
                                        <tr>
                                            </td>
                                            <td>
                                                <p class="text-sm"> <a href="{{ route('farms.show', ['farm' => $farm]) }}">
                                                        {{ $farm->name }} </a></p>
                                            </td>
                                            <td>
                                                <p class="text-sm">{{ $farm->crop_type }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm">{{ $farm->location }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm">{{ $farm->size }}</p>
                                            </td>

                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>
                {{-- End Farm Table --}}
                <!--                                                                -->

                {{-- Tasks Table --}}

                <div class="col-lg-5">
                    <div class="card-style mb-30">
                        <div class="title d-flex flex-wrap justify-content-between align-items-center">
                            <div class="left">
                                <h6 class="text-medium mb-30">{{ __('Workers') }}</h6>
                            </div>

                        </div>
                        <!-- End Title -->
                        <div class="table-responsive">
                            <table class="table top-selling-table">
                                <thead>
                                    <tr>
                                        <th>
                                            <h6 class="text-sm text-medium">{{ __('Name') }}</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">{{ __('Email') }}</h6>
                                        </th>
                                        <th class="min-width">
                                            <h6 class="text-sm text-medium">{{ __('Phone') }}</h6>
                                        </th>

                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($workers as $worker)
                                        <tr>
                                            </td>
                                            <td>
                                                <p class="text-sm"> <a
                                                        href="{{ route('workers.show', $worker->id) }}">{{ $worker->name }}</a>
                                                </p>
                                            </td>
                                            <td>
                                                <p class="text-sm">{{ $worker->email }}</p>
                                            </td>
                                            <td>
                                                <p class="text-sm">{{ $worker->phone }}</p>
                                            </td>
                                            <td>

                                            </td>
                                        </tr>
                                    @endforeach

                                </tbody>
                            </table>
                            <!-- End Table -->
                        </div>
                    </div>
                </div>
                {{-- End Tasks Table --}}

            </div>

            <!-- End Row -->
        </div>
        <!-- end container -->
    </section>
@endsection
