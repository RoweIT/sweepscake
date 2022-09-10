<?php

namespace App\Http\Controllers;

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
     * Display the specified resource.
     *
     * @param  \App\Models\Sweepscake  $sweepscake
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View
     */
    public function show(Sweepscake $sweepscake)
    {
        return view('sweepscakes.show', [
            'sweepscake' => $sweepscake
        ]);
    }
}
