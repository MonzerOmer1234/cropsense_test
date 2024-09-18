@extends('layouts.dashboard');


@section('content')
    <section class="section">
        <div class="container-fluid">
            <form class="card card-body" action="{{ route('tasks.store') }}" method="POST">
                @csrf
                <div class="form-group mb-3">
                    <label>Title</label>
                    <input required type="text" name="title" class="form-control" aria-describedby="emailHelp"
                        placeholder="Enter A Title">


                    @error('title')
                        <div class=" text-danger">
                            {{ $message }}
                        </div>
                    @enderror




                </div>
                <div class="form-group  mb-3">
                    <label>Description</label>
                    <textarea name="description" placeholder="Write Your Description" class=" d-block my-4 w-100 p-4"
                        style="height: 200px;padding : 1rem !important" id=""></textarea>
                    @error('description')
                        <div class=" text-danger">
                            {{ $message }}
                        </div>
                    @enderror

                </div>
                <div class="form-group  mb-3">
                    <label>{{ __('Worker') }}</label>
                    <select class="form-select" required name="worker_id" aria-label="Default select example">
                        <option selected value>{{ __('Select Worker') }}</option>
                        @foreach ($workers as $worker)
                            <option value="{{ $worker->id }}">{{ $worker->name }}</option>
                        @endforeach
                    </select>
                    @error('status')
                        <div class=" text-danger">
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <div class="form-group  mb-3">
                    <label>Due Date</label>
                    <input required type= "date" name="due_date" class="form-control">
                    @error('due_date')
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
    </section>
@endsection
