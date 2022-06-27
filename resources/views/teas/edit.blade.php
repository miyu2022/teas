@extends('layouts.layouts')

@section('title', 'Tea Board')

@section('content')

    <h1>Editing Tea</h1>
    
    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form method="POST" action="/teas/{{ $tea->id }}">
        {{ csrf_field() }}
        <input type="hidden" name="_method" value="PUT">
        <div class="form-group">
            <label for="exampleInputEmail1">茶名</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="tea_name" value="{{ old('tea_name') == '' ? $tea->tea_name : old('tea_name') }}">
        </div>
        <div class="form-group"> 
            <label for="exampleInputEmail1">原産地</label>
            <input type="text" class="form-control" aria-describedby="emailHelp" name="tea_place" value="{{ old('tea_place') == '' ? $tea->tea_place : old('tea_place') }}"> 
        </div>
        <button type="submit" class="btn btn-outline-primary">Submit</button>
    </form>

    <a href="/teas/{{ $tea->id }}">Show</a> | 
    <a href="/teas">Back</a>
@endsection