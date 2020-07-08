@extends('layouts.app')

<!--Created on . [MN - 07.Jun.2020] -->

@section('content')
    <!--Code block commented for testing the code after it. [MN - 11.06.2020]
        <a href="/posts" class="btn btn-default">Back</a>
        <h1>{ {$post->title}}</h1>
        <div>
            { {$post->body}}
        </div>
        <hr>
        <small>Written on: { {$post->created_at}}</small>
    -->
    <h1>{{$post->title}}</h1>
        <div>
            {!!$post->body!!}   <!--Surrounding !! (double exclamation marks) will parse in browser 
                                    output any HTML produced through CKEditor. [MN - 11.06.2020]-->
        </div>
        <hr>
            <!--Compare created and updated dates and show only created_at if both 
                are same and both if both are different. [MN - 11.06.2020]-->    
        @if($post->created_at->eq($post->updated_at))
            <small>Written on: { {$post->created_at}} by { {$post->user->name}}</small>
        @else
            <small>Written on: {{$post->created_at}} by {{$post->user->name}}</small><br>
            <small>Updated on: {{$post->updated_at}} by {{$post->user->name}}</small>    
        @endif
        <hr>
        <a href="/posts" class="btn btn-secondary">Back</a>
        <!--Added "if statement" below to remove Edit and Delete buttons for guest users.
            But any logged in user can still edit / delete other user's post. [MN - 28.06.2020] -->
        @if(!Auth::guest())
            <!--Added another "if statement" below to restrict a user to only edit / delete his/her post. [MN - 28.06.2020] -->
            @if(Auth::user()->id == $post->user_id)
                <a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit Post</a>
                {!! Form::open(['action' => ['BlogPagesController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                    {{Form::hidden('_method', 'DELETE')}}
                    {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                {!! Form::close() !!}
            @endif
        @endif
@endsection

