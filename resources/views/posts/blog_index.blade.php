@extends('layouts.bloglayout')
{{-- @extends('layouts.mainlayout') --}}

<!--Commented out below flash-message using @php @endphp tags. [MN - 07.Jun.2020]-->


@section('content')
<!--<h1>$title within { and } comes here</h1>-->
    <!--<p>Where your health and life matters us!</p>-->
    <div class = "row">
        <h1>Blog Posts</h1>
    </div>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                {{-- <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Written on: {{$post->created_at}} by {{$post->user->name}}</small> --}}
                <div class = "row">
                    <div class = "col-md-0 col-sm-0" padding-left: 100px;>
                    <img src = "/storage/cover_images/{{$post->cover_image}}" width="50" height="50">
                    </div>
                    <div class = "col-md-9 col-sm-9">
                        <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                        @if($post->created_at->eq($post->updated_at))
                            <small>Written on: {{$post->created_at}} by {{$post->user->name}}</small>    
                        @else
                            <small>Written on: {{$post->created_at}} by {{$post->user->name}}</small><br>
                            <small>Updated on: {{$post->updated_at}} by {{$post->user->name}}</small>    
                        @endif
                    </div>
                </div>
            </div>
    
        @endforeach
        {{$posts->links()}} <!--This will paginate the resultset. [MN - 11.06.2020]-->
    @else
        <p>No post found!</p>    
    
    @endif

@endsection

