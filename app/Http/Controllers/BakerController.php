<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreBakerRequest;
use App\Http\Requests\UpdateBakerRequest;
use App\Models\Baker;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
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
        return view('bakers.index', [
            'bakers' => Baker::paginate(50)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return Response
     */
    public function create(): Response
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param StoreBakerRequest $request
     * @return Response
     */
    public function store(StoreBakerRequest $request): Response
    {
        //
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

    /**
     * Show the form for editing the specified resource.
     *
     * @param Baker $baker
     * @return Response
     */
    public function edit(Baker $baker): Response
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param UpdateBakerRequest $request
     * @param Baker $baker
     * @return Response
     */
    public function update(UpdateBakerRequest $request, Baker $baker): Response
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Baker $baker
     * @return Response
     */
    public function destroy(Baker $baker): Response
    {
        //
    }
}
