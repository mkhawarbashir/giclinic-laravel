@extends('layouts.clinicUser')
@include('flash-message')
@section('content')
<br/> <br/> <br/>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-4">
                <h4>

                Liver & Stomach Clinic <br>
                2-Zafar Ali Road, <br>
                Gulberg 5, Lahore. <br>
                Email: giclinic@hotmail.com <br>
                www.liverandstomachclinic.com

                </h4>
            </div>
            
            <div class="col-sm-4" >
                <img src="images\logo.png" height="160" width="200">
            </div>
            
            <div class="col-sm-4" >
            <h4>

                Dr. Muhammad Imran <br>
                M.B.B.S., F.C.P.S. <br>
                Professor of Medicine, <br>
                SIMS / Services Hospital, Lahore <br>
                Consultant Physician <br>
                Hepatologist & Gastroenterologist

            </h4>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="col-sm-6" style="text-align: center">
        <br><br><br>
            <h4>Mr. {{$patient_fname}} {{$patient_lname}}</h4>
        </div>

        <div class="col-sm-6" style="text-align: center">
        <br><br><br>
            <h4>
                <script> document.write(new Date().toDateString()); </script>
            </h4>
        </div>
    </div>
    <div class="row">
    
        <div class="col-sm-8">
        <br><br>
        <h2>Rx</h2>
            <div class="col-sm-1">
            </div>
            <div class="col-sm-7">
            
            <table  class="table table-striped">
            @foreach($pdrug as $data)
            <tr>
                <td style="padding:10px">{{$data->drug_type}}</td>
                <td style="padding:10px">{{$data->drug_name}}</td>
                <td style="padding:10px">{{$data->drug_strength}}</td>
                <td style="padding:10px">{{$data->drug_dose}}</td>
                <td style="padding:10px">{{$data->drug_duration}}</td>
                <td style="padding:10px">{{$data->drug_advice}}</td>
            </tr>

            @endforeach
            </table>
            </div>
        </div>
        <div class="col-sm-4">
        <br><br>
        <h3>Lab Tests</h3>
        <h4>{{$tests}}</h4>
        </div>
    
    </div>
    <br><br><br>
    <h4>Next Visit Date: {{$next_visit_date}}</h4>
    <!-- <form action="docDashboardData" method="post">
    <input type="hidden" name="status" value="Arrived"/>
    <div class="text-center">
        
        <input type="submit" name="close" class="btn btn-sl btn-info" value="Close" />
        <input type="button" name="print" class="btn btn-sl btn-info" value="Print" onclick="window.print();" />

    </div>          
    </form> -->
    <br/> <br/> <br/>

   
@endsection 