@extends('layouts.admin_main')
@section('container')
<div style="padding-top:20px;margin-left:228px;margin-bottom:25px;"> 
    <a href="/"> Home </a> / <a href="/dashboard">Dashboard </a>/ <span style="color:red">{{ $request }} </span>
</div>

<div id="detail_teknisi_box">
    <div>
        <h4>
            Daftar Tiket oleh {{ $request }}
        </h4>
        <hr>
        <div class="table-responsive" style="border-radius:5px;">
            <table class="table table-striped table-sm">
              <thead style="color:white;vertical-align:middle;background-color:#BF2C45">
                <tr>
                    <th> No </th>
                    <th style="width:250px;text-align:left" scope="col">Subject</th>
                    <th style="width:200px;" scope="col">Request Type</th>
                    <th style="width:200px;"scope="col">Request Status</th>
                    <th style="width:200px;"scope="col">Approval Status</th>
                    <th scope="col">Created At</th>
                    <th style="width:200px;" scope="col">Due By Time</th>
                    <th scope="col">SLA Time</th>
                    <th style="width:200px;" scope="col">Site</th>
                </tr>
              </thead>
              <?php 
                $no = 1
              ?>
              <tbody>
                @foreach($tiket as $tiket)
                <tr>
                    <td style="background-color:gray">
                        {{ $no }}.
                    </td>
                    <td style="text-align:left">
                        {{ $tiket->Subject }}
                    </td>
                    <td>
                        {{ $tiket->Request_Type }}
                    </td>
                    <td>
                        {{ $tiket->Request_Status }}
                    </td>
                    <td>
                        {{ $tiket->Approval_Status }}
                    </td>
                    <td>
                        {{ $tiket->Created_Time }}
                    </td>
                    <td>
                        {{ $tiket->DueBy_Time }}
                    </td>
                    <td>
                        {{ $tiket->SLA_Time }}
                    </td>
                    <td>
                        {{ $tiket->Site }}
                    </td>
                </tr>
                <?php 
                $no = $no + 1
              ?>
                @endforeach
              </tbody>
            </table>
        </div>
    </div>
</div>
@endsection