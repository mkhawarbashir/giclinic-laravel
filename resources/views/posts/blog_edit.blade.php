@extends('layouts.bloglayout')

<!--Created on . [MN - 11.Jun.2020]-->

@section('content')
    <h1>Edit Your Blog Post</h1>
    <h1>Edit Post</h1>
    <!--Below Form::open and Form::close code is copied from https://laravelcollective.com/docs/6.0/html#installation
        and changed the open() as seen below.
    -->
    <!--Either we can mention 'method' => 'PUT' as route for update() in BlogPagesController takes either PUT or PATCH
        or we can keep 'method' => 'POST' here and mention Form::hidden('_method', 'PUT') before Form::submit. [MN - 11.Jun.2020]
    -->
    {!! Form::open(['action' => ['BlogPagesController@update', $post->id], 'method' => 'POST']) !!}
        <div class="form-group">
            <strong>{{Form::label('title', 'Title')}}</strong>
            <!--Instead of blank title, it should take the title of post that is being edited. [MN - 11.Jun.2020]-->
            {{Form::text('title', $post->title,  ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            <strong>{{Form::label('body', 'Body')}}</strong>
            <!--Instead of blank body, it should take the body of post that is being edited. [MN - 11.Jun.2020]-->
            {{Form::textarea('body', $post->body,  ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
         </div>
        <a href="/posts" class="btn btn-secondary">Back</a>
        <!--Below line converts POST into PUT as required by this route. [MN - 11.Jun.2020]-->
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
