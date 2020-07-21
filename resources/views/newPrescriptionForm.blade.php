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
                <i class="ti-write" style="font-size: 30px;">Add New Prescription for {{$patient_name}}</i>
            </div>
            <div class="col-md-12">
                <div class="row">
                    <div class="col-md-3">
                        <div class="form-group-custom">
                            <br><br>
                            <label class="control-label">Chief Complains</label><i class="bar"></i>
                            <textarea required="required" id="cc" rows="3"></textarea>
                        </div>
                        <div class="form-group-custom">
                            <label class="control-label">On examinations</label><i class="bar"></i>
                            <textarea required="required" id="oe" rows="3"></textarea>
                        </div>
                        <div class="form-group-custom">
                            <label class="control-label">Provisional Diagnosis</label><i class="bar"></i>
                            <textarea required="required" id="pd" rows="3"></textarea>
                            </div>
                        <div class="form-group-custom">
                            <label class="control-label">Differential diagnosis</label><i class="bar"></i>
                            <textarea required="required" id="dd" rows="3"></textarea>
                        </div>
                        <div class="form-group-custom">
                            <label class="control-label">Lab Workup</label><i class="bar"></i>
                            <textarea required="required" id="lab_worekup" rows="3"></textarea>
                        </div>
                        <div class="form-group-custom">
                            <label class="control-label">Advices</label><i class="bar"></i><br>
                            <textarea id="advice" required="required"></textarea>
                        </div>
                        <div class="form-group-custom">
                            <label class="control-label">Next Visit</label><i class="bar"></i>
                            <input id="next_visit" required="required">
                        </div>

                    </div>
                    <div class="col-md-9">
                        <h3>Rx</h3>
                        <form action="" method="post" id="addDrugToListForm">
                            <div class="row">
                                <div class="col-md-2">
                               
                                    <select class="form-control select2" id="drugType">
                                        <option value="">Type</option>
                                        <option value="Inj">Injection</option>
                                        <option value="Tab">Tablet</option>
                                        <option value="Cap">Capsule</option>
                                        <option value="Syp">Syrup</option>
                                    </select>
                                        
                               
                                </div>
                                <div class="col-md-3">
                                    
                                        <input list="medicine" name="drug" class="form-control" placeholder="Select Drug"/>
                                        <datalist id="medicine">
                                            <option value="Disprin">
                                            <option value="Paracetamol">
                                            <option value="Dicloran">
                                            <option value="Teramycin">
                                        </datalist>
                                    
                                </div>
                                
                                <div class="col-md-2">
                                    <!-- <div class="form-group-custom"> -->
                                        <input type="text" id="strength" class="form-control" placeholder="Strength"/>
                                        <br>
                                    </div>
                                <!-- </div> -->
                            <!-- </div> -->

                            <!-- <div class="row"> -->

                                <div class="col-md-2">
                                    <div class="form-group-custom">
                                        
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
                                    </div>
                                </div>
                                <div class="col-md-3">
                                    <div class="form-group-custom">
                                        <input type="text" id="duration" class="form-control" placeholder="Duration"/>
                                        <br>
                                    </div>
                                </div>
                            <!-- </div> -->
                            <!-- <div class="row"> -->
                                <div class="col-md-9">
                                    <div class="form-group-custom">
                                        <input type="text" id="drug_advice" class="form-control" placeholder="Advice"/>
                                        <br>
                                    </div>
                                </div>
                            
                            <div>
                                <button type="submit" class="btn btn-sl btn-info" data-dismiss="modal">Add Drug
                                    in prescription
                                </button>
                            </div>
                            </div>
                        </form>

                        <hr>
                        <table>
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
                        </table>

                    </div>

                    
                </div>
            </div>

            <div class="row">
                
                <div class="col-md-6">
                    <button onclick="$(this).savePrescription();"
                            class="btn btn-block btn-lg btn-inverse waves-effect waves-light">Save & Print
                        <i id="loadingSavePrescription" class="fa fa-refresh fa-spin"></i>
                    </button>
                </div>
            </div>

        </div>
    </div>

    <!--  Modal content for the above example -->
<style>
    .close{
        position: absolute;
        right: 0;
        top:0;
        padding: 15px;
    }
</style>


   <br/> <br/> <br/>
@endsection 