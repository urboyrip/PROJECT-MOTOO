<?php

namespace App\Http\Controllers;

use App\Models\Review_App;
use App\Http\Requests\StoreReview_AppRequest;
use App\Http\Requests\UpdateReview_AppRequest;
use Illuminate\Http\Request;

class ReviewAppController extends Controller
{
    public function index()
    {
        //
    }

    public function create(Request $request){
        Review_App::create([
            'user_id'=>$request->user_id,
            'application_id'=> $request->id_aplikasi,
            'Deskripsi' => $request->isiReview,
            'Penilaian' => (int)$request->rating
        ]);

        return redirect()->back();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreReview_AppRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreReview_AppRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Review_App  $review_App
     * @return \Illuminate\Http\Response
     */
    public function show(Review_App $review_App)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Review_App  $review_App
     * @return \Illuminate\Http\Response
     */
    public function edit(Review_App $review_App)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateReview_AppRequest  $request
     * @param  \App\Models\Review_App  $review_App
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReview_AppRequest $request, Review_App $review_App)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Review_App  $review_App
     * @return \Illuminate\Http\Response
     */
    public function destroy(Review_App $review_App)
    {
        //
    }
}
