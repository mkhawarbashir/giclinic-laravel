@extends('layouts.clinicUser')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="page-title">Welcome to Liver & Stomach Clinic</h2>
            </div>
        </div>
        <div class="row">
					<div class="col-12 col-md-6 col-lg-8 col-xl-8">
						<div class="card">
							<div class="card-header">
								<h4 class="card-title d-inline-block">Today's Appointments</h4> 
							</div>
							<div class="card-body p-0">
                            <div class="table-responsive ">
                                <table class="table table-striped w-auto" >
                                    <tr>
                                    <th class="col-lg-2">First Name</th>
                                    <th class="col-lg-2">Last Name</th>
                                    <th>Gender</th>
                                    <th class="col-lg-2">City</th>
                                    <th class="col-lg-2">Disease</th>
                                    <th class="col-lg-2">Time</th>
                                    <th class="col-lg-4">Status</th>
                                    <th>Take Up</th>
                                    </tr>
                               
                                @foreach($patient as $data)
                                {!! Form::open(['url' => '/addNewPrescription', 'method' => 'POST']) !!}
                                @csrf    
                                    <tr>    
                                    <td>{{$data->first_name}}</td>
                                    <td>{{$data->last_name}}</td>
                                    <td>{{$data->gender }}</td>
                                    <td>{{$data->city}}</td>
                                    <td>{{$data->disease}}</td>
                                    <td>{{$data->time}}</td>
                                    <td>{{$data->Status}}</td>
                                    
                                    <td>
                                    {{ Form::hidden('patient_id', $data->patient_id) }}
                                    {!! Form::submit('View', ['class' => 'btn btn-sl btn-info'] ) !!} </td>
                                    
                                    <!-- <td>
                                        <button value="Submit" type="submit" form="patientForm" class="editPatient"> Patient Data </button>
                                        
                                    </td> -->

                                    </tr>
                                    {!! Form::close()  !!}       
                                
                                @endforeach
                                </table>

                            </div>
							</div>
						</div>
					</div>
                   
				</div>


        </div>
    </div>

   <br/> <br/> <br/>
@endsection 