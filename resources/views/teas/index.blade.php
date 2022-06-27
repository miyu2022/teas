@extends('layouts.layouts')

@section('title', 'Tea Board')

@section('content')

    @if (session('message'))
        {{ session('message') }}
    @endif

    <h1>Teas</h1>

    @foreach($teas as $tea)

        <div class="card">
            <div class="card-body">
                <h5 class="card-title">{{ $tea->tea_name }}</h5>
                <p class="card-text">{{ $tea->tea_place }}</p>

                <div class="d-flex" style="height: 36.4px;">
                    <a href="/teas/{{ $tea->id }}" class="btn btn-outline-primary">Show</a>
                    <a href="/teas/{{ $tea->id }}/edit" class="btn btn-outline-primary">Edit</a>
                    <form action="/teas/{{ $tea->id }}" method="DELETE" onsubmit="if(confirm('Delete? Are you sure?')) { return true } else {return false };">
                        <!--<input type="hidden" name="_method" value="DELETE">-->
                        <input type="hidden" name="_token" value="{{ csrf_token() }}">
                        <button type="submit" class="btn btn-outline-danger">Delete</button>
                    </form>
                </div>
            </div>
        </div>
    @endforeach
    <a href="/teas/create">New Tea</a>
@endsection