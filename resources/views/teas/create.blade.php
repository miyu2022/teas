@extends('layouts.layouts')

@section('title', 'Tea Board')

@section('content')
    <h1>New Tea</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/teas">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="exampleInputEmail1">茶名</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="tea_name" value="{{old('tea_name')}}">
        </div>
        <div class="form-group">
            <label for="exampleInputPassword1">原産地</label>
             <input type="text" class="form-control" aria-describedby="emailHelp" name="tea_place" value="{{old('tea_place')}}">
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>

    <a href="/teas">Back</a>
@endsection
