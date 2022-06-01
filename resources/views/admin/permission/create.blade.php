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
            <form action="{{route('permissions.store')}}" method="post">@csrf

                <div class="card">
                    <div class="card-header">Permission</div>

                    <div class="card-body">
                        <select name="role_id" id="" class="form-control @error('role_id') is-invalid @enderror">
                            <option value="">
                                Select Role
                            </option>
                            @foreach(App\Models\Role::all() as $role)
                            <option value="{{$role->id}}"> {{$role->name}}</option>
                            @endforeach
                            @error('role_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </select>
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
                                    <td> <input type="checkbox" name="name[department][can-add]" id=""> </td>
                                    <td> <input type="checkbox" name="name[department][can-edit]" id=""> </td>
                                    <td> <input type="checkbox" name="name[department][can-view]" id=""> </td>
                                    <td> <input type="checkbox" name="name[department][can-delete]" id=""> </td>
                                    <td> <input type="checkbox" name="name[department][can-list]" id=""> </td>
                                </tr>
                                <tr>
                                    <td>Role</td>
                                    <td> <input type="checkbox" name="name[role][can-add]" id=""> </td>
                                    <td> <input type="checkbox" name="name[role][can-edit]" id=""> </td>
                                    <td> <input type="checkbox" name="name[role][can-view]" id=""> </td>
                                    <td> <input type="checkbox" name="name[role][can-delete]" id=""> </td>
                                    <td> <input type="checkbox" name="name[role][can-list]" id=""> </td>
                                </tr>
                                <tr>
                                    <td>Permissions</td>
                                    <td> <input type="checkbox" name="name[permission][can-add]" id=""> </td>
                                    <td> <input type="checkbox" name="name[permission][can-edit]" id=""> </td>
                                    <td> <input type="checkbox" name="name[permission][can-view]" id=""> </td>
                                    <td> <input type="checkbox" name="name[permission][can-delete]" id=""> </td>
                                    <td> <input type="checkbox" name="name[permission][can-list]" id=""> </td>
                                </tr>
                                <tr>
                                    <td>User</td>
                                    <td> <input type="checkbox" name="name[user][can-add]" id=""> </td>
                                    <td> <input type="checkbox" name="name[user][can-edit]" id=""> </td>
                                    <td> <input type="checkbox" name="name[user][can-view]" id=""> </td>
                                    <td> <input type="checkbox" name="name[user][can-delete]" id=""> </td>
                                    <td> <input type="checkbox" name="name[user][can-list]" id=""> </td>
                                </tr>
                                <tr>
                                    <td>Notice</td>
                                    <td> <input type="checkbox" name="name[notice][can-add]" id=""> </td>
                                    <td> <input type="checkbox" name="name[notice][can-edit]" id=""> </td>
                                    <td> <input type="checkbox" name="name[notice][can-view]" id=""> </td>
                                    <td> <input type="checkbox" name="name[notice][can-delete]" id=""> </td>
                                    <td> <input type="checkbox" name="name[notice][can-list]" id=""> </td>
                                </tr>
                                <tr>
                                    <td>Leave</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td> <input type="checkbox" name="name[leave][can-list]" id=""> </td>
                                </tr>
                                <tr>
                                    <td>Mail</td>
                                    <td> <input type="checkbox" name="name[mail][can-add]" id=""> </td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>

                            </tbody>
                        </table>
                        <button type="submit" class="btn btn-primary">Assign</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection