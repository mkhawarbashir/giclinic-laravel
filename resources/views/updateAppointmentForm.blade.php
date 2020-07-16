@extends('layouts.clinicUser')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="page-title">Update Appointment Status</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                {!! Form::open(['url' => '/updateAppointment', 'method' => 'POST']) !!}
                @csrf
                    <div class="row">
                        <div class="col-sm-6">
                        @foreach($arec as $adata)
                        @foreach($prec as $pdata)
                            <div class="form-group">
                            <strong>{{Form::label('title', 'First Name')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('fname', $pdata->first_name, ['class'=>'form-control', 'readonly'=>'true'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Last Name')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('lname', $pdata->last_name, ['class'=>'form-control', 'readonly'=>'true'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Date of Appointment')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('appointDate', $adata->date, ['class'=>'form-control', 'readonly'=>'true'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Appointment Time')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('time', $adata->time, ['class'=>'form-control', 'readonly'=>'true'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Patient Status')}}<span class="text-danger">*</span></strong>
                                        
                            {!!Form::select('status', ['Active'=>'Active', 'Not Active'=>'Not Active'], 'Not Active',['class'=>'form-control'])!!}
                            </div>
                        </div>
                        {{ Form::hidden('patient_id', $pdata->patient_id) }}
                        {{ Form::hidden('appointment_id', $adata->appointment_id) }}
                        @endforeach
                        @endforeach
                    </div>
                    <div class="m-t-20 text-center">
                        <!-- {!!Form::hidden('_method', 'PUT')!!} -->
                        {!! Form::submit('Update Appointment Data', ['class' => 'btn btn-sl btn-info'] ) !!}
                        
                    </div>
                {!! Form::close()  !!}
            </div>
        </div>
    </div>

   <br/> <br/> <br/>
@endsection 