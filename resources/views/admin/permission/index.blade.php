@extends('admin.layouts.master')

@section('content')
<svg xmlns="http://www.w3.org/2000/svg" style="display: none;">
    <symbol id="check-circle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M16 8A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-3.97-3.03a.75.75 0 0 0-1.08.022L7.477 9.417 5.384 7.323a.75.75 0 0 0-1.06 1.06L6.97 11.03a.75.75 0 0 0 1.079-.02l3.992-4.99a.75.75 0 0 0-.01-1.05z" />
    </symbol>
    <symbol id="info-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8 16A8 8 0 1 0 8 0a8 8 0 0 0 0 16zm.93-9.412-1 4.705c-.07.34.029.533.304.533.194 0 .487-.07.686-.246l-.088.416c-.287.346-.92.598-1.465.598-.703 0-1.002-.422-.808-1.319l.738-3.468c.064-.293.006-.399-.287-.47l-.451-.081.082-.381 2.29-.287zM8 5.5a1 1 0 1 1 0-2 1 1 0 0 1 0 2z" />
    </symbol>
    <symbol id="exclamation-triangle-fill" fill="currentColor" viewBox="0 0 16 16">
        <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z" />
    </symbol>
</svg>
<div class="container mt-5">
    <div class="row ">
        <div class="col-md-12">

            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item active" aria-current="page">All Permissions</li>
                </ol>
            </nav>
            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">

                <div>
                    <svg class="bi flex-shrink-0 me-2" width="24" height="24" role="img" aria-label="Success:">
                        <use xlink:href="#check-circle-fill" />
                    </svg>
                    {{Session::get('message')}}
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                @endif
            </div>
            <table id="datatablesSimple">
                <thead>

                    <tr>
                        <th>SN</th>
                        <th>Name</th>
                        <th>Edit</th>
                        <th>Revoke all permissions</th>
                    </tr>

                </thead>

                <tbody>

                    @if(count($permissions)>0)
                    @foreach($permissions as $key => $permission)
                    <tr>

                        <td class="col-md-1">{{$key+1}}</td>
                        <td class="col-md-7">{{$permission->role->name}}</td>
                        <td class="col-md-1"> @if (isset(auth()->user()->role->permission['name']['permission']['can-edit']))
                            <a href="{{route('permissions.edit', [$permission->id])}}"> <i class="fas fa-edit"></i></a>
                            @endif
                        </td>
                        <td>@if (isset(auth()->user()->role->permission['name']['role']['can-delete']))
                            <a href="#" data-bs-toggle="modal" data-bs-target="#delete{{$permission->id}}"> <i class="fa-solid fa-rotate"></i> </a>
                            @endif
                            <div class="modal fade" id="delete{{$permission->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('permissions.destroy', [$permission->id])}}" method="post">
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
                                                Do you really want to delete the {{$permission->role->name}} permission?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                    </tr>
                    @endforeach
                    @else
                    <td>No department to display</td>
                    @endif



                </tbody>

            </table>
            <!-- </div> -->
        </div>
    </div>
    @endsection