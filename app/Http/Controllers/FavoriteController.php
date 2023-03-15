<?php

namespace App\Http\Controllers;

use App\Models\Favorite;
use App\Models\application;
use App\Models\Review_App;
use Illuminate\Http\Request;
use App\Http\Requests\StoreFavoriteRequest;
use App\Http\Requests\UpdateFavoriteRequest;

class FavoriteController extends Controller
{



    public function index()
    {
        $favorite = Favorite::where('user_id', auth()->user()->id)->paginate(4);
        return view('favorites', [
            'page'=> 'Favorite Apps',
            'rev' => Review_App::all(),
            'favorites' => $favorite
        ]);
    }

    public function create(Request $request)
    {   
        $check = Favorite::where('user_id', $request->user_id)
        ->where('application_id', $request->app_id)->first();
        if(!$check){
            Favorite::create([
                'user_id'=>$request->user_id,
                'application_id'=> $request->app_id 
            ]);
            return redirect()->route('home');
        }
        else{
            return redirect()->route('home');
        }
        
    }


    public function store(StoreFavoriteRequest $request)
    {
        //
    }


    public function show(Favorite $favorite)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function edit(Favorite $favorite)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateFavoriteRequest  $request
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFavoriteRequest $request, Favorite $favorite)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Favorite  $favorite
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request)
    {
        
        Favorite::where('application_id', $request->app_id)
        ->where('user_id', $request->user_id)
        ->delete();
        return redirect()->route('favorites');
    }
}
