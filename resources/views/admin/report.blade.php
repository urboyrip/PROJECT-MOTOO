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
        <div class="col-md-5">
            <div class="ticket-status-card" style="background-color: #148A9D;height:110px;width:620px;">
                <span style="padding-left:12px;padding-top:20px;margin-right:8px;border-radius:4px;width:60px;height:93px;float:left">
                    <i class="fa fa-ticket fa-2x" aria-hidden="true"></i>
                </span>
                <h5 style="color:white">
                    Request
                    <br>
                    {{ $request->count() }}
                </h5>
                <hr style="margin-top:-1px;margin-bottom:10px;">
                70% Progress this month
            </div>
        </div>
        <div class="col-md-4"  style="margin-left:150px;">
            <div class="ticket-status-card" style="height:110px;background-color: #FFC107;;color:black;width:620px;">
                <span style="padding-left:12px;padding-top:20px;margin-right:8px;border-radius:4px;width:60px;height:93px;float:left">
                    <i class="fa fa-exclamation-triangle fa-2x" aria-hidden="true"></i>
                </span>
                <h5>
                    Incident
                    <br>
                    {{ $incident->count() }}
                </h5>
                <hr  style="margin-top:-1px;margin-bottom:10px;">
                70% Progress this month
            </div>
        </div>
    
    </div>
    <div class="row" style="margin-left:20px;">
        <div class="col-md-6">
            <div class="db-card-detail" style="border-top: 10px solid #148A9D;padding-top:8px">
                <h5> Total Request: {{ $request->count() }} </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Progress</th>
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
                                {{ $request->where('Request_Status', 'In Progress')->count() }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Resolved
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $request->where('Request_Status', 'Resolved')->count() }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Canceled
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $request->where('Request_Status', 'Canceled')->count() }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Closed
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $request->where('Request_Status', 'Closed')->count() }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                SLA Realisasi (%)
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                -
                            </td>
                        </tr>
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:75px;margin-bottom:60px;">
            <div class="db-card-detail" style="border-top:10px solid #FFC107;padding-top:8px">
                <h5> Total Incident: {{ $incident->count() }} </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Progress</th>
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
                                {{ $incident->where('Request_Status', 'In Progress')->count() }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                            Resolved
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $incident->where('Request_Status', 'Resolved')->count() }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Canceled
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $incident->where('Request_Status', 'Canceled')->count() }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                Closed
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                {{ $incident->where('Request_Status', 'Closed')->count() }}
                            </td>
                        </tr>
                        <tr>
                            <td>
                                SLA Realisasi (%)
                            </td>
                            <td>
                                
                            </td>
                            <td> 
                                -
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