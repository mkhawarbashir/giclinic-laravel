@extends('layouts.clinicUser')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h4 class="page-title">Patient Data Form</h4>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <form action="updatePatient" method="post" id="ptdataform">
                @csrf
                    <div class="row">
                        <div class="col-sm-6">
                        @foreach($rec as $data)
                            <div class="form-group">
                                <label>First Name <span class="text-danger">*</span></label>
                                    <input class="form-control" name="fname" type="text" value="{{$data->first_name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Last Name <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="lname" value="{{$data->last_name}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Date of Birth <span class="text-danger">*</span></label>
                                <div class="cal-icon">
                                <input type="date" name="datepicker" id="datepicker" value="{{$data->dob}}" class="form-control dynamic" required placeholder="-- Select Date --">
                                </div>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>CNIC <span class="text-danger">*</span></label>
                                <input class="form-control" type="text" name="cnic" value="{{$data->cnic}}">
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group">
                                <label>Disease</label>
                                <select id="disease" name="disease" class="form-control" multiple >
                                <option>Blood Pressure</option>
                                <option>Sugar</option>
                                <option>Fever</option>
                                <option>Stomach Pain</option>
                                <option>Blood Pressure</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-sm-6">
                            <div class="form-group gender-select">
                                <label class="gen-label">Gender <span class="text-danger">*</span></label>
                                <div class="form-check-inline">
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" class="form-check-input">Male
                                    </label>
                                </div>
                                <div>
                                    <label class="form-check-label">
                                        <input type="radio" name="gender" class="form-check-input">Female
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        <div class="col-sm-12">
                            <div class="row">
                                <div class="col-sm-12">
                                    <div class="form-group">
                                        <label>Address</label>
                                        <input type="text" name="address" class="form-control " value="{{$data->address }}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Country</label>
                                        <select class="form-control select" name="country" value="{{$data->country}}">
                                            <option>Pakistan</option>
                                            <option>United Kingdom</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>City <span class="text-danger">*</span></label>
                                        <input type="text" class="form-control" name="city" value="{{$data->city}}">
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>State/Province</label>
                                        <select class="form-control select" name="state" value="{{$data->state}}">
                                            <option>Punjab</option>
                                            <option>KPK</option>
                                            <option>Sindh</option>
                                            <option>Balochistan</option>
                                            <option>Gilgit/Baltistan</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-sm-6">
                                    <div class="form-group">
                                        <label>Phone <span class="text-danger">*</span></label>
                                        <input class="form-control" type="text" name="phone" value="{{$data->contact_number}}">
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endforeach
                        
                    </div>
                    <div class="m-t-20 text-center">
                        <input type="hidden" name="_method" value="GET">
                        <button type="submit" form="ptdataform" value="Submit">Save Patient Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

   <br/> <br/> <br/>
@endsection