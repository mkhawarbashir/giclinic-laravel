@extends('layouts.clinicUser')
@section('content')
<br/> <br/> <br/> <br/> <br/>
<form action="viewAPatient" method="post" id="dateform">
@csrf
  <div class="col-sm-6">
      <div class="form-group">
          <label>Enter CNIC to Search Patient</label>
          <div class="cal-icon">
          <input type="text" name="cnic" id="cnic" class="form-control dynamic" required>
          <button type="submit" form="dateform" value="Submit">Submit</button>          
          </div>
      </div>

  </div>
</form>

<div class="col-lg-8 offset-lg-2">
    <h2 class="page-title"> Patient's Appointment Data</h2>
</div>
<div class="col-lg-8 offset-lg-2">

<h3>Patient Name: {{$name}}</h3>
</div>
<div class="table-responsive ">
    <table class="table table-striped w-auto" >
        <tr>
          <th>Sr. No.</th>
          <th>Date</th>
          <th>Time</th>
          <th>View Prescription</th>
        </tr>
    @foreach($appointment as $key => $data)
        
        <tr>    
          <td>{{$key+1}}</td>
          <td>{{$data->date}}</td>
          <td>{{$data->time }}</td>
          <td><a href="">View</a></td>
          <!-- <td>
            <button value="Submit" type="submit" form="patientForm" class="editPatient"> Patient Data </button>
            
          </td> -->

        </tr>
        
    @endforeach
    </table>

</div>
   <br/> <br/> <br/> <br/> <br/>
@endsection
