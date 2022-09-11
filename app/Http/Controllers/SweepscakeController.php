<?php

namespace App\Http\Controllers;

use App\Models\Sweepscake;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;

class SweepscakeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Response
     */
    public function index()
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param Sweepscake $sweepscake
     * @return Application|Factory|View
     */
    public function show(Sweepscake $sweepscake)
    {
        /** @var User $user */
        $user = Auth::user();

        $bakers = $user->bakers()
            ->where('sweepscake_user_bakers.sweepscake_id', '=', $sweepscake->id)
            ->get();

        $sweepscakeUserBakers = $sweepscake->sweepscakeUserBaker()->get();

        return view('sweepscakes.show', [
            'sweepscake' => $sweepscake,
            'bakers' => $bakers,
            'sweepscakeUserBakers' => $sweepscakeUserBakers
        ]);
    }
}
