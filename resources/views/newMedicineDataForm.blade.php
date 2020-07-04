@extends('layouts.clinicUser')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="page-title">Medicine Data Form</h2>
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
                            {!!Form::text('medname', '', ['class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Medicine Type')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('medtype', '', ['class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Company Name')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('medcomp', '', ['class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Price')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('price', '', ['class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="col-sm-12">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Medicine Contents')}}<span class="text-danger">*</span></strong>
                            {!!Form::textarea('medcontents', '', ['class'=>'form-control', 'rows'=>3])!!}
                            </div>
                        </div>
                    </div>
                    <div class="m-t-20 text-center">
                        <!-- {!!Form::hidden('_method', 'PUT')!!} -->
                        {!! Form::submit('Submit Medicine Data', ['class' => 'btn btn-sl btn-info'] ) !!}
                        
                    </div>
                {!! Form::close()  !!}
            </div>
        </div>
    </div>

   <br/> <br/> <br/>
@endsection 