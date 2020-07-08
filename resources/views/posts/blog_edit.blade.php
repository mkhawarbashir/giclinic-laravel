@extends('layouts.bloglayout')

<!--Created on . [MN - 11.Jun.2020] -->

@section('content')
<h1>Edit Your Blog - {{$post->title}}</h1>
    <!--Below Form::open and Form::close code is copied from https://laravelcollective.com/docs/6.0/html#installation
        and changed the open() as seen below.
    -->
    <!--Either we can mention 'method' => 'PUT' as route for update() in BlogPagesController takes either PUT or PATCH
        or we can keep 'method' => 'POST' here and mention Form::hidden('_method', 'PUT') before Form::submit. [MN - 11.Jun.2020]
    -->
    @trixassets
    {!! Form::open(['action' => ['BlogPagesController@update', $post->id], 'method' => 'POST']) !!}
        @csrf
        <div class="form-group">
            <strong>{{Form::label('title', 'Title')}}</strong>
            <!--Instead of blank title, it should take the title of post that is being edited. [MN - 11.Jun.2020]-->
            {{Form::text('title', $post->title,  ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            <strong>{{Form::label('body', 'Body')}}</strong>
            <!--Instead of blank body, it should take the body of post that is being edited. [MN - 11.Jun.2020]-->
            {{Form::textarea('body', $post->body,  ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
            <script>
                CKEDITOR.replace('article-ckeditor', {
                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token()])}}",
                filebrowserUploadMethod: 'form'
                });
            </script>
         </div>
         <!--File upload code using Laravel. This will provide a "Choose File" button in create post page.
                To make it functional, we will need to add a new column "cover_image" in posts table using 
                Laravel migration. 28-06-2020-->
        <div class = "form-group">
            {{Form::file('cover_image')}}
        </div>
        <a href="/posts" class="btn btn-secondary">Back</a>
        <!--Below line converts POST into PUT as required by this route. [MN - 11.Jun.2020]-->
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
