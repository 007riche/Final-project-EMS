@extends('admin.layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{Session::get('message')}}
            </div>
            @endif
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">{{ __('All Notices') }}</li>
                </ol>
            </nav>
            @if(count($notices) > 0 )
            @foreach($notices as $notice)
            <div class="card alert alert-warning">
                <div class="card-header alert alert-warning">{{$notice->title}}
                    <br>
                    <small class="text-muted ">From: {{$notice->name}}</small>
                    <small class="text-muted float-end">{{$notice->date}}</small>
                </div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                    {{ $notice->description}}

                    <!-- {{ __('You are logged in!') }} -->
                </div>
                @if (isset(auth()->user()->role->permission['name']['notice']['can-edit']) || isset(auth()->user()->role->permission['name']['notice']['can-delete']))
                <div class="card-footer">
                    @if (isset(auth()->user()->role->permission['name']['notice']['can-edit']))
                    <a href="{{route('notices.edit', [$notice->id])}}" class=" text-dark"> <i class="fas fa-edit"></i>Edit</a>
                    @endif
                    @if (isset(auth()->user()->role->permission['name']['notice']['can-delete']))
                    <span class="float-end"><a href="#" data-bs-toggle="modal" data-bs-target="#delete{{$notice->id}}" class=" text-danger"> <i class="fas fa-trash "></i>Delete</a></span>
                    @endif
                    <!-- Modal -->
                    <div class="modal fade" id="delete{{$notice->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog" role="document">
                            <form action="{{route('notices.destroy', [$notice->id])}}" method="post">
                                @csrf
                                {{method_field('DELETE')}}

                                <div class="modal-content">
                                    <div class="modal-header bg-danger bg-gradient text-light">
                                        <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Danger:">
                                            <use xlink:href="#exclamation-triangle-fill" />
                                        </svg>
                                        <h5 class="modal-title " id="exampleModalLabel">
                                            Confirm the Deletion:
                                        </h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        Do you really want to delete the {{$notice->name}} notice?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                        <button type="submit" class="btn btn-danger">Delete</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
                @endif
            </div>
            @endforeach
            @else
            <p>You don't have any notice</p>
            @endif
        </div>
    </div>
</div>
@endsection