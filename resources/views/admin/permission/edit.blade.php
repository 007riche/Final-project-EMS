@extends('admin.layouts.master')

@section('content')
<div class="container mt-3">
    <div class="row justify-content-center">
        <div class="col-md-8">
            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{Session::get('message')}}
            </div>
            @endif
            <form action="{{route('permissions.update', [$permission->id])}}" method="post">@csrf
                {{method_field('PATCH')}}

                <div class="card">
                    <div class="card-header">Permission</div>

                    <div class="card-body">
                        <h3> {{$permission->role->name}} </h3>
                        <table class="table table-dark table-striped mt-4">
                            <thead>
                                <tr>
                                    <th scope="col">Permission on</th>
                                    <th scope="col">add</th>
                                    <th scope="col">edit</th>
                                    <th scope="col">view</th>
                                    <th scope="col">delete</th>
                                    <th scope="col">list</th>

                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td>Department</td>
                                    <td> <input type="checkbox" name="name[department][can-add]" id="" @if(isset($permission['name']['department']['can-add'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[department][can-edit]" id="" @if(isset($permission['name']['department']['can-edit'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[department][can-view]" id="" @if(isset($permission['name']['department']['can-view'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[department][can-delete]" id="" @if(isset($permission['name']['department']['can-delete'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[department][can-list]" id="" @if(isset($permission['name']['department']['can-list'])) checked @endif> </td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td> <input type="checkbox" name="name[role][can-add]" id="" @if(isset($permission['name']['role']['can-add'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[role][can-edit]" id="" @if(isset($permission['name']['role']['can-edit'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[role][can-view]" id="" @if(isset($permission['name']['role']['can-view'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[role][can-delete]" id="" @if(isset($permission['name']['role']['can-delete'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[role][can-list]" id="" @if(isset($permission['name']['role']['can-list'])) checked @endif> </td>
                                </tr>
                                <tr>
                                    <td>Permissions</td>
                                    <td> <input type="checkbox" name="name[permission][can-add]" id="" @if(isset($permission['name']['permission']['can-add'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[permission][can-edit]" id="" @if(isset($permission['name']['permission']['can-edit'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[permission][can-view]" id="" @if(isset($permission['name']['permission']['can-view'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[permission][can-delete]" id="" @if(isset($permission['name']['permission']['can-delete'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[permission][can-list]" id="" @if(isset($permission['name']['permission']['can-list'])) checked @endif> </td>
                                </tr>
                                <tr>
                                    <td>User</td>
                                    <td> <input type="checkbox" name="name[user][can-add]" id="" @if(isset($permission['name']['user']['can-add'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[user][can-edit]" id="" @if(isset($permission['name']['user']['can-edit'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[user][can-view]" id="" @if(isset($permission['name']['user']['can-view'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[user][can-delete]" id="" @if(isset($permission['name']['user']['can-delete'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[user][can-list]" id="" @if(isset($permission['name']['user']['can-list'])) checked @endif> </td>
                                </tr>
                                <tr>
                                    <td>Notice</td>
                                    <td> <input type="checkbox" name="name[notice][can-add]" id="" @if(isset($permission['name']['notice']['can-add'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[notice][can-edit]" id="" @if(isset($permission['name']['notice']['can-edit'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[notice][can-view]" id="" @if(isset($permission['name']['notice']['can-view'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[notice][can-delete]" id="" @if(isset($permission['name']['notice']['can-delete'])) checked @endif> </td>
                                    <td> <input type="checkbox" name="name[notice][can-list]" id="" @if(isset($permission['name']['notice']['can-list'])) checked @endif> </td>
                                </tr>
                                <tr>
                                    <td>Leave</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="name[leave][can-list]" id="" @if(isset($permission['name']['leave']['can-list'])) checked @endif> </td>
                                </tr>
                                <tr>
                                    <td>Mail</td>
                                    <td> <input type="checkbox" name="name[mail][can-add]" id="" @if(isset($permission['name']['mail']['can-add'])) checked @endif> </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                        @if (isset(auth()->user()->role->permission['name']['permission']['can-edit']))
                        <button type="submit" class="btn btn-primary">Update</button>
                        @endif
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection