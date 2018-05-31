<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title of the document</title>
    <link rel="stylesheet" href="/css/bootstrap.min.css">
</head>

<body>
<div class="bg-info text-white p-5">
    <a href="{{route('posts.index')}}" class="btn btn-secondary">Home</a>
    <a href="{{route('posts.create')}}" class="btn btn-secondary">Create Post</a>
    {{--if a user is authenticated--}}
    @auth
        <form class="d-inline-block float-right" action="{{route('logout')}}" method="post">
            @csrf
            <button type="submit" class="btn btn-secondary">{{auth()->user()->name}} | Logout</button>
        </form>
        {{--else not authenticated show a user a login page--}}
    @else
        <a href="{{route('login')}}" class="btn btn-secondary d-inline-block float-right">Login</a>
    @endauth

</div>
<div class="container">
    @yield('content')
</div>
<div class="bg-dark text-white p-4 text-center">
    All Rights Reserved Key Digital Solutions {{date('Y')}}

</div>
</body>

</html>
