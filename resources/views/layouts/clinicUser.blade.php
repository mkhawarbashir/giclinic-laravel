<!DOCTYPE html>
<html lang="en">
<head>

     <title>GI Clinic</title>
     <meta charset="UTF-8">
     <meta http-equiv="X-UA-Compatible" content="IE=Edge">
     <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

     
     <script src="{{asset('/js/jquery.min.js')}}"></script>
     
     
	 <link rel="stylesheet" href="{{ asset('/css/style.css') }}">
   <link rel="stylesheet" href="{{ asset('/css/template.css') }}">

     <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap.min.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('/css/font-awesome.min.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('/css/custom.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('/css/verticalNavBar.css') }}">
     <link rel="stylesheet" type="text/css" href="{{ asset('/css/bootstrap-datepicker.css') }}">
     
     
     <script src="js/bootstrap-multiselect.js"></script>
     
     
    <style>
    .sidenav {
        position: fixed;
        width: 300px;
        }
    .topnav-right{

        float:right;
    }

    </style>
<script>
</script>


</head>
<body>
		
		<div id="leftbar" class="wrapper d-flex align-items-stretch">
			<nav id="sidebar">
			<div class="p-4 pt-5 sidenav">
		  		<a href="#" class="img logo rounded-circle mb-5" style="background-image: url(images/logo.png);"></a>
	        <ul class="list-unstyled components mb-5 nav1">
              <li >
                <a href="/">Website Home</a>
	          </li>
              <li class="{{ Request::path() == 'appointmentDetails' ? 'active' : '' }}">
                <a href="appointmentDetails">Clinic Home</a>
	          </li>
	          <li class="{{ Request::path() == 'newPatientDataForm' ? 'active' : '' }}">
	            <a href="newPatientDataForm">Add New Patient</a>
	          </li>
	          <li class="{{ Request::path() == 'newAppointmentwithID' ? 'active' : '' }}">
                <a href="newAppointmentwithID">Make New Appointment</a>
	          </li>
	          <li class="{{ Request::path() == 'newTestDataForm' ? 'active' : '' }}">
                <a class="nav-link" href="newTestDataForm">Add New Test</a>
            </li>
            <li class="{{ Request::path() == 'newDiseaseDataForm' ? 'active' : '' }}">
                <a class="nav-link" href="newDiseaseDataForm">Add New Disease</a>
            </li>
            <li class="{{ Request::path() == 'newMedicineDataForm' ? 'active' : '' }}">
                <a class="nav-link" href="newMedicineDataForm">Add New Medicine</a>
            </li>
            <li class="{{ Request::path() == 'timeSlotForm' ? 'active' : '' }}">
                <a class="nav-link" href="timeSlotForm">Time Slot Settings</a>
            </li>
            <li class="{{ Request::path() == 'managetimeslot' ? 'active' : '' }}">
                <a class="nav-link" href="managetimeslot">Time Slot Management</a>
            </li>
	        </ul>

	        

	      </div>
    	</nav>
    
      <div id="content" class="p-4 p-md-5">

        <nav class="navbar navbar-expand-lg navbar-light bg-light navbar-static-top">
          <div class="container-fluid">

            <button type="button" id="sidebarCollapse" class="btn btn-primary">
              <i class="fa fa-bars"></i>
              <span class="sr-only">Toggle Menu</span>
            </button>
            <button class="btn btn-dark d-inline-block d-lg-none ml-auto" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                <i class="fa fa-bars"></i>
            </button>
            
            <div class="collapse navbar-collapse" id="navbarSupportedContent">
              <ul class="nav navbar-nav col-lg-9 ml-auto ">
                <li class="nav-item">
                    <a class="nav-link" href="/">Website Home</a>
                </li>
                <li  class="{{ Request::path() == 'appointmentDetails' ? 'active' : '' }}">
                    <a class="nav-link" href="appointmentDetails">Clinic Home</a>
                </li>
                <li class="{{ Request::path() == 'viewAllPatientsForm' ? 'active' : '' }}">
                    <a class="nav-link" href="viewAllPatientsForm">View All Patients</a>
                </li>
                <li class="{{ Request::path() == 'newAppointmentwithID' ? 'active' : '' }}">
                    <a class="nav-link" href="newAppointmentwithID">Make New Appointment</a>
                </li>
                <ul class="navbar-nav col-lg-1 ml-auto">
                    <li class="{{ Request::path() == 'docDashboardData' ? 'active' : '' }}">
                        {!! Form::open(['url' => '/docDashboardData', 'method' => 'POST']) !!}
                        @csrf
                        {{ Form::hidden('status', 'Arrived') }}
                        {!! Form::submit('Doctor Dashboard', ['class' => 'btn btn-sl btn-info'] ) !!}
                        
                        {!! Form::close()  !!}
                    </li>
                </ul>
              </ul>
            </div>
          </div>
        </nav>
        

    

    @yield('content')

    

    <div class="footer">
        @section('footer')
            <!-- FOOTER -->
            <div id="copyright">© Copyright 2020 GI Clinic</div>

            <!-- SCRIPTS <script src="js/bootstrap-select.js"></script>-->
            <script src="js/jquery.min.js"></script>
            <script src="js/bootstrap.min.js"></script>
            <script src="js/popper.min.js"></script>
            <script src="js/bootstrap-datepicker.js"></script>
            <script src="js/main.js"></script>
            <script src="js/popper.js"></script>

            <script type="text/javascript">
                        $('#doapicker').datepicker({
                            daysOfWeekDisabled: [0,6],
                            startDate: '+0d',
                            format: 'dd-mm-yyyy'
                            }).on('changeDate', function(e) {
                                var mydate = $(this).val();
                                console.log(mydate);
                            if(mydate) {
                                $.ajax({
                                    url: '/welcome/ajax/'+mydate,
                                    type: "GET",
                                    dataType: "json",
                                    success:function(data) {
                                        var booked = [];
                                        var all = ['06:00 pm', '06:15 pm', '06:30 pm', '06:45 pm', '07:00 pm', '07:15 pm', '07:30 pm', '07:45 pm', '08:00 pm', '08:15 pm', '08:30 pm', '08:45 pm', '09:00 pm', '09:15 pm', '09:30 pm', '09:45 pm'];
                                        
                                        var len = data.length;
                                            
                                            $("#time").empty();
                                            for( var i = 0; i<len; i++){
                                                var id = data[i]['value'];
                                                var name = data[i]['time'];
                                                booked.push(data[i]['time']);        
                                            }

                                        var available = $(all).not(booked).get();
                                        
                                        for(var j=0; j<available.length; j++){

                                            $("#time").append("<option>"+available[j]+"</option>");

                                        }

                                    }
                                });
                            }else{
                                $('select[name="time"]').empty();
                            }
                        });
                       // $("#datepicker").datepicker("setDate", '-- Select Date --');//new Date());
                        
                      
       
                $('#addRow').click(function(){
                        addRow();
                });




           function addRow()
           {
               var html = '<tr>'+
                           '<td>'+
                               '<select class="form-control select2" id="drugType" name="type[]">'+
                                   '<option value="">Type</option>'+
                                   '<option value="Inj">Injection</option>'+
                                   '<option value="Tab">Tablet</option>'+
                                   '<option value="Cap">Capsule</option>'+
                                   '<option value="Syp">Syrup</option>'+
                               '</select>'+
                           '</td>'+
                           '<td>'+
                               '<input list="medicine" name="drug[]" class="form-control" placeholder="Select Drug"/>'+
                               '<datalist id="medicine">'+
                                   '<option value="Disprin">'+
                                   '<option value="Paracetamol">'+
                                   '<option value="Dicloran">'+
                                   '<option value="Teramycin">'+
                               '</datalist>'+
                           '</td>'+
                           '<td>'+ 
                               '<input type="text" id="strength" class="form-control" placeholder="Strength" name="strength[]"/>'+
                           '</td>'+
                           '<td>'+ 
                               '<input list="dose" name="dose[]" class="form-control" placeholder="Dose"/>'+
                                   '<datalist id="dose">'+
                                        '<option value="صبح">'+
                                        '<option value="شام">'+
                                        '<option value="صبح ۔ شام">'+
                                        '<option value="صبح ۔دوپہر ۔ شام">'+
                                   '</datalist>'+
                           '</td>'+
                           '<td>'+ 
                               '<input type="text" id="duration" class="form-control" placeholder="Duration" name="duration[]"/>'+
                           '</td>'+
                           '<td>'+ 
                               '<input type="text" id="drug_advice" class="form-control" placeholder="Advice" name="advices[]"/>'+
                           '</td>'+
                           '<td style="text-align:center"><a href="#" name="addRow" id="addRow" class="btn btn-danger remove">-</a></td>'+
                       '</tr>';
                    $('tbody').append(html);
                }

                $('tbody').on('click','.remove',function(){
                    $(this).parent().parent().remove();
                });
         

                function tdata(val, date){
                    alert(val+' '+date);
                    $.ajax({
                        url: '/appointDetailCat',
                        type: 'POST',
                        cache: false,
                        data: { 'cat':val, 'date': date },
                        success: function (data) { 

                                        },
                        error: function (data) {   
                                        }
                        });

                    
                }

                
                   
                </script>


    </div>

</body>
</html>