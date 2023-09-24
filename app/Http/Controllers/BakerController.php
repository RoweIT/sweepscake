<?php

namespace App\Http\Controllers;

use App\Models\Baker;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Http\Response;

class BakerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $series = "gbbo-series-14";

        $bakers = Baker::whereHas('series', function (Builder $query) use ($series) {
            $query->where('slug', '=', $series);
        })->get();

        return view('bakers.index', [
            'bakers' => $bakers
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param Baker $baker
     * @return Response
     */
    public function show(Baker $baker): View|Factory|Application
    {
        return view('bakers.show', [
            'baker' => $baker
        ]);
    }
}
