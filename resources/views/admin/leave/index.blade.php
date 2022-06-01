@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-11">
            <div class="card">
                <div class="card-header">{{ __('Leaves') }}</div>

                <div class="card-body">
                    @if (session('status'))
                    <div class="alert alert-success " role="alert">
                        {{ session('status') }}
                    </div>
                    @endif

                    <table class="table">
                        <thead class="table-dark">
                            <tr>
                                <th scope="col">Name</th>
                                <th scope="col">From</th>
                                <th scope="col">To</th>
                                <th scope="col">Description</th>
                                <th scope="col">Type</th>
                                <th scope="col">Reply</th>
                                <th scope="col">Status</th>
                                <th scope="col">Approve/Reject</th>
                            </tr>
                        </thead>

                        <tbody>
                            @foreach($leaves as $leave)
                            <tr>
                                <th scope="row">{{$leave->user->name}}</th>
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
                                    @if($leave->status == '0')
                                    <a href="#" class="btn btn-outline-dark" role="button" data-bs-toggle="modal" data-bs-target="#delete{{$leave->id}}"> Process
                                    </a>
                                    @else
                                    <a href="#" class="btn btn-outline-dark disabled" role="button"> Processed
                                    </a>
                                    @endif

                                    <div class="modal fade" id="delete{{$leave->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                        <div class="modal-dialog" role="document">
                                            <form action="{{route('accept.reject', [$leave->id])}}" method="post">@csrf


                                                <div class="modal-content">
                                                    <div class="modal-header bg-dark bg-gradient text-light">
                                                        <i class="fa-solid fa-rotate me-2"></i>
                                                        <h5 class="modal-title " id="exampleModalLabel">
                                                            Process the leave
                                                        </h5>
                                                        <button type="button" class="btn-close " data-bs-dismiss="modal" aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="form-group">
                                                            <label for="">Status:</label>
                                                            <select name="status" id="" class="form-control">
                                                                <option value="0">Pending</option>
                                                                <option value="1">Approve</option>
                                                                <option value="2">Reject</option>
                                                            </select>
                                                        </div>
                                                        <div class="form-group">
                                                            <label for="">Reply:</label>
                                                            <textarea name="message" id="" cols="25" rows="7" class="form-control"></textarea>
                                                        </div>

                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                                                        <button type="submit" class="btn bg-dark bg-gradient text-light">Process</button>
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
    </div>
</div>
@endsection