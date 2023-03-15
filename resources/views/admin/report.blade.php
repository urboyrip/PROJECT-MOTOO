@extends('layouts.admin_main')
@section('container')
<div style="padding-top:20px;margin-left:228px;margin-bottom:25px;"> 
    <a href="/"> Home </a> / <span style="color:red"> Report </span>
</div>

<div class="container">
    <div class="row" style="margin-bottom:25px;">
        <div class="col-md-2">
            <div id="app-review-card">
                <span style="margin-right:8px;border-radius:4px;width:40px;height:40px;float:left;" >
                    <i class="fa fa-star-o fa-3x" aria-hidden="true"></i>
                </span>
                All Apps Review
                <br> <strong> {{ $review_app_all->count() }}</strong>
            </div>
        </div>
        <div class="col-md-2" style="margin-left:125px;">
            <div id="app-review-card">
                <span style="margin-right:8px;border-radius:4px;width:40px;height:40px;float:left;" >
                    <i class="fa fa-thumbs-up fa-3x" aria-hidden="true"></i>
                </span>
                Good Review Apps <br>
                <strong> {{ $review_app_all->where('Penilaian', '5')->count() }}</strong>
            </div>
        </div>
        <div class="col-md-2" style="margin-left:125px;">
            <div id="app-review-card">
                <span style="margin-right:8px;border-radius:4px;width:40px;height:40px;float:left;" >
                    <i class="fa fa-thumbs-down fa-3x" aria-hidden="true"></i>
                </span>
                Bad Review Apps <br>
                <strong> 14 </strong>
            </div>
        </div>
        <div class="col-md-2" style="margin-left:125px;">
            <div id="app-review-card">
                <span style="padding-top:8px;font-weight:bold;;text-align:center;margin-right:8px;border-radius:4px;width:40px;height:40px;float:left;" >
                    ---
                </span>
                Blank Review Apps <br>
                <strong> 14 </strong>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-2">
            <div class="ticket-status-card" style="background-color: #148A9D;height:80px;width:400px;">
                <span style="padding-left:12px;padding-top:10px;margin-right:8px;border-radius:4px;width:60px;height:93px;float:left">
                    <i class="fa fa-ticket fa-2x" aria-hidden="true"></i>
                </span>
                <h5 style="color:white">
                    Request
                    <br>
                    {{ count($request) }}
                </h5>
                <hr style="margin-top:-1px;margin-bottom:10px;">
                
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:235px;">
            <div class="ticket-status-card" style="height:80px;background-color: green;;color:black;width:400px;">
                <span style="padding-left:12px;padding-top:10px;margin-right:8px;border-radius:4px;width:60px;height:93px;float:left">
                    <i class="fa fa-exchange     fa-2x" aria-hidden="true"></i>
                </span>
                <h5>
                    Change
                    <br>
                    {{ count($jumlah_task) }}
                </h5>
                <hr  style="margin-top:-1px;margin-bottom:10px;">
                
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:235px;">
            <div class="ticket-status-card" style="height:80px;background-color: #FFC107;;color:black;width:400px;">
                <span style="padding-left:12px;padding-top:10px;margin-right:8px;border-radius:4px;width:60px;height:93px;float:left">
                    <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
                </span>
                <h5>
                    Incident
                    <br>
                    {{ count($incident) }}
                </h5>
                <hr  style="margin-top:-1px;margin-bottom:10px;">
                
            </div>
        </div>
    
    </div>
    <div class="row" style="margin-left:20px;">
        <div class="col-md-6">
            <div class="db-card-detail" style="border-top: 10px solid #148A9D;padding-top:8px">
                <h5> Total Request: {{ count($request) }} </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col"> </th>
                          <th scope="col"><font color="red">Total</font> 
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>
                                In Progress
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                0
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Resolved
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                0
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Canceled
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $ticket_request_canceled->totalPoints }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Closed
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $ticket_request_closed->totalPoints }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Aprroved
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                               {{ count($request->where('Approval_Status', 'Approved')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                SLA Realisasi (%)
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $sla_realisasi_request }} %
                            </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:75px;margin-bottom:60px;">
            <div class="db-card-detail" style="border-top:10px solid #FFC107;padding-top:8px">
                <h5> Total Incident: {{ count($incident) }} </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col"> </th>
                          <th scope="col"><font color="red">Total</font> 
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>
                                In Progress
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                0
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Resolved
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                0
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Canceled
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $ticket_incident_canceled->totalPoints }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Aprroved
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                               {{ count($incident->where('Approval_Status', 'Approved')) }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Closed
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $ticket_incident_closed->totalPoints }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                SLA Realisasi (%)
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $sla_realisasi_incident}} %
                            </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="row" style="margin-left:20px;">
        <div class="col-md-6">
            <div class="db-card-detail" style="border-top: 10px solid #148A9D;padding-top:8px;margin-top:-40px;">
                <h5> Total Change: {{ count($jumlah_task) }} </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col"> </th>
                          <th scope="col"><font color="red">Total</font> 
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                            <td>
                                In Progress
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                0
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Resolved
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                0
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Canceled
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                0
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Closed
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $task_closed->totalClosed }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                SLA Realisasi (%)
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $sla_realisasi_task }} %
                            </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection