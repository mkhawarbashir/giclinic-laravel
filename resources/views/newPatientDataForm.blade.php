@extends('layouts.clinicUser')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="page-title text-center">Patient Data Form</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                {!! Form::open(['url' => '/addNewPatient', 'method' => 'POST']) !!}
                @csrf
                    <div class="row">
                        <div class="col-sm-6">
                    
                            <div class="form-group">
                            <strong>{{Form::label('title', 'First Name')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('fname', '', ['class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Last Name')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('lname', '', ['class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Date of Birth')}}<span class="text-danger">*</span></strong>
                            {!!Form::date('datepicker', '', ['class'=>'form-control dynamicl'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'CNIC')}}<span class="text-danger">*</span></strong>
                            {!!Form::text('cnic', '', ['class'=>'form-control'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                            <strong>{{Form::label('title', 'Disease')}}<span class="text-danger">*</span></strong>
                                        
                            {!!Form::select('disease', ['blood pressure'=>'Blood Pressure', 'sugar'=>'Sugar', 'fever'=>'Fever', 'stomach pain'=>'Stomach Pain'], '',['class'=>'form-control', 'multiple'=>'multiple'])!!}
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group gender-select">
                                <strong>{{Form::label('title', 'Gender')}}<span class="text-danger">*</span></strong>
                            </div>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        {!!Form::radio('gender', 'Male', ['class'=>'form-check-input', 'checked'=>'true'])!!}
                                        Male
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                    {!!Form::radio('gender', 'Female')!!}
                                    Female
                                    </label>
                                </div>
                            
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                    <strong>{{Form::label('title', 'Address')}}<span class="text-danger">*</span></strong>
                                    {!!Form::text('address', '', ['class'=>'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <strong>{{Form::label('title', 'Country')}}<span class="text-danger">*</span></strong>
                                        
                                        {!!Form::select('country', ['pakistan' => 'Pakistan', 'afghanistan' => 'Afghanistan', 'UK' => 'United Kingdom'], 'Pakistan',['class'=>'form-control'])!!}
                                    
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <strong>{{Form::label('title', 'City')}}<span class="text-danger">*</span></strong>
                                    {!!Form::text('city', '', ['class'=>'form-control'])!!}
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <strong>{{Form::label('title', 'State')}}<span class="text-danger">*</span></strong>
                                        
                                        {!!Form::select('state', ['punjab' => 'Punjab', 'kpk' => 'KPK', 'sindh' => 'Sindh', 'blochistan' => 'Balochistan', 'gilgit' => 'Gilgit-Baltistan'], 'Punjab',['class'=>'form-control'])!!}
                                        
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                    <strong>{{Form::label('title', 'Phone Number')}}<span class="text-danger">*</span></strong>
                                    {!!Form::tel('phone','', ['class'=>'form-control'])!!}
                                </div>
                                </div>
                            </div>
                        </div>
                        
                        
                    </div>
                    <div class="m-t-20 text-center">
                        <!-- {!!Form::hidden('_method', 'PUT')!!} -->
                        {!! Form::submit('Submit Patient Data', ['class' => 'btn btn-sl btn-info'] ) !!}
                        
                    </div>
                {!! Form::close()  !!}
            </div>
        </div>
    </div>

   <br/> <br/> <br/>
@endsection 