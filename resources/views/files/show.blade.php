@extends('layouts.app')
@section('content')

<h1 class="text-center text-primary">File {{$file->id}}</h1>
    <div class="container col-6">
        <div class="card p-3">
            <h5 class="card-title ml-5 mt-5">File Title : {{$file->title}}</h5>
            <div class="card-body">
            File Description :
            {{$file->description}}
            <img style="width: 300px; hieght:300px;" src="{{asset("uploads/$file->mainFile")}}" alt="">
            </div>
            <a href="{{ route('file.download', $file->id) }}" class="btn btn-primary btn-block w-50 mx-auto">Download</a>
        </div>
    </div>






@endsection
