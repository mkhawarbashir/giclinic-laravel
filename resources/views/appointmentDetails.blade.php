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
<div>
<br><br><br><br><br>
<h3>Appointments for: {{$date}}</h3>
</div>
<div class="table-responsive ">
    <table class="table table-striped w-auto" >
        <tr>
          <th>First Name</th>
          <th>Last Name</th>
          <th>CNIC</th>
          <th>Appointment Time</th>
          <th>City</th>
          <th>Contact Number</th>
          <th>Personal Data</th>
          <th>Appointment Data</th>
        </tr>
  
    @foreach($patient as $data)
    {!! Form::open(['url' => '/patientData', 'method' => 'POST']) !!}
 @csrf
        
        <tr>    
          <td>{{$data->first_name}}</td>
          <td>{{$data->last_name}}</td>
          <td>{{ $data->cnic }}</td>
          <td>{{$data->time}}</td>
          <td>{{$data->city}}</td>
          <td>{{$data->contact_number}}</td>
          <td>{{ Form::hidden('id', $data->patient_id) }}
          {!! Form::submit('View', ['class' => 'btn btn-sl btn-info'] ) !!} </td>
          <td>{{ Form::hidden('patID', $data->patient_id) }}
          {{ Form::hidden('apptID', $data->appointment_id) }}
          {{ Form::hidden('first_name', $data->first_name) }}
          {{ Form::hidden('last_name', $data->last_name) }}
          {{ Form::hidden('date', $data->date) }}
          {{ Form::hidden('time', $data->time) }}
          {!! Form::submit('View', ['class' => 'btn btn-sl btn-info', 'formaction'=> '/updateAppt'] ) !!} </td>
        
          <!-- <td>
            <button value="Submit" type="submit" form="patientForm" class="editPatient"> Patient Data </button>
            
          </td> -->

        </tr>
        {!! Form::close()  !!}    
        
    @endforeach
    </table>

</div>
   <br/> <br/> <br/> <br/> <br/>
@endsection
