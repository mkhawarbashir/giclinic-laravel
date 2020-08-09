@extends('layouts.clinicUser')
@include('flash-message')
@section('content')
<br/> <br/> <br/> <br/> <br/>
<form action="appointmentDetail" method="post" id="dateform">
@csrf
  <div class="col-sm-6">
      <div class="form-group">
          <label>Select Date</label>
          <div class="cal-icon">
            <input type="date" name="datepicker" id="datepicker" class="form-control dynamic">
          </div>
          <div>
            <select name="cat" id="cat" class="col-sm-9 form-control cat">
              <option value="All">All Patients</option>
              <option value="Not Arrived">Not Arrived</option>
              <option value="Arrived">Arrived</option>
              <option value="Checked">Checked</option>
            </select>
          </div>
          <div>
          <input type="hidden" id="date" name="date" value="{{$date}}">
          <button type="submit" class="col-sm-3  form-control btn btn-sl btn-info" form="dateform" value="Submit">Submit</button>              
          </div>
      </div>
      
  </div>
</form>
<div>
<br><br><br><br><br>
<h3>Appointments for {{$status}} Patients on {{$date}}</h3>

    
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
          <th>Status</th>
          <th>Personal Detail</th>
          <th>Appointment Status</th>
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
          <td><select name="status" id="status">
              <option value={{$data->Status}}>{{$data->Status}}</option>
              <option value="Not Arrived">Not Arrived</option>
              <option value="Arrived">Arrived</option>
              <option value="Checked">Checked</option>
            </select></td>
          <td class="text-center">{{ Form::hidden('id', $data->patient_id) }}
          {!! Form::submit('Edit', ['class' => 'btn btn-sl btn-info'] ) !!} </td>
          <td class="text-center">{{ Form::hidden('patient_id', $data->patient_id) }}
          {{ Form::hidden('appointment_id', $data->appointment_id) }}
          {{ Form::hidden('first_name', $data->first_name) }}
          {{ Form::hidden('last_name', $data->last_name) }}
          {{ Form::hidden('date', $data->date) }}
          {{ Form::hidden('time', $data->time) }}
          {!! Form::submit('Update', ['class' => 'btn btn-sl btn-info', 'formaction'=> '/updateAppointment'] ) !!} </td>
        
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
