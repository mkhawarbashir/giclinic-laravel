@extends('layouts.bloglayout')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header"><strong>Blog Dashboard for {{auth()->user()->name}}<strong></div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <!--Put next two lines below to provide create post button to the logged in user. 28.06.2020-->
                    <a href="/posts/create" class="btn btn-primary">Create New Blog Post</a><br><br>
                    <h2><strong>Blog Posts Written by {{auth()->user()->name}}</strong></h2>
                    <!--Code showing user's own Blog Posts shall come here. 28.06.2020-->
                    <!--After doing changes in Post.php, User.php, and dashboard.blade.php, 
                        we add a table here. 28.06.2020-->
                        @if(count($posts) > 0)
                        <table class="table table-striped">
                            <tr>
                                <th><strong><h3>List of Your Blog Posts</h3></strong></th>
                                <th></th>   {{--<th> for Edit button--}}
                                <th></th>   {{--<th> for Delete button--}}
                            </tr>
                                @foreach($posts as $post)
                                    <tr>
                                        <td><strong>{{$post->title}}</strong><br>
                                            @if($post->created_at->eq($post->updated_at))
                                                <small>Written on: {{$post->created_at}} by {{$post->user->name}}</small>
                                            @else
                                                <small>Written on: {{$post->created_at}} by {{$post->user->name}} </small><br>
                                                <small>Updated on: {{$post->updated_at}} by {{$post->user->name}}</small>    
                                            @endif
                                        </td>
                                        <td><a href="/posts/{{$post->id}}/edit" class="btn btn-primary">Edit</a></td>
                                        <td>
                                            {!! Form::open(['action' => ['BlogPagesController@destroy', $post->id], 'method' => 'POST', 'class' => 'float-right'])!!}
                                                {{Form::hidden('_method', 'DELETE')}}
                                                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                                            {!! Form::close() !!}
                                        </td>
                                    </tr>
                                @endforeach
                        </table>
                        @else
                            <p>You have not written any post so far!</p>
                        @endif
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
