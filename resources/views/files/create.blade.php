@extends('layouts.app')
@section('content')



    <h1 class="text-center text-primary">Add new file</h1>

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <div class="container col-6">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('file.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="form-group">
                        <label for="">Title</label>
                        <input type="text" name="Title" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">Description</label>
                        <input type="text" name="Description" class="form-control">
                    </div>
                    <div class="form-group">
                        <label for="">File</label>
                        <input type="file" name="inputFile" class="form-control">
                    </div>
                    <input type="hidden" name="userID" value="{{Auth::user()->id }}">
                    <button class="btn btn-primary btn-block w-50 mx-auto">Send</button>
                </form>
            </div>
        </div>
    </div>








@endsection
