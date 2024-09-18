@extends('layouts.dashboard')

<link rel="stylesheet" href="{{ asset('assets/css/bootstrap.min.css') }}" />
<link rel="stylesheet" href="{{ asset('assets/css/lineicons.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/css/materialdesignicons.min.css') }}" rel="stylesheet" type="text/css" />
<link rel="stylesheet" href="{{ asset('assets/css/fullcalendar.css') }}" />

<link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
@section('content')
    <section class="section">
        <div class="container-fluid">

            <div class="row">
                <div class="col-12">
                    <div class="title mt-30 mb-30">
                        <h2>{{ $worker->name }}</h2>
                    </div>
                </div>
                <!-- end col -->
                <div class="col-xl-6 col-lg-6">
                    <div class="card-style-1 mb-250">

                        <div class="card-content">
                            <div class="col-xl-12"></div>
                            <h4><a href="#0">{{ $worker->phone }}</a></h4>
                            <p>
                                {{ $worker->email }}
                            </p>
                            {{-- <p>
                                {{$worker->phone }}
                            </p> --}}
                            {{-- <br> --}}
                            {{-- <a href="#0" class="main-btn primary-btn btn-hover">Read More</a> --}}
                        </div>
                    </div>
                    <!-- end card -->
                </div>

                <div class="col-xl-6 col-lg-6">
                    <div class="card-style-5 mb-25">
                        <div class="card-content">
                            <p> Active Tasks <span> {{ $worker->tasks->whereIn('status', [1, 2])->count() }} </span> </p>
                            <p> Due Today <span> {{ $worker->tasks->where('due_date', now())->count() }} </span> </p>
                        </div>
                    </div>
                    <!-- end card -->
                </div>
            </div>


            <div class="form-elements-wrapper">
                <div class="row">

                    {{-- Worker Latest Operations --}}
                    <div class="col-lg-6">
                        <div class="card-style mb-30">
                            <h6 class="mb-10">{{ __('Worker Operations') }}</h6>
                            <p class="text-sm mb-20">
                                {{ __('All worker operations') }}
                            </p>
                            <div class="table-wrapper table-responsive">
                                <table class="table top-selling-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h6 class="text-sm text-medium">{{ __('Operation') }}</h6>
                                            </th>

                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">{{ __('Date') }}</h6>
                                            </th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($operations as $operation)
                                            <tr>
                                                <td>
                                                    <p class="text-sm">
                                                        <a >{{ $operation->type }}</a>
                                                    </p>
                                                </td>

                                                <td>
                                                    <p class="text-sm">{{ $operation->created_at->format('M d, Y') }}</p>
                                                </td>
                                                <td>
                                                    <div class="action justify-content-end">
                                                        <button class="more-btn ml-10 dropdown-toggle" id="moreAction1"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="lni lni-more-alt"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="moreAction1">
                                                            {{-- <li class="dropdown-item">
                                                                <a href="{{ route('farm_operations.edit', $operation) }}" class="text-gray">Edit</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <form action="{{ route('farm_operations.destroy', $operation) }}" method="POST">
                                                                    @csrf
                                                                    @method('DELETE')
                                                                    <button type="submit" class="text-gray" style="background: none; border: none; cursor: pointer;">Remove</button>
                                                                </form>
                                                            </li> --}}
                                                        </ul>
                                                    </div>
                                                </td>
                                            </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                <!-- end table -->
                            </div>
                            <div class="pagination-wrapper">
                                {{ $operations->links() }}
                            </div>
                        </div>
                        <!-- end card -->
                    </div>

                    {{-- Worker Tasks --}}
                    <div class="col-lg-6">
                        <div class="card-style mb-30">
                            <h6 class="mb-10">{{ __('Worker Tasks') }}</h6>
                            <div class="d-flex justify-content-end align-items-center">
                                <a href="{{ route('tasks.create',['worker'=> $worker]) }}"
                                    class="btn btn-primary me-5">{{ __('Add') }}</a>
                            </div>
                            <p class="text-sm mb-20">
                                {{ __('All worker tasks') }}
                            </p>
                            <div class="table-wrapper table-responsive">
                                <table class="table top-selling-table">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h6 class="text-sm text-medium">{{ __('Task') }}</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">{{ __('Status') }}</h6>
                                            </th>
                                            <th class="min-width">
                                                <h6 class="text-sm text-medium">{{ __('Due') }}</h6>
                                            </th>

                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($worker->tasks as $t)
                                            <tr>
                                                </td>
                                                <td>
                                                    <p class="text-sm"> <a
                                                            href="{{ route('tasks.show', $t) }}">{{ $t->title }}</a>
                                                    </p>
                                                </td>
                                                <td>
                                                    @php
                                                        $statusClasses = [
                                                            1 => 'bg-warning',
                                                            2 => 'bg-info',
                                                            3 => 'bg-success',
                                                            4 => 'bg-danger'
                                                        ];
                                                        $statusLabels = [
                                                            1 => 'Idle',
                                                            2 => 'Processing',
                                                            3 => 'Complete',
                                                            4 => 'Revise'
                                                        ];
                                                    @endphp
                                                    <span class="badge {{ $statusClasses[$t->status] }}">
                                                        {{ $statusLabels[$t->status] }}
                                                    </span>
                                                </td>
                                                <td>
                                                    <p class="text-sm">{{ $t->due_date }}</p>
                                                </td>
                                                <td>
                                                    <div class="action justify-content-end">
                                                        <button class="more-btn ml-10 dropdown-toggle" id="moreAction1"
                                                            data-bs-toggle="dropdown" aria-expanded="false">
                                                            <i class="lni lni-more-alt"></i>
                                                        </button>
                                                        <ul class="dropdown-menu dropdown-menu-end"
                                                            aria-labelledby="moreAction1">
                                                            <li class="dropdown-item">
                                                                <a href="#0" class="text-gray">Remove</a>
                                                            </li>
                                                            <li class="dropdown-item">
                                                                <a href="#0" class="text-gray">Edit</a>
                                                            </li>
                                                        </ul>
                                                    </div>
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

                </div>
                <!-- end row -->
            </div>



            <div class="tables-wrapper">
                <div class="row">

                    <div class="col-lg-6">
                        <!-- input style start -->
                        <div class="card-style mb-30">
                            <h6 class="mb-25">{{ __('Add Task to Worker') }}</h6>

                            <!-- end input -->
                            <form style="" action="{{ route('tasks.create') }}" method="POST">
                                @csrf
                                {{-- @method('PUT') --}}
                                <div class="input-style-2">
                                    <input type="text" placeholder="{{ __('Title') }}" required name="title" />
                                    <span class="icon"> <i class="lni lni-user"></i> </span>
                                </div>
                                <!-- end input -->
                                <div class="input-style-3">
                                    <input type="text" placeholder="{{ __('Description') }}" required
                                        name="description" type="text" />
                                    @error('description')
                                        <div class=" text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- end input -->

                                <div class="input-style-2">
                                    <input type="date" name="due" value="<?php echo date('Y-m-d') . 'T' . date('H:i'); ?>" />
                                    <span class="icon"><i class="lni lni-chevron-down"></i></span>
                                    @error('due')
                                        <div class=" text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                {{-- <div class="input-style-1">
                                    <input type="text"   name="due" type="date" />
                                        @error('due')
                                        <div class=" text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div> --}}
                                <div class=" d-flex justify-content-center align-items-center mt-5">

                                    <button type="submit" class="btn btn-primary">{{ __('Submit') }}</button>
                                </div>
                            </form>
                        </div>
                        <!-- end card -->
                        <!-- ======= input style end ======= -->

                        <!-- ======= input switch style end ======= -->
                    </div>

                    {{-- Worker Update Data --}}
                    <div class="col-lg-6">
                        <!-- input style start -->
                        <div class="card-style mb-30">
                            <h6 class="mb-25">{{ __('Update Worker') }}</h6>

                            <!-- end input -->
                            <form style="" action="{{ route('workers.update', ['worker' => $worker]) }}"
                                method="POST">
                                @csrf
                                @method('PUT')
                                <div class="input-style-2">
                                    <input type="text" placeholder="{{ __('Name') }}" required
                                        value="{{ $worker->name }}" name="name" />
                                    <span class="icon"> <i class="lni lni-user"></i> </span>
                                </div>
                                <!-- end input -->
                                <div class="input-style-3">
                                    <input type="text" placeholder="{{ __('Email') }}" required
                                        value="{{ $worker->email }}" name="email" type="email" />
                                    @error('email')
                                        <div class=" text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <!-- end input -->

                                <div class="input-style-3">
                                    <input type="text" placeholder="{{ __('Phone') }}" required
                                        value="{{ $worker->phone }}" name="phone" type="phone" />
                                    @error('phone')
                                        <div class=" text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>


                                <div class="input-style-3">
                                    <input type="text" placeholder="{{ __('Password') }}" name="password"
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


                <!-- end row -->
            </div>
    </section>
@endsection
