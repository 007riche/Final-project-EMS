@extends('admin.layouts.master')

@section('content')
<div class="container mt-5">
    <nav aria-label="breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item active" aria-current="page">Leave Request
            </li>
        </ol>
    </nav>
    @if(Session::has('message'))
    <div class="alert alert-success alert-dismissible">
        {{Session::get('message')}}
    </div>
    @endif

    <form action="{{route('leaves.store')}}" method="post" enctype="multipart/form-data">@csrf

        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Leave Information</div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>From:</label>
                            <input type="text" name="from" id="from" class="form-control @error('from') is-invalid @enderror" required="">
                            @error('from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>To:</label>
                            <input type="text" name="to" id="to" class="form-control  @error('to') is-invalid @enderror" required="">
                            @error('to')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Type of leave</label>

                            <select name="type" id="" class="form-control">
                                <option>Select the type of leave</option>
                                <option value="annual_leave">Annual leave</option>
                                <option value="sick_leave">Sick leave</option>
                                <option value="parental_leave">Parental leave</option>
                                <option value="other_leave">Other</option>
                            </select>

                        </div>

                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" class="form-control" id="" cols="25" rows="5"></textarea>
                        </div>

                    </div>
                </div>
                <br>
                <div class="form-group mt-2">
                    <button class="btn btn-primary " type="submit">Submit</button>
                </div>
            </div>

        </div>

    </form>

    <div class="row justify-content-center mt-5">
        <div class="col-md-10">

            <table class="table">
                <thead class="table-dark">
                    <tr>
                        <th scope="col">SN</th>
                        <th scope="col">From</th>
                        <th scope="col">To</th>
                        <th scope="col">Description</th>
                        <th scope="col">Type</th>
                        <th scope="col">Reply</th>
                        <th scope="col">Status</th>
                        <th scope="col">Edit</th>
                        <th scope="col">Delete</th>
                    </tr>
                </thead>

                <tbody>
                    @foreach($leaves as $leave)
                    <tr>
                        <th scope="row">1</th>
                        <td>{{$leave->from}}</td>
                        <td>{{$leave->to}}</td>
                        <td>{{$leave->description}}</td>
                        <td>{{$leave->type}}</td>
                        <td>{{$leave->message}}</td>
                        <td class="mt-2">
                            @if($leave->status == '0')
                            <span class="alert alert-danger py-1">pending</span>
                            @elseif($leave->status == '1')
                            <span class="badge bg-success py-3 px-2">Approved</span>
                            @else
                            <span class="badge bg-danger py-3 px-2">Rejected</span>
                            @endif
                        </td>
                        <td>
                            <a href="{{route('leaves.edit', [$leave->id])}}"> <i class="fas fa-edit"></i></a>
                        </td>
                        <td>
                            <a href="#" data-bs-toggle="modal" data-bs-target="#delete{{$leave->id}}"> <i class="fas fa-trash "></i>
                            </a>
                            <div class="modal fade" id="delete{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog" role="document">
                                    <form action="{{route('leaves.destroy', [$leave->id])}}" method="post">
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
                                                Do you really want to delete the {{$leave->name}} leave?
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                <button type="submit" class="btn btn-danger">Delete</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>

            </table>
        </div>
    </div>
</div>

@endsection