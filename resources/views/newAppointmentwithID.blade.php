@extends('layouts.clinicUser')

@include('flash-message')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="page-title text-center">Make Appointment with ID</h2><br>
            </div>
        </div>
        
        <div class="row">
        <div class="col-lg-8 offset-lg-2">
                         <!-- CONTACT FORM HERE -->
                        
                         <form id="appointment-form" role="form" method="post" action="appointmentwithCNIC">
                         @csrf
                              <!-- SECTION TITLE -->
                              <!-- <div class="section-title wow fadeInUp" data-wow-delay="0.4s">
                                   <h2>Make an appointment</h2>
                              </div> -->
                         <div class="row">
                              <div class="wow fadeInUp" data-wow-delay="0.8s">
                                   <div class="col-md-12 col-sm-12">
                                        <span style="color:red;font-weight:bold">*</span>
									    <label for="name">Enter CNIC</label>
                                        <input type="text" class="form-control" id="cnic" name="cnic" placeholder="CNIC" required minlength="13" maxlength="13">
                                        <br>
                                   </div>
                              <div class="col-md-12   col-sm-6 text-center">
									  <br><br>
                                                 <button type="submit" class="btn btn-sl btn-info" id="cf-submit" name="submit">Open Form</button>
                                                 <a class="btn btn-sl btn-info" href="{{url('appointmentDetails')}}">Cancel</a>
                                   </div>
                              </div>
                        </form>
                       
                    </div>
               </div>
        </div>
    </div>

   <br/> <br/> <br/>
@endsection 