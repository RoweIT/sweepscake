<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreSweepscakeRequest;
use App\Http\Requests\UpdateSweepscakeRequest;
use App\Models\Sweepscake;

class SweepscakeController extends Controller
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
     * @param  \App\Http\Requests\StoreSweepscakeRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreSweepscakeRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Sweepscake  $sweepscake
     * @return \Illuminate\Http\Response
     */
    public function show(Sweepscake $sweepscake)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Sweepscake  $sweepscake
     * @return \Illuminate\Http\Response
     */
    public function edit(Sweepscake $sweepscake)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateSweepscakeRequest  $request
     * @param  \App\Models\Sweepscake  $sweepscake
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSweepscakeRequest $request, Sweepscake $sweepscake)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Sweepscake  $sweepscake
     * @return \Illuminate\Http\Response
     */
    public function destroy(Sweepscake $sweepscake)
    {
        //
    }
}
