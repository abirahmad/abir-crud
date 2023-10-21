@extends('crud::layout')
@section('title')
    Create
@endsection
@section('content')
    <div class="container">
        <div class="card" style="width: 50rem;">
            {{-- @if (!is_null($errors->any()))
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif --}}
            <form action="{{ route('user.store') }}" method="POST">
                @method('post')
                @csrf
                <input type="text" class="form-control" name="name" value="{{old('name')}}" placeholder="Your name plase"><br>
                @error('name')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <input type="email" class="form-control" name="email" value="{{old('email')}}" placeholder="Your email plase"><br>
                @error('email')
                    <div class="text-danger">{{ $message }}</div>
                @enderror
                <textarea type="message" class="form-control" name="message" placeholder="Your message plase"></textarea>
                <button type="submit" class="btn-btn-info">Submit</button>
            </form>
        </div>
    </div>
@endsection
