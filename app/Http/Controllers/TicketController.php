<?php

namespace App\Http\Controllers;

use DateTime;
use App\Models\Ticket;
use App\Models\Task;
use App\Models\User;
use App\Models\Review_App;
use App\Models\application;
use App\Http\Requests\StoreTicketRequest;
use App\Http\Requests\UpdateTicketRequest;
use Illuminate\Http\Request;


class TicketController extends Controller
{
//How to get month from date type using eloquent
    public function Chart(){
        $client = new \GuzzleHttp\Client();
        $year = now()->format('Y');


        $response = $client->request('GET', 'http://localhost:3030/tiket/jumlah-technician');
        $top_teknisi_tiket = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $top_teknisi_tiket = json_decode($top_teknisi_tiket->getContent());
        $top_teknisi_tiket = collect($top_teknisi_tiket);



        // data tiket complete
        $response = $client->request('GET', 'http://localhost:3030/tiket/data');
        $tiket = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket = json_decode($tiket->getContent());
        $tiket = collect($tiket);
        
        for($i = 1;$i<=12;$i++){
            $ticket_complete[$i] = 0;
            $ticket_inprogress[$i] = 0;
        }
        
        // dd($tiket[1]->DueBy_Time);
        // mengambil jumlah tiket perbulannya berdasrkan status request
        for($i = 0;$i<count($tiket);$i++){
            $datetime = DateTime::createFromFormat('m/d/Y', $tiket[$i]->DueBy_Time);
            $bulan = $datetime->format('m');
            
            for($j=1;$j<=12;$j++){
                if((int)$bulan == $j){
                    if($tiket[$i]->Request_Status == 'Closed' || $tiket[$i]->Request_Status == 'Canceled'){
                        switch($bulan){
                            case "01":
                                $bulan = (int)$bulan;
                                $ticket_complete[$bulan] = $ticket_complete[$bulan] + 1;
                                break;
                            case "02":
                                $bulan = (int)$bulan;
                                $ticket_complete[$bulan] = $ticket_complete[$bulan] + 1;
                                break;
                            case "03":
                                $bulan = (int)$bulan;
                                $ticket_complete[$bulan] = $ticket_complete[$bulan] + 1;
                                break;
                            case "04":
                                $bulan = (int)$bulan;
                                $ticket_complete[$bulan] = $ticket_complete[$bulan] + 1;
                                break;
                            case "05":
                                $bulan = (int)$bulan;
                                $ticket_complete[$bulan] = $ticket_complete[$bulan] + 1;
                                break;
                            case "06":
                                $bulan = (int)$bulan;
                                $ticket_complete[$bulan] = $ticket_complete[$bulan] + 1;
                                break;
                            case "07":
                                $bulan = (int)$bulan;
                                $ticket_complete[$bulan] = $ticket_complete[$bulan] + 1;
                                break;
                            case "08":
                                $bulan = (int)$bulan;
                                $ticket_complete[$bulan] = $ticket_complete[$bulan] + 1;
                                break;
                            case "09":
                                $bulan = (int)$bulan;
                                $ticket_complete[$bulan] = $ticket_complete[$bulan] + 1;
                                break;
                            case "10":
                                $bulan = (int)$bulan;
                                $ticket_complete[$bulan] = $ticket_complete[$bulan] + 1;
                                break;
                            case "11":
                                $bulan = (int)$bulan;
                                $ticket_complete[$bulan] = $ticket_complete[$bulan] + 1;
                                break;
                            case "12":
                                $bulan = (int)$bulan;
                                $ticket_complete[$bulan] = $ticket_complete[$bulan] + 1;
                                break;
                            }
                    }
    
                    if($tiket[$i]->Request_Status == 'In Progress'){
                        switch($bulan){
                            case "01":
                                $bulan = (int)$bulan;
                                $ticket_inprogress[$bulan] = $ticket_inprogress[$bulan] + 1;
                                break;
                            case "02":
                                $bulan = (int)$bulan;
                                $ticket_inprogress[$bulan] = $ticket_inprogress[$bulan] + 1;
                                break;
                            case "03":
                                $bulan = (int)$bulan;
                                $ticket_inprogress[$bulan] = $ticket_inprogress[$bulan] + 1;
                                break;
                            case "04":
                                $bulan = (int)$bulan;
                                $ticket_inprogress[$bulan] = $ticket_inprogress[$bulan] + 1;
                                break;
                            case "05":
                                $bulan = (int)$bulan;
                                $ticket_inprogress[$bulan]= $ticket_inprogress[$bulan] + 1;
                                break;
                            case "06":
                                $bulan = (int)$bulan;
                                $ticket_inprogress[$bulan] = $ticket_inprogress[$bulan] + 1;
                                break;
                            case "07":
                                $bulan = (int)$bulan;
                                $ticket_inprogress[$bulan] =$ticket_inprogress[$bulan]+ 1;
                                break;
                            case "08":
                                $bulan = (int)$bulan;
                                $ticket_inprogress[$bulan] = $ticket_inprogress[$bulan] + 1;
                                break;
                            case "09":
                                $bulan = (int)$bulan;
                                $ticket_inprogress[$bulan] = $ticket_inprogress[$bulan] + 1;
                                break;
                            case "10":
                                $bulan = (int)$bulan;
                                $ticket_inprogress[$bulan] = $ticket_inprogress[$bulan] + 1;
                                break;
                            case "11":
                                $bulan = (int)$bulan;
                                $ticket_inprogress[$bulan] = $ticket_inprogress[$bulan] + 1;
                                break;
                            case "12":
                                $bulan = (int)$bulan;
                                $ticket_inprogress[$bulan] =$ticket_inprogress[$bulan] + 1;
                                break;
                        }
                    }            
                }
            }
        }

        // mengubah items menjadi array
        for($i = 0;$i<12;$i++){
            $tiket_complete[$i] = $ticket_complete[$i+1];
            $tiket_inprogress[$i] = $ticket_inprogress[$i+1];
        }


        for($i = 1;$i<=12;$i++){
            $ticket_request[$i] = 0;
            $ticket_incident[$i] = 0;
            $ticket_request_inprogress[$i] = 0;
            $ticket_incident_inprogress[$i] = 0;
        }
        // mengambil jumlah tiket perbulannya berdasrakan tipe request
        for($i = 0;$i<count($tiket);$i++){
            $datetime = DateTime::createFromFormat('m/d/Y', $tiket[$i]->DueBy_Time);
            $bulan = $datetime->format('m');
            
            for($j=1;$j<=12;$j++){
                if((int)$bulan == $j){
                    if($tiket[$i]->Request_Status == 'Closed' || $tiket[$i]->Request_Status == 'Canceled'){
                        if($tiket[$i]->Request_Type == 'Request'){
                            switch($bulan){
                                case "01":
                                    $bulan = (int)$bulan;
                                    $ticket_request[$bulan] = $ticket_request[$bulan] + 1;
                                    break;
                                case "02":
                                    $bulan = (int)$bulan;
                                    $ticket_request[$bulan] = $ticket_request[$bulan] + 1;
                                    break;
                                case "03":
                                    $bulan = (int)$bulan;
                                    $ticket_request[$bulan] = $ticket_request[$bulan] + 1;
                                    break;
                                case "04":
                                    $bulan = (int)$bulan;
                                    $ticket_request[$bulan] = $ticket_request[$bulan] + 1;
                                    break;
                                case "05":
                                    $bulan = (int)$bulan;
                                    $ticket_request[$bulan] = $ticket_request[$bulan] + 1;
                                    break;
                                case "06":
                                    $bulan = (int)$bulan;
                                    $ticket_request[$bulan] = $ticket_request[$bulan] + 1;
                                    break;
                                case "07":
                                    $bulan = (int)$bulan;
                                    $ticket_request[$bulan] = $ticket_request[$bulan] + 1;
                                    break;
                                case "08":
                                    $bulan = (int)$bulan;
                                    $ticket_request[$bulan] = $ticket_request[$bulan] + 1;
                                    break;
                                case "09":
                                    $bulan = (int)$bulan;
                                    $ticket_request[$bulan] = $ticket_request[$bulan] + 1;
                                    break;
                                case "10":
                                    $bulan = (int)$bulan;
                                    $ticket_request[$bulan] = $ticket_request[$bulan] + 1;
                                    break;
                                case "11":
                                    $bulan = (int)$bulan;
                                    $ticket_request[$bulan] = $ticket_request[$bulan] + 1;
                                    break;
                                case "12":
                                    $bulan = (int)$bulan;
                                    $ticket_request[$bulan] = $ticket_request[$bulan] + 1;
                                    break;
                                }
                            }
                            if($tiket[$i]->Request_Type == 'Incident'){
                                switch($bulan){
                                    case "01":
                                        $bulan = (int)$bulan;
                                        $ticket_incident[$bulan] = $ticket_incident[$bulan] + 1;
                                        break;
                                    case "02":
                                        $bulan = (int)$bulan;
                                        $ticket_incident[$bulan] = $ticket_incident[$bulan] + 1;
                                        break;
                                    case "03":
                                        $bulan = (int)$bulan;
                                        $ticket_incident[$bulan] = $ticket_incident[$bulan] + 1;
                                        break;
                                    case "04":
                                        $bulan = (int)$bulan;
                                        $ticket_incident[$bulan] = $ticket_incident[$bulan] + 1;
                                        break;
                                    case "05":
                                        $bulan = (int)$bulan;
                                        $ticket_incident[$bulan]= $ticket_incident[$bulan] + 1;
                                        break;
                                    case "06":
                                        $bulan = (int)$bulan;
                                        $ticket_incident[$bulan] = $ticket_incident[$bulan] + 1;
                                        break;
                                    case "07":
                                        $bulan = (int)$bulan;
                                        $ticket_incident[$bulan] =$ticket_incident[$bulan]+ 1;
                                        break;
                                    case "08":
                                        $bulan = (int)$bulan;
                                        $ticket_incident[$bulan] = $ticket_incident[$bulan] + 1;
                                        break;
                                    case "09":
                                        $bulan = (int)$bulan;
                                        $ticket_incident[$bulan] = $ticket_incident[$bulan] + 1;
                                        break;
                                    case "10":
                                        $bulan = (int)$bulan;
                                        $ticket_incident[$bulan] = $ticket_incident[$bulan] + 1;
                                        break;
                                    case "11":
                                        $bulan = (int)$bulan;
                                        $ticket_incident[$bulan] = $ticket_incident[$bulan] + 1;
                                        break;
                                    case "12":
                                        $bulan = (int)$bulan;
                                        $ticket_incident[$bulan] =$ticket_incident[$bulan] + 1;
                                        break;
                                    }
                                }
                            }
                            if($tiket[$i]->Request_Status == 'Closed' || $tiket[$i]->Request_Status == 'Canceled'){
                                if($tiket[$i]->Request_Type == 'Request'){
                                    switch($bulan){
                                        case "01":
                                            $bulan = (int)$bulan;
                                            $ticket_request_inprogress[$bulan] = $ticket_request_inprogress[$bulan] + 1;
                                            break;
                                        case "02":
                                            $bulan = (int)$bulan;
                                            $ticket_request_inprogress[$bulan] = $ticket_request_inprogress[$bulan] + 1;
                                            break;
                                        case "03":
                                            $bulan = (int)$bulan;
                                            $ticket_request_inprogress[$bulan] = $ticket_request_inprogress[$bulan] + 1;
                                            break;
                                        case "04":
                                            $bulan = (int)$bulan;
                                            $ticket_request_inprogress[$bulan] = $ticket_request_inprogress[$bulan] + 1;
                                            break;
                                        case "05":
                                            $bulan = (int)$bulan;
                                            $ticket_request_inprogress[$bulan] = $ticket_request_inprogress[$bulan] + 1;
                                            break;
                                        case "06":
                                            $bulan = (int)$bulan;
                                            $ticket_request_inprogress[$bulan] = $ticket_request_inprogress[$bulan] + 1;
                                            break;
                                        case "07":
                                            $bulan = (int)$bulan;
                                            $ticket_request_inprogress[$bulan] = $ticket_request_inprogress[$bulan] + 1;
                                            break;
                                        case "08":
                                            $bulan = (int)$bulan;
                                            $ticket_request_inprogress[$bulan] = $ticket_request_inprogress[$bulan] + 1;
                                            break;
                                        case "09":
                                            $bulan = (int)$bulan;
                                            $ticket_request_inprogress[$bulan] = $ticket_request_inprogress[$bulan] + 1;
                                            break;
                                        case "10":
                                            $bulan = (int)$bulan;
                                            $ticket_request_inprogress[$bulan] = $ticket_request_inprogress[$bulan] + 1;
                                            break;
                                        case "11":
                                            $bulan = (int)$bulan;
                                            $ticket_request_inprogress[$bulan] = $ticket_request_inprogress[$bulan] + 1;
                                            break;
                                        case "12":
                                            $bulan = (int)$bulan;
                                            $ticket_request_inprogress[$bulan] = $ticket_request_inprogress[$bulan] + 1;
                                            break;
                                        }
                                    }
                                    if($tiket[$i]->Request_Type == 'Incident'){
                                        switch($bulan){
                                            case "01":
                                                $bulan = (int)$bulan;
                                                $ticket_incident_inprogress[$bulan] = $ticket_incident_inprogress[$bulan] + 1;
                                                break;
                                            case "02":
                                                $bulan = (int)$bulan;
                                                $ticket_incident_inprogress[$bulan] = $ticket_incident_inprogress[$bulan] + 1;
                                                break;
                                            case "03":
                                                $bulan = (int)$bulan;
                                                $ticket_incident_inprogress[$bulan] = $ticket_incident_inprogress[$bulan] + 1;
                                                break;
                                            case "04":
                                                $bulan = (int)$bulan;
                                                $ticket_incident_inprogress[$bulan] = $ticket_incident_inprogress[$bulan] + 1;
                                                break;
                                            case "05":
                                                $bulan = (int)$bulan;
                                                $ticket_incident_inprogress[$bulan]= $ticket_incident_inprogress[$bulan] + 1;
                                                break;
                                            case "06":
                                                $bulan = (int)$bulan;
                                                $ticket_incident_inprogress[$bulan] = $ticket_incident_inprogress[$bulan] + 1;
                                                break;
                                            case "07":
                                                $bulan = (int)$bulan;
                                                $ticket_incident_inprogress[$bulan] =$ticket_incident_inprogress[$bulan]+ 1;
                                                break;
                                            case "08":
                                                $bulan = (int)$bulan;
                                                $ticket_incident_inprogress[$bulan] = $ticket_incident_inprogress[$bulan] + 1;
                                                break;
                                            case "09":
                                                $bulan = (int)$bulan;
                                                $ticket_incident_inprogress[$bulan] = $ticket_incident_inprogress[$bulan] + 1;
                                                break;
                                            case "10":
                                                $bulan = (int)$bulan;
                                                $ticket_incident_inprogress[$bulan] = $ticket_incident_inprogress[$bulan] + 1;
                                                break;
                                            case "11":
                                                $bulan = (int)$bulan;
                                                $ticket_incident_inprogress[$bulan] = $ticket_incident_inprogress[$bulan] + 1;
                                                break;
                                            case "12":
                                                $bulan = (int)$bulan;
                                                $ticket_incident_inprogress[$bulan] =$ticket_incident_inprogress[$bulan] + 1;
                                                break;
                                            }
                                        }
                            }
                        }
                    }
                }
        // mengubah items menjadi array
        for($i = 0;$i<12;$i++){
            $tiket_request[$i] = $ticket_request[$i+1];
            $tiket_incident[$i] = $ticket_incident[$i+1];
        }

        //request completed
        $response = $client->request('GET', 'http://localhost:3030/tiket/RequestCanceled');
        $tiket_canceled = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket_canceled = json_decode($tiket_canceled->getContent());
        $tiket_canceled = $tiket_canceled->totalPoints;

        $response = $client->request('GET', 'http://localhost:3030/tiket/RequestClosed');
        $tiket_closed = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket_closed = json_decode($tiket_closed->getContent());
        $tiket_closed = $tiket_closed->totalPoints;
        
        $tiket_request_completed = $tiket_canceled + $tiket_closed;

        //incidentcompleted
        $response = $client->request('GET', 'http://localhost:3030/tiket/IncidentCanceled');
        $tiket_canceled = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket_canceled = json_decode($tiket_canceled->getContent());
        $tiket_canceled = $tiket_canceled->totalPoints;

        $response = $client->request('GET', 'http://localhost:3030/tiket/IncidentClosed');
        $tiket_closed = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket_closed = json_decode($tiket_closed->getContent());
        $tiket_closed = $tiket_closed->totalPoints;
        
        $tiket_incident_completed = $tiket_canceled + $tiket_closed;

        $bulan = ['Januari','Februari','Maret', 'April','Mei','Juni','Juli','Agustus','September','Oktober','November', 'Desember'];

        $teknisi_tiket = Ticket::selectRaw('user_id, count(user_id) as count')
                            ->groupBy('user_id')
                            ->orderBy('count', 'desc')
                            ->get();   
                            
        $i = 0;
        foreach($teknisi_tiket as $tk){
            $user = User::where('id', $tk->user_id)->first();
            $nama_teknisi[$i] =$user->Nama_User;    
            $i++;
        }
        
        $teknisi_task = Task::selectRaw('user_id, count(user_id) as count')
                            ->groupBy('user_id')
                            ->orderBy('count', 'desc')
                            ->get();   
                            
        $i = 0;
        foreach($teknisi_task as $tk){
            $user = User::where('id', $tk->user_id)->first();
            $nama_teknisi_task[$i] =$user->Nama_User;    
            $i++;
        }

        $response = $client->request('GET', 'http://localhost:3030/tiket/data');
        $tiket_api = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket_api = json_decode($tiket_api->getContent());
        $tiket_api = collect($tiket_api);
        
        return view('admin.chart',[
            'tiket_api' => $tiket_api,
            // line chart
            'tiket_complete' => $tiket_complete,
            'tiket_in_progress'=> $tiket_inprogress,
            'bulan' => $bulan,
            //barchart
            'tiket_complete_request' =>$tiket_request_completed,
            'tiket_complete_incident' => $tiket_incident_completed,
            //barplot ticket complete request/incident
            'tiket_request' => $tiket_request,
            'tiket_incident' => $tiket_incident,
            'tiket_request_inprogress' =>$ticket_request_inprogress,
            'tiket_incident_inprogress' =>$ticket_incident_inprogress
        ]);
    }

    public function reportSite(){

        // Tiket dari API
        $client = new \GuzzleHttp\Client();
        $response = $client->request('GET', 'http://localhost:3030/tiket/data');
        $tiket_temp = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket = json_decode($tiket_temp->getContent());
        $tiket2 = $tiket;
        
        
        $i = 0;
        foreach($tiket as $tiket){
            if($tiket->Request_Type == 'Request'){
                $tiket_request[$i] = $tiket;
                $i = $i + 1;
            }
        }
        
        $j = 0;
        foreach($tiket2 as $tiket){
            if($tiket->Request_Type == "Incident"){
                $tiket_incident[$j] = $tiket;
                $j = $j + 1;
            }
        }

        $tiket_incident = collect($tiket_request);
        $tiket_request = collect($tiket_request);

        // Ticket Request Closed dari API
        $response = $client->request('GET', 'http://localhost:3030/tiket/RequestClosed');
        $tiket_request_closed =  response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket_request_closed = json_decode($tiket_request_closed->getContent());
        
        // Ticket Request Canceled dari API
        $response = $client->request('GET', 'http://localhost:3030/tiket/RequestCanceled');
        $tiket_request_canceled =  response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket_request_canceled = json_decode($tiket_request_canceled->getContent());
        
        // Ticket Incident Closed
        $response = $client->request('GET', 'http://localhost:3030/tiket/IncidentClosed');
        $tiket_incident_closed =  response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket_incident_closed = json_decode($tiket_incident_closed->getContent());
        
        // Ticket Incident Canceled
        $response = $client->request('GET', 'http://localhost:3030/tiket/IncidentCanceled');
        $tiket_incident_canceled =  response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket_incident_canceled = json_decode($tiket_incident_canceled->getContent());
        
        // SLA realisasi request = sla poin dibagi jumlah tiket request 
        $response = $client->request('GET', 'http://localhost:3030/tiket/SLAPoints');
        $sla_point =  response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $sla_point = json_decode($sla_point->getContent());
        $sla_realisasi_request = ($sla_point->totalPoints/count($tiket_request))*100;  
        $sla_realisasi_request = (int)$sla_realisasi_request;

        // SLA realisasi incident = sla poin dibagi jumlah tiket incident
        $response = $client->request('GET', 'http://localhost:3030/tiket/SLAPoints');
        $sla_point =  response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $sla_point = json_decode($sla_point->getContent());

        $sla_realisasi_incident = ($sla_point->totalPoints/count($tiket_request))*100;  
        $sla_realisasi_incident = (int)$sla_realisasi_incident;

        // jumlah task
        $response = $client->request('GET', 'http://localhost:3030/task/data');
        $task = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $task = json_decode($task->getContent());

        // jumlah task closed
        $response = $client->request('GET', 'http://localhost:3030/task/jumlah-closed');
        $task_closed = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $task_closed = json_decode($task_closed->getContent());

        // jumlah sla realisasi task
        $response = $client->request('GET', 'http://localhost:3030/task/SLAPoints');
        $sla_points_task = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $sla_points_task = json_decode($sla_points_task->getContent());

        $sla_realisasi_task = (int)($sla_points_task->totalPoints/$task_closed->totalClosed)*100;  
        
        
        return view('admin.report', [
            'request' => $tiket_request,
            'incident' => $tiket_incident,
            'ticket_request_closed' => $tiket_request_closed,
            'ticket_request_canceled' => $tiket_request_canceled,
            'ticket_incident_closed' => $tiket_incident_closed,
            'ticket_incident_canceled' => $tiket_incident_canceled,
            'sla_realisasi_request' => $sla_realisasi_request,
            'sla_realisasi_incident' => $sla_realisasi_incident,
            'jumlah_task' => $task,
            'task_closed' => $task_closed,
            'sla_realisasi_task' => $sla_realisasi_task,

            'review_aplikasi' => Review_App::selectRaw('application_id, count(application_id) as count')
                            ->groupBy('application_id')
                            ->orderBy('count', 'desc')
                            ->get(),
            'review_app_all' => Review_App::all()
        ]);
    }


    public function dashboardSite(){
        $client = new \GuzzleHttp\Client();
    
        // top teknisi task
        $response = $client->request('GET', 'http://localhost:3030/task/jumlah-technician');
        $top_teknisi_task = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $top_teknisi_task = json_decode($top_teknisi_task->getContent());
        $top_teknisi_task = collect($top_teknisi_task);

        // top teknisi tiket
        $response = $client->request('GET', 'http://localhost:3030/tiket/jumlah-technician');
        $top_teknisi_tiket = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $top_teknisi_tiket = json_decode($top_teknisi_tiket->getContent());
        $top_teknisi_tiket = collect($top_teknisi_tiket);

        // data tiket
        $response = $client->request('GET', 'http://localhost:3030/tiket/data');
        $tiket = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket = json_decode($tiket->getContent());
        $tiket = collect($tiket);
        
        $count_top_teknisi = $tiket->count('Technician');

        // data task
        $response = $client->request('GET', 'http://localhost:3030/task/data');
        $task = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $task = json_decode($task->getContent());

        // jumlah tiket
        $response = $client->request('GET', 'http://localhost:3030/tiket/jumlah-tiket');
        $jumlah_tiket = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $jumlah_tiket = json_decode($jumlah_tiket->getContent());
        

        // jumlah tiket closed
        $response = $client->request('GET', 'http://localhost:3030/tiket/jumlah-closed');
        $tiket_closed = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket_closed = json_decode($tiket_closed->getContent());
        
        // jumlah ticket canceled
        $response = $client->request('GET', 'http://localhost:3030/tiket/jumlah-canceled');
        $tiket_canceled = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $tiket_canceled = json_decode($tiket_canceled->getContent());

        // jumlah tiket complete
        $tiket_complete = $tiket_closed->totalclosed + $tiket_canceled->totalCanceled;

        // jumlah task
        $response = $client->request('GET', 'http://localhost:3030/task/jumlah-task');
        $jumlah_task = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $jumlah_task = json_decode($jumlah_task->getContent());

        // jumlah task complete
        $response = $client->request('GET', 'http://localhost:3030/task/jumlah-closed');
        $task_complete = response($response->getBody(), $response->getStatusCode())->header('Content-Type', 'application/json');
        $task_complete = json_decode($task_complete->getContent());

        return view('admin.dashboard', [
            'tiket_api' => $tiket,
            'task_api' => $task,
            'teknisi_tiket' => $top_teknisi_tiket,
            'teknisi_task' => $top_teknisi_task,
            'tiket_complete' => $tiket_complete,
            'task_complete' => $task_complete,
            'application' => application::all(),
            'review_aplikasi' => Review_App::selectRaw('application_id, count(application_id) as count')
                            ->groupBy('application_id')
                            ->orderBy('count', 'desc')
                            ->get(),
        ]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreTicketRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreTicketRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function show(Ticket $ticket)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function edit(Ticket $ticket)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateTicketRequest  $request
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateTicketRequest $request, Ticket $ticket)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Ticket  $ticket
     * @return \Illuminate\Http\Response
     */
    public function destroy(Ticket $ticket)
    {
        //
    }
}

