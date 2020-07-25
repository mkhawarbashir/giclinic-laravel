@extends('layouts.clinicUser')
@section('content')
<br/> <br/> <br/>

<!-- Left Sidebar End -->                
<div class="content-page">
            <div class="content">
                <div class="container-fluid">
                    <div class="row">
                        
    
    <div class="col-md-12">
        <div class="card">
            <div class="card-header card-header-icon">
                <b class="ti-write" style="font-size: 30px;">Prescription for {{$patient_fname}} {{$patient_lname}}</b>
                
            </div>
            <div class="col-md-12">
            <form action="prescriptionData" method="post" id="addDrugToListForm">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group-custom">
                            <br><br>
                            <label class="control-label">Chief Complains</label><i class="bar"></i>
                            <textarea required="required" name="chiefComp" rows="2"></textarea>
                        </div>
                        <div class="form-group-custom">
                            <label class="control-label">On examinations</label><i class="bar"></i>
                            <textarea required="required" name="examination" rows="2"></textarea>
                        </div>
                        <div class="form-group-custom">
                            <label class="control-label">Provisional Diagnosis</label><i class="bar"></i>
                            <textarea required="required" name="proDiagnosis" rows="2"></textarea>
                            </div>
                        <div class="form-group-custom">
                            <label class="control-label">Differential diagnosis</label><i class="bar"></i>
                            <textarea required="required" name="diffDiagnosis" rows="2"></textarea>
                        </div>
                        <div class="form-group-custom">
                            <label class="control-label">Lab Tests</label><i class="bar"></i><br>
                            <textarea required="required" name="labTests" rows="2"></textarea>
                        </div>
                        <div class="form-group-custom">
                            <label class="control-label">Advices</label><i class="bar"></i><br>
                            <textarea id="advice" required="required" name="advice"></textarea>
                        </div>
                        <div class="form-group-custom">
                            <label class="control-label">Next Visit</label><i class="bar"></i><br>
                            <input type="date" name="nxtVisitDate">
                        </div>

                    </div>
                    <div class="col-md-9">
                        <h3>Rx</h3>
                        <!-- <form action="" method="post" id="addDrugToListForm"> -->
                            <div class="row">
                                <table id="drugTable">
                                    <thead>
                                        <tr>
                                            <th>Type</th>
                                            <th>Drug Name</th>
                                            <th>Strength</th>
                                            <th>Dose</th>
                                            <th>Duration</th>
                                            <th>Advice</th>
                                            <th style="text-align: center"><a href="#" name="addRow" id="addRow" class="btn btn-info addRow">+</a></th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                        <td>
                                            <select class="form-control select2" id="drugType">
                                                <option value="">Type</option>
                                                <option value="Inj">Injection</option>
                                                <option value="Tab">Tablet</option>
                                                <option value="Cap">Capsule</option>
                                                <option value="Syp">Syrup</option>
                                            </select>
                                        </td>
                                        <td>
                                            <input list="medicine" name="drug" class="form-control" placeholder="Select Drug"/>
                                            <datalist id="medicine">
                                                <option value="Disprin">
                                                <option value="Paracetamol">
                                                <option value="Dicloran">
                                                <option value="Teramycin">
                                            </datalist>
                                        </td>
                                        <td> 
                                            <input type="text" id="strength" class="form-control" placeholder="Strength"/>
                                        </td>
                                        <td> 
                                            <input list="dose" name="dose" class="form-control" placeholder="Dose"/>
                                                <datalist id="dose">
                                                    <option value="0+0+1">
                                                    <option value="0+1+0">
                                                    <option value="0+1+1">
                                                    <option value="1+0+0">
                                                    <option value="1+1+0">
                                                    <option value="1+0+1">
                                                    <option value="1+1+1">
                                                </datalist>
                                        </td>
                                        <td>
                                            <input type="text" id="duration" class="form-control" placeholder="Duration"/>
                                        </td>
                                        <td> 
                                            <input type="text" id="drug_advice" class="form-control" placeholder="Advice"/>
                                        </td>
                                        <td style="text-align:center"><a href="#" name="addRow" id="addRow" class="btn btn-danger remove">-</a></td>
                                    </tr>
                                    </tbody>
                                    <tfoot class="text-center">
                                        <tr>
                                            <td colspan="6">
                                            <!-- @csrf
                                            <input type="submit" name="save" id="save" class="btn btn-sl btn-info" value="Save" />
                                            <input type="submit" name="cancel" id="cancel" class="btn btn-sl btn-info" value="Cancel" />
                                            </td> -->
                                        </tr>
                                    </tfoot>
                                       
                                </table>
                            </div>
                            <hr>
                            @csrf
                            <div class="text-center">
                                            <input type="submit" name="save" id="save" class="btn btn-sl btn-info" value="Save" />
                                            <input type="submit" name="cancel" id="cancel" class="btn btn-sl btn-info" value="Cancel" />
                            </div>          

                        </form>

                        
                        <!-- <table>
                            <thead>
                                <tr>
                                    <th> Sr. # </th>
                                    <th> Type</th>
                                    <th> Drug Name</th>
                                    <th> Strength </th>
                                    <th> Dose </th>
                                    <th> Duration </th>
                                    <th> Advice </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if(isset($data))
                                    @foreach($project_data as $key => $data)
                                    <tr>
                                        <td> {{$key+1}} </td>
                                        <td> {{$data->type}} </td>
                                        <td> {{$data->drug}} </td>
                                        <td> {{$data->strength}} </td>
                                        <td> {{$data->dose}} </td>
                                        <td> {{$data->duration}} </td>
                                        <td> {{$data->advice}} </td>
                                    </tr>
                                    @endforeach
                                @endif
                            </tbody>
                        </table> -->

                    </div>

                    
                </div>
            </div>

            <!-- <div class="row">
                
                <div class="col-md-6">
                    <button onclick="$(this).savePrescription();"
                            class="btn btn-block btn-lg btn-inverse waves-effect waves-light">Save & Print
                        <i id="loadingSavePrescription" class="fa fa-refresh fa-spin"></i>
                    </button>
                </div>
            </div> -->

        </div>
    </div>


   <br/> <br/> <br/>

   
@endsection 