@extends('layouts.clinicUser')
@include('flash-message')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="page-title text-center">Time Slots</h2>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                {!! Form::open(['url' => '/setTimeSlots', 'method' => 'POST']) !!}
                @csrf
                    <div class="row">
                        <div class=" col-sm-6 ">
                            <span style="color:red;font-weight:bold">*</span>
                            <label for="date">Select Start Date</label>
                            <input type="date" name="startDate" id="startDate" value="" class="form-control dynamic" required placeholder="-- Select Date --">
                            <br>
                        </div>
                        <div class=" col-sm-6 ">
                            <span style="color:red;font-weight:bold">*</span>
                            <label for="date">Select End Date</label>
                            <input type="date" name="endDate" id="endDate" value="" class="form-control dynamic" required placeholder="-- Select Date --" >
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-sm-6 ">
                            <span style="color:red;font-weight:bold">*</span>
                            <label for="date">Select Start Time</label>
                            <input type="time" name="startTime" id="startTime" value="" class="form-control dynamic" required placeholder="-- Set Time --" >
                            <br>
                        </div>
                        <div class=" col-sm-6 ">
                            <span style="color:red;font-weight:bold">*</span>
                            <label for="date">Select End Time</label>
                            <input type="time" name="endTime" id="endTime" value="" class="form-control dynamic" required placeholder="-- Set Time --" >
                            <br>
                        </div>
                    </div>
                    <div class="row">
                        <div class=" col-sm-6 ">
                            <span style="color:red;font-weight:bold">*</span>
                            <label for="date">Slot Difference in Mins</label>
                            <input type="text" name="slotTime" id="slotTime" value="" class="form-control dynamic" required placeholder="-- Enter Slot Time --" >
                            <br>
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