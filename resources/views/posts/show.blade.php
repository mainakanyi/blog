@extends('master')
@section('content')


    <div class="card">
        <div class="card-header">
            <h1> {{$post->title}}</h1>
        </div>
        <div class="card-body">
            <p> {{$post->contents}}</p>

        </div>

    </div>


@endsection
