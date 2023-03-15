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
                  <th style="text-align:left" scope="col">Change ID</th>
                  <th scope="col">Request ID</th>
                  <th scope="col">Task ID</th>
                  <th scope="col">Task Type</th>
                  <th scope="col">Task Status</th>
                  <th scope="col">Scheduled Start Time</th>
                  <th scope="col">Start Time</th>
                  <th scope="col">Scheduled End Time</th>
                  <th scope="col">Overdue</th>
                </tr>
              </thead>
              <?php 
                $no = 1
              ?>
              <tbody>
                @foreach($task as $task)
                <tr>
                    <td style="background-color:gray">
                        {{ $no }}.
                    </td>
                    <td style="text-align:left">
                        {{ $task->Change_ID }}
                    </td>
                    <td>
                        {{ $task->Request_ID }}
                    </td>
                    <td>
                        {{ $task->Task_ID }}
                    </td>
                    <td>
                        {{ $task->Task_Types }}
                    </td>
                    <td>
                        {{ $task->Task_Status }}
                    </td>
                    <td>
                        {{ $task->Scheduled_StartTime}}
                    </td>
                    <td>
                        {{ $task->Start_Time }}
                    </td>
                    <td>
                        {{ $task->Scheduled_EndTime }}
                    </td>
                    <td>
                        {{ $task->Overdue_Status }}
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