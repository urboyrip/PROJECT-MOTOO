@extends('layouts.admin_main')
@section('container')
<div style="padding-top:20px;margin-left:228px;margin-bottom:25px;"> 
    <a href="/"> Home </a> / <span style="color:red"> Dashboard </span>
</div>
<div class="container">
    <div class="row" style="">
        <div class="col-md-2">
            <div class="db-card" style="border-bottom:10px solid #006EE5">
                <span style="color:#006EE5"><i class="fa fa-desktop fa-2x" aria-hidden="true"></i>  </span> Apps Support
                <h3>
                    {{ $application->count() }}
                </h3>
            </div>
        </div>
        <div class="col-md-2" style="margin-left:125px;">
            <div class="db-card" style="border-bottom:10px solid green">
                <span style="color:green"><i class="fa fa-bar-chart fa-2x" aria-hidden="true"></i> </span>
                Ticket Complete / All Ticket
                <h3>
                    {{ $tiket_complete }} / {{ count($tiket_api) }}
                </h3>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:125px;">
            <div class="db-card" style="border-bottom:10px solid orange">
                <span style="color:orange"><i class="fa fa-desktop fa-2x" aria-hidden="true"></i>  </span> Task Complete / All Task
                <h3>
                    {{ $task_complete->totalClosed }} / {{ count($task_api) }}</h3>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:125px;">
            <div class="db-card" style="border-bottom:10px solid #148A9D">
                <span style="color:#148A9D"><i class="fa fa-star fa-2x" aria-hidden="true"></i>  </span> Apps in Review
                <h3>
                    {{ $review_aplikasi->count() }}
                </h3>
            </div>
        </div>
    </div>
    <div class="row" style="margin-left:20px;">
        <div class="col-md-6">
            <div class="db-card-detail" style="margin-top:25px;border-top: 10px solid green">
                <h5> Top 5 Most Ticket this Week (Technician)</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col"></th>
                          <th scope="col">Total Ticket</th>
                          <th scope="col"><font color="red">More</font> 
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($teknisi_tiket->slice(0, 5) as $tiket)
                        <tr>
                            <td>
                                {{ $tiket->Technician }}
                            </td>
                            <td>
                            </td>
                            <td> 
                                {{ $tiket->totalTechnician }}
                            </td>
                            <td> 
                                <a href="/dashboard/detail_tiket_teknisi/{{ $tiket->Technician }}"> <i class="fa fa-search-plus"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                </div>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:75px;">
            <div class="db-card-detail" style="margin-top:25px;border-top:10px solid #FFC107">
                <h5> Top 5 Most Task this Week (Technician) </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                
                          <th scope="col">Total Ticket</th>
                          <th scope="col"><font color="red">More</font> 
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($teknisi_task->slice(0, 5) as $task)
                        <tr>
                            <td>
                                {{ $task->Technician }}
                            </td>
                 
                            <td> 
                                {{ $task->totalTechnician }}
                            </td>
                            <td> 
                                <a href="/dashboard/detail_task_teknisi/{{ $task->Technician }}"> <i class="fa fa-search-plus"></i> </a>
                            </td>
                        </tr>
                        @endforeach
                      </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
    

@endsection