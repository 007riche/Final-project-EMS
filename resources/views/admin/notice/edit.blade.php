@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{Session::get('message')}}
            </div>
            @endif

            <form action="{{route('notices.update', [$notice->id])}}" method="post">@csrf
                {{method_field('PATCH')}}
                <div class="card">
                    <div class="card-header">Edit the notice</div>
                    <!-- {{ __('Dashboard') }} -->

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">By:</label>
                            <input type="text" name="name" value="{{$notice->name}}" class="form-control  @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Title:</label>
                            <input type="text" name="title" value="{{$notice->title}}" id="" class="form-control  @error('title') is-invalid @enderror" required="">
                            @error('title')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Date:</label>
                            <input type="" name="date" value="{{$notice->date}}" id="datepicker" class="form-control @error('from') is-invalid @enderror">
                            @error('date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Content</label>
                            <textarea name="description" id="" class="form-control @error('description') is-invalid @enderror" cols="25" rows="7" required="">
                            {{$notice->description}}
                            </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            <button type="submit" class="btn bg-dark bg-gradient text-light">Edit notice</button>
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection