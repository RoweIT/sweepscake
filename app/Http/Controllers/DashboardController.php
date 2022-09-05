<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBakerRequest;
use App\Http\Requests\UpdateBakerRequest;
use App\Models\Baker;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Response;
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
        return view('dashboard.index', [
            'user' => Auth::user()
        ]);
    }
}
