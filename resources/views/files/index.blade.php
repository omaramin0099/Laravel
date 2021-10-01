@extends('layouts.app')
@section('content')




    <h1 class="text-center text-primary mb-5 font-weight-bold">Files list</h1>


    @if (Session::has('added'))
        <div class="alert alert-success alert-dismissible container col-4">
            {{ Session::get('added') }}
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        </div>
    @endif
    @if (Session::has('edited'))
        <div class="alert alert-info alert-dismissible container col-4">
            {{ Session::get('edited') }}
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        </div>
    @endif
    @if (Session::has('deleted'))
        <div class="alert alert-danger alert-dismissible container col-4">
            {{ Session::get('deleted') }}
            <a href='#' class='close' data-dismiss='alert' aria-label='close'>&times;</a>
        </div>
    @endif
    <div class="container col-6">
        <div class="card">
            <div class="card-body">
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th scope="col">ID</th>
                            <th scope="col">Title</th>
                            <th scope="col">Description</th>
                            <th></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($files as $item)
                            <tr>
                                <td>{{ $item->id }}</td>
                                <td>{{ $item->title }}</td>
                                <td>{{ $item->description }}</td>
                                <td>
                                    <a class="" href="{{ route('file.show', $item->id) }}"><i
                                            style="font-size: 24px" class="far fa-eye"></i></a>
                                </td>
                                <td>
                                    <a class="mx-2" href="{{ route('file.edit', $item->id) }}"><i
                                            style="font-size: 24px" class="far fa-edit"></i></a>
                                </td>
                                <td>
                                    <a href="{{ route('file.destroy', $item->id) }}"><i style="font-size: 24px" class="far fa-trash-alt"></i></a>
                                </td>
                            </tr>
                        @endforeach


                    </tbody>
                </table>
                <a href="{{ route('file.create') }}" class="btn btn-primary btn-block w-50 mx-auto">Add new file</a>
            </div>
        </div>
    </div>






@endsection
