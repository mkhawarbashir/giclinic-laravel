@extends('layouts.clinicUser')
@include('flash-message')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="page-title text-center">New Disease Detail</h2>
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
                            {!!Form::text('diseaseName', '', ['class'=>'form-control', 'required'])!!}
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Disease Description')}}<span class="text-danger">*</span></strong>
                            {!!Form::textarea('desc', '', ['class'=>'form-control', 'rows'=>5, 'required'])!!}
                            </div>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <!-- {!!Form::hidden('_method', 'PUT')!!} -->
                        {!! Form::submit('Save', ['class' => 'btn btn-sl btn-info'] ) !!}
                        {!! Form::submit('Cancel', ['class' => 'btn btn-sl btn-info', 'route'=>'appointmentDetails'] ) !!}
                    </div>
                {!! Form::close()  !!}
            </div>
        </div>
    </div>

   <br/> <br/> <br/>
@endsection 