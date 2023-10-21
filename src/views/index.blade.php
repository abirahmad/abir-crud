@extends('crud::layout')
@section('title')
    User List
@endsection
@section('content')
    <div class="container">
        @if (isset($errors))
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <a href="{{route('users.create')}}" class="btn btn-info">Create</a>
        <div class="card" style="width: 50rem;">
            <table class="table">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Message</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cruds as $crud)
                        <tr>
                            <th scope="row">1</th>
                            <td>{{ $crud->name }}</td>
                            <td>{{ $crud->email }}</td>
                            <td>{{ $crud->message }}</td>
                            <td>
                                <a href="{{ route('users.edit', $crud->id) }}" class="btn btn-info">Edit</a>
                                <a href="{{ route('users.destroy', $crud->id) }}" class="btn btn-danger">Delete</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
