<?php

namespace App\Http\Controllers;

use App\Models\Scorecard;
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

        // find the events for this Sweepscake
        $events = $sweepscake->series->events()->get();

        // and score the events
        $scorecards = Scorecard::calculateFromEvents($events);

        $bakerUserScorecards = $sweepscakeUserBakers->map(function ($sub) use ($scorecards) {
            return ['baker' => $sub->baker, 'user' => $sub->user, 'scorecard' => $scorecards->get($sub->baker->id) ];
        });

        $bakerUserScorecards = $bakerUserScorecards->sortByDesc(function ($bus, $key) {
            return (int)$bus['scorecard']?->getScore();
        });


        return view('sweepscakes.show', [
            'sweepscake' => $sweepscake,
            'bakers' => $bakers,
            'sweepscakeUserBakers' => $sweepscakeUserBakers,
            'scorecards' => $scorecards,
            'bakerUserScorecards' => $bakerUserScorecards
        ]);
    }
}
