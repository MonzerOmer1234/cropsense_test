@extends('layouts.dashboard')

@section('content')
    <section class="section">
        <div class="container-fluid">
            <div class="row">
                <div class="col-xl-8 col-lg-8">
                    <div class="card-style mb-30">
                        <div class="title d-flex flex-wrap justify-content-between align-items-center">
                            <div class="left">
                                <h6 class="text-medium mb-30">{{ __('Task Details') }}</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            <form action="{{ route('tasks.store') }}" method="POST">
                                @csrf
                                <div class="form-group mb-25">
                                    <label for="title">{{ __('Title') }}</label>
                                    <input id="title" required type="text" value="{{ $task->title }}" name="title" class="form-control"
                                        placeholder="{{ __('Enter A Title') }}">
                                    @error('title')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-25">
                                    <label for="description">{{ __('Description') }}</label>
                                    <textarea id="description" name="description" placeholder="{{ __('Write Your Description') }}" class="form-control" style="height: 200px">{{ $task->description }}</textarea>
                                    @error('description')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-25">
                                    <label for="worker_id">{{ __('Worker') }}</label>
                                    <select id="worker_id" class="form-select" required name="worker_id">
                                        <option selected value="{{ $task->worker != null ? $task->worker->id : null }}">
                                            {{ $task->worker != null ? __('Assigned Worker') . ' - ' . $task->worker->name : __('Select Worker') }}
                                        </option>
                                        @foreach ($workers as $worker)
                                            <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                                        @endforeach
                                    </select>
                                    @error('worker_id')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="form-group mb-25">
                                    <label for="due_date">{{ __('Due Date') }}</label>
                                    <input id="due_date" required type="date" value="{{ $task->due_date }}" name="due_date" class="form-control">
                                    @error('due_date')
                                        <div class="text-danger">
                                            {{ $message }}
                                        </div>
                                    @enderror
                                </div>
                                <div class="d-flex justify-content-center mt-4">
                                    <button type="submit" class="main-btn primary-btn btn-hover">{{ __('Submit') }}</button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                <div class="col-xl-4 col-lg-4">
                    <div class="card-style mb-30">
                        <div class="title d-flex flex-wrap justify-content-between align-items-center">
                            <div class="left">
                                <h6 class="text-medium mb-30">{{ __('Revise Requests') }}</h6>
                            </div>
                        </div>
                        <div class="card-body">
                            @foreach($requests as $request)
                                <div class="alert-box {{ $loop->iteration % 2 == 0 ? 'secondary-alert' : 'primary-alert' }}">
                                    <div class="alert">
                                        <p class="text-medium">{{ $request->description }}</p>
                                        <small>{{ $request->created_at->diffForHumans() }}</small>
                                        <form action="#" method="POST" class="mt-2">
                                            @csrf
                                            @method('PATCH')
                                            <button type="submit" class="btn btn-sm btn-outline-primary">{{ __('Mark as Read') }}</button>
                                        </form>
                                    </div>
                                </div>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </div>
</section>
@endsection
