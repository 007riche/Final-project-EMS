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
    <div class="alert alert-success alert-dismissible fade show">
        {{Session::get('message')}}
    </div>
    @endif

    <form action="{{route('leaves.update', [$leave->id])}}" method="post" enctype="multipart/form-data">@csrf
        {{method_field('PATCH')}}
        <div class="row justify-content-center">
            <div class="col-md-10">
                <div class="card">
                    <div class="card-header">Edit the leave </div>
                    <div class="card-body">
                        <div class="form-group">
                            <label>From:</label>
                            <input type="text" name="from" id="from" value="{{$leave->from}}" class="form-control @error('from') is-invalid @enderror" required="">
                            @error('from')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>To:</label>
                            <input type="text" name="to" value="{{$leave->to}}" id="to" class="form-control  @error('to') is-invalid @enderror" required="">
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
                            <textarea name="description" class="form-control" id="" cols="25" rows="5">{{$leave->description}}</textarea>
                        </div>

                    </div>
                </div>
                <br>
                <div class="form-group mt-2">
                    <button class="btn btn-primary " type="submit">Edit</button>
                </div>
            </div>

        </div>

    </form>


</div>

@endsection