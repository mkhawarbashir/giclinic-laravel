@extends('layouts.mainlayout')

<!--Created on . [MN - 07.Jun.2020]-->

@section('content')
    <h1>Create Blog Post</h1>
    <!--Below Form::open and Form::close code is copied from https://laravelcollective.com/docs/6.0/html#installation
        and changed the open() as seen below.
    -->
    
    <!--Adding 'enctype' => 'multipart/data' after POST for file upload functionality. 30.04.2020-->
    {!! Form::open(['action' => 'BlogPagesController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data']) !!}
        <div class="form-group">
            <strong>{{Form::label('title', 'Title')}}</strong>
            {{Form::text('title', '',  ['class' => 'form-control', 'placeholder' => 'Title'])}}
        </div>
        <div class="form-group">
            <strong>{{Form::label('body', 'Body')}}</strong>
            {{Form::textarea('body', '',  ['id' => 'article-ckeditor', 'class' => 'form-control', 'placeholder' => 'Body Text'])}}
            <!--
            <textarea class="form-control" id="summary-ckeditor" name="summary-ckeditor"></textarea><br>
            <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
            <script>
                CKEDITOR.replace('summary-ckeditor', {
                filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token()])}}",
                filebrowserUploadMethod: 'form'
                });
            </script>
            -->
        </div>
        <!--File upload code using Laravel. This will provide a "Choose File" button in create post page.
                To make it functional, we will need to add a new column "cover_image" in posts table using 
                Laravel migration. 30-04-2020-->
        <div class = "form-group">
            {{Form::file('cover_image')}}
        </div>
        <a href="/posts" class="btn btn-secondary">Back</a>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
