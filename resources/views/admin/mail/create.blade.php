@extends('admin.layouts.master')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-10">
            @if(Session::has('message'))
            <div class="alert alert-success alert-dismissible fade show">
                {{Session::get('message')}}
            </div>
            @endif
            <div class="card">
                <div class="card-header">New Mail</div>

                <div class="card-body">
                    <form action="{{route('mails.store')}}" method="POST" enctype="multipart/form-data">@csrf
                        <div class="form-control">
                            <label for="">To</label>
                            <select name="mail" id="mail" class="form-control">
                                <option value="0">mail to all staff</option>
                                <option value="1">Choose department</option>
                                <option value="2">Choose person</option>
                            </select>
                            <br>
                            <select name="department" id="department" class="form-control">
                                @foreach(App\Models\Department::all() as $department)
                                <option value="{{$department->id}}">{{$department->name}}</option>
                                @endforeach
                            </select>

                            <select name="person" id="person" class="form-control">
                                <option value="">Select a person</option>
                                @foreach(App\Models\User::all() as $user)
                                <option value="{{$user->id}}">{{$user->name}}</option>
                                @endforeach
                            </select>
                        </div>
                        <!-- <div class="form-group">
                            <label for="">Subject</label>
                            <input type="text" name="" id="subject" class="form-control @error('subject') is-invalid @enderror" required>
                            @error('subject')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div> -->
                        <div class="form-group">
                            <label for="file">Attachment</label>
                            <input type="file" name="file" id="file" class="form-control @error('file') is-invalid @enderror">
                            <!-- multiple -->
                            @error('file')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <label for="body">Email content</label>
                            <textarea name="body" id="" class="form-control @error('body') is-invalid @enderror" cols="25" rows="7" required=""></textarea>
                            @error('body')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                        <br>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary">Send</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<style type="text/css">
    #department {
        display: none;
    }

    #person {
        display: none;
    }
</style>
@endsection