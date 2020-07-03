@extends('layouts.bloglayout')

<!--Commented out below flash-message using @php @endphp tags. [MN - 07.Jun.2020]-->


@section('content')
<!--<h1>$title within { and } comes here</h1>-->
    <!--<p>Where your health and life matters us!</p>-->
    <h1>Blog Posts</h1>
    @if(count($posts) > 0)
        @foreach($posts as $post)
            <div class="well">
                <h3><a href="/posts/{{$post->id}}">{{$post->title}}</a></h3>
                <small>Written on: {{$post->created_at}}</small>
            </div>
    
        @endforeach
        {{$posts->links()}} <!--This will paginate the resultset. [MN - 11.06.2020]-->
    @else
        <p>No post found!</p>    
    
    @endif

@endsection

