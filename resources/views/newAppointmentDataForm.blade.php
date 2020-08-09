@extends('layouts.clinicUser')

@include('flash-message')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="page-title text-center">Appointment Data Form</h2><br>
            </div>
        </div>
        
        <div class="row">
        <div class="col-lg-8 offset-lg-2">
                         <!-- CONTACT FORM HERE -->
                        
                         <form id="appointment-form" role="form" method="post" action="newappointmentsubmit">
                         @csrf
                              <!-- SECTION TITLE -->
                              <!-- <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Make an appointment</h2>
                              </div> -->
                         @foreach($patient as $data)
                         <div class="row">
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class=" col-sm-6">
                                        <span style="color:red;font-weight:bold">*</span>
									    <label for="name">First Name</label>
                                        <input type="text" class="form-control" id="fname" value={{$data->first_name}} name="fname" placeholder="First Name" readonly>
                                        <br>
                                   </div>

                                   <div class=" col-sm-6">
									    <span style="color:red;font-weight:bold">*</span>
                                        <label for="name">Last Name</label>
                                        <input type="text" class="form-control" id="lname" value={{$data->last_name}} name="lname" placeholder="Last Name" readonly>
                                        <br>
                                   </div>

                                   <div class=" col-sm-6 ">
									    <span style="color:red;font-weight:bold">*</span>
                                        <label for="date">Select Appointment Date</label>
                                        <input type="text" name="doapicker" id="doapicker" value="" class="form-control dynamic" required placeholder="-- Select Date --" readonly>
                                        <br>
                                   </div>

                                   <div class=" col-sm-6">
                                                  <span style="color:red;font-weight:bold">*</span>
                                        <label for="select">Select Time</label>
                                        <select class="form-control" id="time" name="time" placeholder="Select Available Time" required>
                                             <option disabled selected>Select Available Time</option>
                                             
                                        </select>
                                        <br>
                                   </div>
                                   <div class=" col-sm-6">
									    <span style="color:red;font-weight:bold">*</span>
                                        <label for="city">City</label>
                                        <input type="text" class="form-control" id="city" name="city" value={{$data->city}} readonly minlength="11" maxlength="11">
							     <br>
                                   </div>

                                   <div class=" col-sm-6">
									    <span style="color:red;font-weight:bold">*</span>
                                        <label for="telephone">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" value={{$data->contact_number}} readonly minlength="11" maxlength="11">
								 <br>  
                                   </div>

                                   <div class=" col-sm-6">
									    <span style="color:red;font-weight:bold">*</span>
                                        <label for="Message">CNIC</label>
                                        <input type="tel" class="form-control" id="cnic" name="cnic" value={{$data->cnic}} readonly minlength="13" maxlength="13">
                                        <br>
                                   </div>
                                            
                                   </div>
                                   <div class="col-md-12   col-sm-6 text-center">
									  <br><br>
                                                 <button type="submit" class="btn btn-sl btn-info" id="cf-submit" name="submit">Save</button>
                                                 <a class="btn btn-sl btn-info" href="{{url('appointmentDetails')}}">Cancel</a>
                                   </div>
                              </div>
                         @endforeach
                        </form>
                       
                    </div>
               </div>
        </div>
    </div>

   <br/> <br/> <br/>
@endsection 