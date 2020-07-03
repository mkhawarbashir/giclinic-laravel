@extends('layouts.clinicUser')
@section('content')
<br/> <br/> <br/> <br/> <br/>
<form action="appointmentDetail" method="post" id="dateform">
@csrf
  <div class="col-sm-6">
      <div class="form-group">
          <label>Select Date</label>
          <div class="cal-icon">
          <input type="date" name="datepicker" id="datepicker" class="form-control dynamic" required>
          <button type="submit" form="dateform" value="Submit">Submit</button>          
          </div>
      </div>

  </div>
</form>

<div class="table-responsive ">

    <table class="table table-striped w-auto" >
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>CNIC</th>
          <th>Appointment Time</th>
          <th>City</th>
          <th>Contact Number</th>
          
        </tr>
    @foreach($patient as $data)
      
        <tr>    
          <td>{{$data->first_name}}</td>
          <td>{{$data->last_name}}</td>
          <td class='ptcnic'><a href="patientData/{{$data->cnic}}">{{ $data->cnic }}</a></td>
          <td>{{$data->time}}</td>
          <td>{{$data->city}}</td>
          <td>{{$data->contact_number}}</td>
          <!-- <td>
            <button value="Submit" type="submit" form="patientForm" class="editPatient"> Patient Data </button>
            
          </td> -->

        </tr>
        
    @endforeach
    </table>

</div>
   <br/> <br/> <br/> <br/> <br/>
@endsection
