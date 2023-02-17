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
                Ticket Complete / This Day
                <h3>
                    {{ $tiket->whereIn('Request_Status',['Closed', 'Canceled'])->count() }} / {{ $tiket->count() }}
                </h3>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:125px;">
            <div class="db-card" style="border-bottom:10px solid orange">
                <span style="color:orange"><i class="fa fa-desktop fa-2x" aria-hidden="true"></i>  </span> Task Complete / This Day
                <h3>
                    {{ $task->where('task_status','Closed')->count() }} / {{ $task->count() }}</h3>
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
            <div class="db-card-detail" style="border-top: 10px solid green">
                <h5> Top 5 Most Ticket this Week (Technician)</h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Ticket Close</th>
                          <th scope="col">Total Ticket</th>
                          <th scope="col"><font color="red">More</font> 
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($teknisi_tiket as $teknisi)
                        <tr>
                            <td>
                                {{ $teknisi->user->Nama_User }}
                            </td>
                            <td>
                                {{ $tiket->where('user_id', $teknisi->user_id)->where('Request_Status', 'Closed')->count() }}
                            </td>
                            <td> 
                                {{ $tiket->where('user_id', $teknisi->user_id)->count() }}
                            </td>
                            <td> 
                                <i class="fa fa-search-plus"></i>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <div style="margin-top:-30px;float:right">
                    {{ $teknisi_tiket->links() }}
                </div> --}}
                </div>
            </div>
        </div>
        <div class="col-md-2"  style="margin-left:75px;">
            <div class="db-card-detail" style="border-top:10px solid #FFC107">
                <h5> Top 5 Most Task this Week (Technician) </h5>
                <div class="table-responsive">
                    <table class="table table-striped table-sm">
                      <thead>
                        <tr>
                          <th scope="col">Name</th>
                          <th scope="col">Ticket Close</th>
                          <th scope="col">Total Ticket</th>
                          <th scope="col"><font color="red">More</font> 
                        </tr>
                      </thead>
                      <tbody>
                        @foreach($teknisi_task as $task)
                        <tr>
                            <td>
                                {{ $task->user->Nama_User }}
                            </td>
                            <td>
                                {{ $task->where('user_id', $task->user_id)->where('Task_Status', 'Closed')->count() }}
                            </td>
                            <td> 
                                {{ $task->where('user_id', $task->user_id)->count() }}
                            </td>
                            <td> 
                                <i class="fa fa-search-plus"></i>
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