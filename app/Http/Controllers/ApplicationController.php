<?php

namespace App\Http\Controllers;

use App\Models\application;
use App\Models\Review_App;
use App\Models\Favorite;
use App\Models\application_teknisi;
use App\Models\User;
use App\Http\Requests\StoreapplicationRequest;
use App\Http\Requests\UpdateapplicationRequest;
use Illuminate\Http\Request;

class ApplicationController extends Controller
{
    public function searchApp(Request $request){

        if ($request->has('search')){
            if($request->kategori == "" && $request->search == ""){
                $search = "All Categories";
                $application = application::paginate(6);
            }
            if ($request->search != "" && $request->kategori == ""){
                $application = application::where('Nama_Aplikasi', '=',$request->search)->paginate(6);
                $search = "All Categories";
            }
            if($request->search == null && $request->kategori != ""){
                $application = application::where('Login', '=', $request->kategori)->paginate(6);
                $search = $request->kategori;
            }
            if($request->search != "" && $request->kategori != ""){
                $application = application::where('Nama_Aplikasi','=', $request->search)->where('Login','=',$request->kategori)->paginate(6);     
                $search = "All Categories";
            }   
        }
        else{
            $application = application::paginate(6);
            $search = "All Categories";
        }
    
        return view('store', [
            'page' => 'Search App',
            'search' => $search,
            'request_temp' => $request,
            'rev' => Review_App::all(),
            'application' => $application
        ]);
    }

    public function filterApp(Request $request){
        #SEARCH, KATEGORI, LOGIN, DEVICE
        if($request->has('categories') && $request->has('login') && $request->has('device') && $request->has('search')){
            $application = application::where('Category', $request->categories)
            ->where('Login', $request->login)
            ->where('Device', $request->device)
            ->where('Nama_Aplikasi', $request->search)
            ->paginate(6);
            $search =$request->categories . " / ". $request->login . " / " . $request->device;
        }
        else{
            #SEARCH, KATEGORI, LOGIN
            if($request->has('categories') && $request->has('login') && $request->has('search')){
                $application = application::where('Category', $request->categtories)
                ->where('Login', $request->login)
                ->where('Nama_Aplikasi', $request->search)
                ->paginate(6) ;
                $search = $request->categories . " / " . $request->login;
            }
            else{
                #SEARCH, KATEGORI, DEVICE
                if($request->has('categories') && $request->has('device') && $request->has('search')){
                    $application = application::where('Category', $request->categtories)
                    ->where('Device', $request->device)
                    ->where('Nama_Aplikasi', $request->search)
                    ->paginate(6) ;
                    $search = $request->categories . " / " . $request->device;
                }
                else{
                    #SEARCH, DEVICE, LOGIN
                    if($request->has('device') && $request->has('login') && $request->has('search')){
                        $application = application::where('Device', $request->device)
                        ->where('Login', $request->login)
                        ->where('Nama_Aplikasi', $request->search)
                        ->paginate(6) ;
                        $search = $request->login . " / " . $request->device;
                    }
                    else{
                        #DEVICE, LOGIN, KATEGORI
                        if ($request->has('device') && $request->has('login') && $request->has('categories')){
                            $application = application::where('Device', $request->device)
                            ->where('Login', $request->login)
                            ->where('Category', $request->categories)
                            ->paginate(6) ;
                            $search =$request->categories . " / ". $request->login . " / " . $request->device;
                        }
                        else{
                            #SEARCH, KATEGORI
                            if($request->has('categories') && $request->has('search')){
                                $application = application::where('Category', $request->categories)
                                ->where('Nama_Aplikasi', $request->search)
                                ->paginate(6);
                                $search = $request->categories;
                            }
                            else{
                                #SEARCH, DEVICE
                                if($request->has('device') && $request->has('search')){
                                    $application = application::where('Device', $request->device)
                                    ->where('Nama_Aplikasi', $request->search)
                                    ->paginate(6);
                                    $search = $request->device;
                                }
                                else{
                                    #SEARCH, LOGIN
                                    if($request->has('login') && $request->has('search')){
                                        $application = application::where('Login', $request->login)
                                        ->where('Nama_Aplikasi', $request->search)
                                        ->paginate(6);  
                                        $search = $request->login;
                                    }
                                    else{
                                        #DEVICE, LOGIN
                                        if($request->has('login') && $request->has('device')){
                                            $application = application::where('Login', $request->login)
                                            ->where('Device', $request->device)
                                            ->paginate(6);
                                            $search = $request->login . " / " . $request->device;
                                        }
                                        else{
                                            #LOGIN, KATEGORI
                                            if ($request->has('login') && $request->has('categories')){
                                                $application = application::where('Category', $request->categories)
                                                ->where('Login', $request->login)
                                                ->paginate(6);
                                                $search = $request->categories . " / " . $request->login;
                                            }
                                            else{
                                                #DEVICE, KATEGORI
                                                if ($request->has('device') && $request->has('categories')){
                                                    $application = application::where('Category', $request->categories)
                                                    ->where('Device', $request->device)
                                                    ->paginate(6);
                                                    $search = $request->categories . " / " . $request->device;
                                                }
                                                else{
                                                    #ONLY CATEGORIES
                                                    if($request->has('categories')){
                                                        $application = application::where('Category', $request->categories)
                                                        ->paginate(6);
                                                        $search = $request->categories;
                                                    }
                                                    else{
                                                        if($request->has('login')){
                                                            $application = application::where('Login', $request->login)
                                                            ->paginate(6);
                                                            $search = $request->login;
                                                        }
                                                        else{
                                                            if($request->has('device')){
                                                                $application = application::where('Device', $request->device)
                                                                ->paginate(6);   
                                                                $search = $request->device;
                                                            }
                                                            else{
                                                                if($request->has('search')){
                                                                    $application = application::where('Nama_Aplikasi', $request->search)
                                                                    ->paginate(6);
                                                                    $search = "All Categories";
                                                                }
                                                                else{
                                                                    $application = application::paginate(6);
                                                                    $search = "All Categories";
                                                                }
                                                            }
                                                        }
                                                    }
                                                }
                                            }
                                        }
                                    }
                                }
                            }
                        }
                    }
                }
            }
        }

        return view('store', [
            'search' => $search,
            'rev' => Review_App::all(),
            'page' => 'Filter',
            'request_temp' => $request,
            'application' => $application,
        ]); 

    }

    public function getApplication(){
        return view('home', [
            'page' => 'Home',
            'application' => application::paginate(8),
            'rev' => Review_App::all()
          //  'appfav' => Favorite::where('user_id', auth()->user()->id)->get()
        ]);
    }

    public function appDetails($x){
        $app = application::find($x);
        $relate_app = application::where('Category', $app->Category)->paginate(4);
        return view('detail', [
            'page' => 'Apps Detail',
            'review' => Review_App::where('application_id', $x)->paginate(3),
            'app' => $app,
            'related_app' => $relate_app
        ]);
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
     * @param  \App\Http\Requests\StoreapplicationRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreapplicationRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */
    public function show(application $application)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */
    public function edit(application $application)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateapplicationRequest  $request
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateapplicationRequest $request, application $application)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\application  $application
     * @return \Illuminate\Http\Response
     */
    public function destroy(application $application)
    {
        //
    }
}
