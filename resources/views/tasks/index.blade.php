@extends('layouts.dashboard');


@section('content')
<section class="table-components">
    <div class="container-fluid">
      <!-- ========== title-wrapper start ========== -->
      <div class="title-wrapper pt-30">
        <div class="row align-items-center">
          <div class="col-md-6">
            <div class="title">
              <h2>{{__("Tasks")}}</h2>
            </div>
          </div>
          <!-- end col -->
          <div class="col-md-6">
            <div class="breadcrumb-wrapper">
              <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                  <li class="breadcrumb-item">
                    <a href="#0">{{__("Dashboard")}}</a>
                  </li>
                  <li class="breadcrumb-item active" aria-current="page">
                    {{__("Tasks")}}
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
              <h6 class="mb-10">{{__("Tasks")}}</h6>
              <div class="d-flex justify-content-end align-items-center">
                <a href="{{ route('tasks.create') }}" class="btn btn-primary me-5">{{__("Add")}}</a>
            </div>
              <p class="text-sm mb-20">
               {{__("All tasks listed here")}}
              </p>
              <div class="table-wrapper table-responsive">
                <table class="table top-selling-table">
                    <thead>
                        <tr>
                            <th>
                                <h6 class="text-sm text-medium">{{ __('Title') }}</h6>
                            </th>
                            <th class="min-width">
                                <h6 class="text-sm text-medium">{{ __('Description') }}</h6>
                            </th>
                            <th class="min-width">
                                <h6 class="text-sm text-medium">{{ __('Status') }}</h6>
                            </th>
                            <th class="min-width">
                                <h6 class="text-sm text-medium">{{ __('Due_Date') }}</h6>
                            </th>

                            <th></th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($tasks as $task)
                        <tr>
                    </td>
                    <td>
                        <p class="text-sm"> <a href="{{ route('tasks.show', $task->id) }}">{{ $task->title }}</a></p>
                    </td>
                    <td>
                        <p class="text-sm">{{ $task->description }}</p>
                    </td>
                    <td>
                        <p class="text-sm">{{ $task->status}}</p>
                    </td>
                    <td>
                        <p class="text-sm">{{ $task->due_date }}</p>
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
