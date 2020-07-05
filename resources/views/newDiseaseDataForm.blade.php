@extends('layouts.clinicUser')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="page-title">New Disease Data Form</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                {!! Form::open(['url' => '/addNewDisease', 'method' => 'POST']) !!}
                @csrf
                    <div class="row">
                        <div class="col-sm-12">
                    
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Disease Name')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('diseaseName', '', ['class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Disease Description')}}<span class="text-danger">*</span></strong>
                            {!!Form::textarea('desc', '', ['class'=>'form-control', 'rows'=>5])!!}
                            </div>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <!-- {!!Form::hidden('_method', 'PUT')!!} -->
                        {!! Form::submit('Submit Disease Data', ['class' => 'btn btn-sl btn-info'] ) !!}
                        
                    </div>
                {!! Form::close()  !!}
            </div>
        </div>
    </div>

   <br/> <br/> <br/>
@endsection 