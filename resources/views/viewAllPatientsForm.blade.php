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
    <h2 class="page-title"> Patients Data</h2>
</div>

<div class="table-responsive ">
    <table class="table table-striped w-auto" >
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>CNIC</th>
          <th>Date of Birth</th>
          <th>Gender</th>
          <th>City</th>
          <th>Contact Number</th>
          <th>Disease</th>
          
        </tr>
    @foreach($patient as $data)
        
        <tr>    
          <td>{{$data->first_name}}</td>
          <td>{{$data->last_name}}</td>
          <td>{{ $data->cnic }}</td>
          <td>{{$data->dob}}</td>
          <td>{{$data->gender}}</td>
          <td>{{$data->city}}</td>
          <td>{{$data->contact_number}}</td>
          <td>{{$data->disease}}</td>
          <!-- <td>
            <button value="Submit" type="submit" form="patientForm" class="editPatient"> Patient Data </button>
            
          </td> -->

        </tr>
        
    @endforeach
    </table>

</div>
   <br/> <br/> <br/> <br/> <br/>
@endsection
