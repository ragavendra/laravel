<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreStopsRequest;
use App\Http\Requests\UpdateStopsRequest;
use App\Models\Stops;

class StopsController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index($latitude, $longitude)
    {
        // echo "Lat " . $latitude . " Long ". $longitude;
        return response()->json([
            'latitude' => $latitude,
            'longitude'=> $longitude
        ]);
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreStopsRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Stops $stops)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Stops $stops)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateStopsRequest $request, Stops $stops)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Stops $stops)
    {
        //
    }
}
