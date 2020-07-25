@extends('layouts.clinicUser')
@include('flash-message')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="page-title text-center">Medicine Data Form</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                {!! Form::open(['url' => '/addNewMedicine', 'method' => 'POST']) !!}
                @csrf
                    <div class="row">
                        <div class="col-sm-6">
                    
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Medicine Name')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('medname', '', ['class'=>'form-control', 'required'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Medicine Type')}}<span class="text-danger">*</span></strong>
                            {!!Form::select('medtype', ['Injection'=>'Injection', 'Tablet'=>'Tablet', 'Syrup'=>'Syrup', 'Capsule'=>'Capsule'], 'Tablet',['class'=>'form-control', 'required'])!!}
                            
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Company Name')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('medcomp', '', ['class'=>'form-control', 'required'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Price')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('price', '', ['class'=>'form-control', 'required'])!!}
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Medicine Contents')}}<span class="text-danger">*</span></strong>
                            {!!Form::textarea('medcontents', '', ['class'=>'form-control', 'rows'=>3, 'required'])!!}
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