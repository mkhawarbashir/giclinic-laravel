@extends('layouts.app')

<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    
    <!-- CSRF Token -->
    
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{config('app.name')}}</title>
    
    <!-- Scripts -->
    
    <script src="{{ asset('js/app.js') }}" defer></script>
    
    <!-- Fonts -->
    
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    
    <!-- Styles -->
    
    <link href="{{ asset('/css/app.css') }}" rel="stylesheet">
    <style>
        .row {
            padding-left: 50px; 
        }
    </style>

</head>
<body>
    <div id="app">
        <main class="py-4">
            <!-- here comes @ && include('inc.navbar') -->
            {{-- @include('inc.messages') [MN - Commented on 28.06.2020]--}}
            
        </main>
    </div>
    <script src="{{asset('ckeditor/ckeditor.js')}}"></script>
    <script>
        CKEDITOR.replace('article-ckeditor' 'summary-ckeditor', {
        filebrowserUploadUrl: "{{route('upload', ['_token' => csrf_token()])}}",
        filebrowserUploadMethod: 'form'
        });
    </script>
</body>
</html>
