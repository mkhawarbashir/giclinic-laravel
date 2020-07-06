@extends('layouts.clinicUser')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="page-title">Appointment Data Form</h2>
            </div>
        </div>
        <div class="col-md-6 col-sm-6">
                         <!-- CONTACT FORM HERE -->
                         <form id="appointment-form" role="form" method="post" action="/newappointmentsubmit">
                         @csrf
                              <!-- SECTION TITLE -->
                              <!-- <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Make an appointment</h2>
                              </div> -->

                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-6 col-sm-6">
                                        <span style="color:red;font-weight:bold">*</span>
									    <label for="name">First Name</label>
                                        <input type="text" class="form-control" id="fname" name="fname" placeholder="First Name" required>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
									    <span style="color:red;font-weight:bold">*</span>
                                        <label for="name">Last Name</label>
                                        <input type="text" class="form-control" id="lname" name="lname" placeholder="Last Name" required>
                                   </div>

                                   <div class="col-md-6 col-sm-6 ">
									    <span style="color:red;font-weight:bold">*</span>
                                        <label for="date">Select Appointment Date</label>
                                        <input type="text" name="datepicker" id="datepicker" value="" class="form-control dynamic" required placeholder="-- Select Date --">
                                        
                                   </div>

                                   <div class="col-md-6 col-sm-6">
                                                  <span style="color:red;font-weight:bold">*</span>
                                        <label for="select">Select Time</label>
                                        <select class="form-control" id="time" name="time" placeholder="Select Available Time">
                                             <option disabled selected>Select Available Time</option>
                                             
                                        </select>
                                   </div>
                                   {{ csrf_field() }}

								   <div class="col-md-6 col-sm-6">
                                           <span style="color:red;font-weight:bold">*</span>
                                        <label for="select">Select City</label>
                                        <select class="form-control" id="city" name="city">
                                             <option>Lahore</option>
                                             <option>Gujranwala</option>
                                             <option>Kasur</option>
                                             <option>Sahiwal</option>
											 <option>Okara</option>
                                             <option>Pattoki</option>
                                             <option>Sialkot</option>
                                             <option>Muridkey</option>
											 <option>Rawalpindi</option>
                                             <option>Jehlum</option>
                                             <option>Gujrat</option>
                                             
                                        </select>
                                   </div>

                                   <div class="col-md-6 col-sm-6">
									    <span style="color:red;font-weight:bold">*</span>
                                        <label for="telephone">Phone Number</label>
                                        <input type="tel" class="form-control" id="phone" name="phone" placeholder="Phone" required minlength="11" maxlength="11">
								   </div>

                                   <div class="col-md-6 col-sm-6">
									    <span style="color:red;font-weight:bold">*</span>
                                        <label for="Message">CNIC</label>
                                        <input type="tel" class="form-control" id="cnic" name="cnic" placeholder="35200xxxxxxxx" required minlength="13" maxlength="13">
									</div>

                                   <div class="col-md-12 col-sm-6">
									    <button type="submit" class="form-control" id="cf-submit" name="submit">Submit Appointment</button>
                                   </div>
                              </div>
                        </form>
                       
                    </div>
        </div>
    </div>

   <br/> <br/> <br/>
@endsection 