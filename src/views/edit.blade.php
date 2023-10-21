@extends('crud::layout')
@section('title')
    Create
@endsection
@section('content')
    <div class="container">
        <div class="card" style="width: 50rem;">
            <form action="{{ route('users.update',$crud->id) }}" method="POST">
                @method('put')
                @csrf
                <input type="text" class="form-control" name="name" value="{{$crud->name}}" placeholder="Your name plase"><br>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="email" class="form-control" name="email" value="{{$crud->email}}" placeholder="Your email plase"><br>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <textarea type="message" class="form-control" name="message" value="{{$crud->message}}" placeholder="Your message plase"></textarea>
                <button type="submit" class="btn btn-info">Update</button>
            </form>
        </div>
    </div>
@endsection
