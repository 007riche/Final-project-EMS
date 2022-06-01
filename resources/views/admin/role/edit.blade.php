@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-10">

            @if(Session::has('message'))
            <div class="alert alert-success">
                {{Session::get('message')}}
            </div>
            @endif

            <form action="{{route('roles.update', [$role->id])}}" method="post">@csrf

                @method('PATCH')
                <div class="card">
                    <div class="card-header"> Update Role</div>

                    <div class="card-body">
                        <div class="form-group">
                            <label for="">Name</label>
                            <input type="text" name="name" value="{{$role->name}}" id="" class="form-control  @error('name') is-invalid @enderror">
                            @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label for="">Description</label>
                            <textarea name="description" id="" class="form-control @error('description') is-invalid @enderror" cols="30" rows="7">
                            {{$role->description}}
                            </textarea>
                            @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group mt-2">
                            @if (isset(auth()->user()->role->permission['name']['role']['can-edit']))
                            <button type="submit" class="btn btn-primary">Update</button>
                            @endif
                        </div>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection