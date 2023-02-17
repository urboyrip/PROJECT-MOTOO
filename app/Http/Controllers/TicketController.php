<?php

namespace App\Http\Controllers;

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
        $year = now()->format('Y');
        for($i = 0;$i<12;$i++){
            $ticketcomplete[$i] = Ticket::whereIn('Request_Status', ['Closed', 'Canceled'])
                                ->whereMonth('Due_By_Time', $i+1)
                                ->whereYear('Due_By_Time', $year)                
                                ->count();
            $ticketinprogress[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                    ->where('Request_Status', 'In Progress')
                                    ->whereYear('Due_By_Time', $year)
                                    ->count();
            $ticket_in_progress_request[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                            ->where('Request_Status', 'In Progress')
                                            ->whereYear('Due_By_Time', $year)
                                            ->where('Request_Type', 'Request')
                                            ->count();
            $ticket_in_progress_incident[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                            ->whereYear('Due_By_Time', $year)
                                            ->where('Request_Status', 'In Progress')
                                            ->where('Request_Type', 'Incident')
                                            ->count();
            $ticket_complete_request[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                            ->whereYear('Due_By_Time', $year)
                                            ->whereIn('Request_Status', ['Closed', 'Canceled'])
                                            ->where('Request_Type', 'Request')
                                            ->count();
            $ticket_complete_incident[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                            ->whereYear('Due_By_Time', $year)
                                            ->whereIn('Request_Status', ['Closed', 'Canceled'])
                                            ->where('Request_Type', 'Incident')
                                            ->count();
        }

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


        return view('admin.chart',[
            'tiket' =>Ticket::all(),
            'year' => $year,
            // line chart
            'tiket_complete' => $ticketcomplete,
            'tiket_in_progress'=> $ticketinprogress,
            'bulan' => $bulan,
            // piechart ticket
            'nama_teknisi' => $nama_teknisi,
            'teknisi_tiket' => $teknisi_tiket,
            // piechart task
            'nama_teknisi_task' => $nama_teknisi_task,
            'teknisi_task' => $teknisi_task,
            //barchart
            'tiket_in_progress_request' => $ticket_in_progress_request,
            'tiket_in_progress_incident' => $ticket_in_progress_incident,
            'tiket_complete_request' =>$ticket_complete_request,
            'tiket_complete_incident' => $ticket_complete_incident
        ]);
    }


    public function filterChart(Request $request){
        $year = $request->year;

        if($year == 'All Year'){
            for($i = 0;$i<12;$i++){
                $ticketcomplete[$i] = Ticket::whereIn('Request_Status', ['Closed', 'Canceled'])
                                    ->whereMonth('Due_By_Time', $i+1)
                                    ->count();
                $ticketinprogress[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                        ->where('Request_Status', 'In Progress')
                                        ->count();
                $ticket_in_progress_request[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                                ->where('Request_Status', 'In Progress')
                                                ->where('Request_Type', 'Request')
                                                ->count();
                $ticket_in_progress_incident[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                                ->where('Request_Status', 'In Progress')
                                                ->where('Request_Type', 'Incident')
                                                ->count();
                $ticket_complete_request[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                                ->whereIn('Request_Status', ['Closed', 'Canceled'])
                                                ->where('Request_Type', 'Request')
                                                ->count();
                $ticket_complete_incident[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                                ->whereIn('Request_Status', ['Closed', 'Canceled'])
                                                ->where('Request_Type', 'Incident')
                                                ->count();
            }
    
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
        }
        else{
            for($i = 0;$i<12;$i++){
                $ticketcomplete[$i] = Ticket::whereIn('Request_Status', ['Closed', 'Canceled'])
                                    ->whereMonth('Due_By_Time', $i+1)
                                    ->whereYear('Due_By_Time', $year)                
                                    ->count();
                $ticketinprogress[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                        ->where('Request_Status', 'In Progress')
                                        ->whereYear('Due_By_Time', $year)
                                        ->count();
                $ticket_in_progress_request[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                                ->where('Request_Status', 'In Progress')
                                                ->whereYear('Due_By_Time', $year)
                                                ->where('Request_Type', 'Request')
                                                ->count();
                $ticket_in_progress_incident[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                                ->whereYear('Due_By_Time', $year)
                                                ->where('Request_Status', 'In Progress')
                                                ->where('Request_Type', 'Incident')
                                                ->count();
                $ticket_complete_request[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                                ->whereYear('Due_By_Time', $year)
                                                ->whereIn('Request_Status', ['Closed', 'Canceled'])
                                                ->where('Request_Type', 'Request')
                                                ->count();
                $ticket_complete_incident[$i] = Ticket::whereMonth('Due_By_Time', $i+1)
                                                ->whereYear('Due_By_Time', $year)
                                                ->whereIn('Request_Status', ['Closed', 'Canceled'])
                                                ->where('Request_Type', 'Incident')
                                                ->count();
            }
    }

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


        return view('admin.chart',[
            'year' => $year,
            'tiket' =>Ticket::all(),
            // line chart
            'tiket_complete' => $ticketcomplete,
            'tiket_in_progress'=> $ticketinprogress,
            'bulan' => $bulan,
            // piechart ticket
            'nama_teknisi' => $nama_teknisi,
            'teknisi_tiket' => $teknisi_tiket,
            // piechart task
            'nama_teknisi_task' => $nama_teknisi_task,
            'teknisi_task' => $teknisi_task,
            //barchart
            'tiket_in_progress_request' => $ticket_in_progress_request,
            'tiket_in_progress_incident' => $ticket_in_progress_incident,
            'tiket_complete_request' =>$ticket_complete_request,
            'tiket_complete_incident' => $ticket_complete_incident
        ]);
    }


    public function reportSite(){
        return view('admin.report', [
            'request' => Ticket::where('Request_Type', 'Request')->get(),
            'incident' => Ticket::where('Request_Type', 'Incident')->get(),
            'change' => Ticket::where('Request_Type', 'Change')->get(),
            'problem' => Ticket::where('Request_Type', 'Problem')->get(),
            'review_aplikasi' => Review_App::selectRaw('application_id, count(application_id) as count')
                            ->groupBy('application_id')
                            ->orderBy('count', 'desc')
                            ->get(),
            'review_app_all' => Review_App::all()
        ]);
    }


    public function dashboardSite(){
        return view('admin.dashboard', [
            'teknisi_tiket' => Ticket::selectRaw('user_id, count(user_id) as count')
                            ->groupBy('user_id')
                            ->orderBy('count', 'desc')
                            ->limit(5)
                            ->get(),
            'teknisi_task' => Task::selectRaw('user_id, count(user_id) as count')
                            ->groupBy('user_id')
                            ->orderBy('count', 'desc')
                            ->limit(5)
                            ->get(),
            'tiket' =>Ticket::all(),
            'task' =>Task::all(),
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

