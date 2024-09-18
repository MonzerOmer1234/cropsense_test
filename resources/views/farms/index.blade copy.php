@extends('layouts.dashboard');


@section('content')
    <section class="table-components">
        <div class="container-fluid">
            <!-- ========== title-wrapper start ========== -->
            <div class="title-wrapper pt-30">
                <div class="row align-items-center">
                    <div class="col-md-6">
                        <div class="title">
                            <h2>{{ __('Farms') }}</h2>
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
                                        {{ __('Farms') }}
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

            <!-- ========== tables-wrapper start ========== -->
            <div class="tables-wrapper">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="card-style mb-30">
                            <h6 class="mb-10">{{ __('Farms') }}</h6>
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{ route('farms.create') }}" class="btn btn-primary me-5">{{ __('Add') }}</a>
                            </div>
                            <p class="text-sm mb-20">
                                {{ __('All farms listed here') }}
                            </p>
                            <div class="table-wrapper table-responsive">
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
                                                    <p class="text-sm"> <a
                                                            href="{{ route('farms.show', ['farm' => $farm]) }}">
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
                                <!-- end table -->
                            </div>
                        </div>
                        <!-- end card -->
                    </div>
                    <!-- end col -->
                </div>
                <!-- end row -->


                <!-- end row -->
            </div>
            <!-- ========== tables-wrapper end ========== -->
        </div>
        <!-- end container -->
    </section>
@endsection
