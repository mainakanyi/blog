@extends('master')
@section('content')

    <h1>All Posts</h1>
    @foreach($post as $posts)
        <div class="card mt-4">
            <div class="card-body ">

                <h2>
                    <a href="{{route('posts.show',$posts->id)}}">
                        {{$posts->title}}
                    </a>
                    @auth
                    <a href="{{route('posts.edit', $posts->id)}}" class="btn btn-info">Edit</a>

                    <form onsubmit="return confirm('Are you sure you want to delete this post?')" class="d-inline-block" action="{{route('posts.destroy', $posts->id)}}" method="post">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger">Delete</button>
                    </form>
                        @else

                    @endauth
                </h2>

            </div>


        </div>

    @endforeach
    <div class="mt-4">
        {{$post->links()}}
    </div>


@endsection
