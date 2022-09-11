<?php

namespace App\Http\Controllers;

use App\Models\Series;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    /**
     * A user specific dashboard page
     *
     * @return Application|Factory|View
     */
    public function index(): View|Factory|Application
    {
        $user = Auth::user();

        $current_sweepscakes = $user->sweepscakes()->whereHas('series', function (Builder $query)  {
            $query->whereIn('status', [Series::STATUS_PENDING, Series::STATUS_ACTIVE]);
        })->get();

        $complete_sweepscakes = $user->sweepscakes()->whereHas('series', function (Builder $query)  {
            $query->where('status', '=', Series::STATUS_COMPLETE);
        })->get();

        return view('dashboard.index', [
            'user' => Auth::user(),
            'current_sweepscakes' => $current_sweepscakes,
            'previous_sweepscakes' => $complete_sweepscakes
        ]);
    }
}
