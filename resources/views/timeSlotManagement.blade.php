@extends('layouts.clinicUser')
@include('flash-message')
@section('content')
<br/> <br/> <br/>



<div class="page-wrapper">
    <div class="content  text-center">
        <div class="row">
            <div class="col-lg-8 offset-lg-2">
                <h2 class="page-title text-center">Manage Time Slots</h2>
            </div>
        </div>
        <div class="table-responsive ">
            <table class="table table-striped w-auto" >
                <tr>
                <th>Appointment Date</th>
                <th>Appointment Time</th>
                <th>Staus</th>
                </tr>
            @foreach($slots as $data)
            {!! Form::open(['url' => '/updatetimeslot', 'method' => 'POST']) !!}
            @csrf    
                <tr>    
                <td>{{$data->date}}</td>
                <td>{{$data->slot_time}}</td>
                <td>
                <input type="radio"  id="option1" name="availability" value="1"  {{ ($data->availability=="1")? "checked" : "" }} >Yes</label>
                <input type="radio" id="option2" name="availability" value="0" {{ ($data->availability=="0")? "checked" : "" }} >No</label>
                                </td>
                <td>
                {{ Form::hidden('date', $data->date) }}
                {{ Form::hidden('slot_time', $data->slot_time) }}
          
                {!! Form::submit('Update', ['class' => 'btn btn-sl btn-info'] ) !!} </td>
                
                
                </tr>
                {!! Form::close()  !!}       
            @endforeach
            
            </table>

        </div>

   <br/> <br/> <br/>
@endsection 