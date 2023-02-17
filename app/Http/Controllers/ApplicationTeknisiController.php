<?php

namespace App\Http\Controllers;

use App\Models\application_teknisi;
use App\Http\Requests\Storeapplication_userRequest;
use App\Http\Requests\Updateapplication_userRequest;

class ApplicationUserController extends Controller
{
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
     * @param  \App\Http\Requests\Storeapplication_userRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Storeapplication_userRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\application_user  $application_user
     * @return \Illuminate\Http\Response
     */
    public function show(application_teknisi $application_user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\application_user  $application_user
     * @return \Illuminate\Http\Response
     */
    public function edit(application_teknisi $application_user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\Updateapplication_userRequest  $request
     * @param  \App\Models\application_user  $application_user
     * @return \Illuminate\Http\Response
     */
    public function update(Updateapplication_userRequest $request, application_teknisi $application_user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\application_user  $application_user
     * @return \Illuminate\Http\Response
     */
    public function destroy(application_teknisi $application_user)
    {
        //
    }
}
