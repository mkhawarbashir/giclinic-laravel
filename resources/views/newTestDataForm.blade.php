@extends('layouts.clinicUser')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="page-title">Lab Test Data Form</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                {!! Form::open(['url' => '/addNewTest', 'method' => 'POST']) !!}
                @csrf
                    <div class="row">
                        <div class="col-sm-6">
                    
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Test Name')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('tname', '', ['class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Laboratory')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('lname', '', ['class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Test Description')}}<span class="text-danger">*</span></strong>
                            {!!Form::textarea('tdesc', '', ['class'=>'form-control', 'rows'=>4])!!}
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