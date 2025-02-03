<?php

namespace App\Http\Controllers;

use App\Models\ConsultasIA;
use App\Http\Requests\StoreConsultasIARequest;
use App\Http\Requests\UpdateConsultasIARequest;
use Illuminate\Http\Request;

class ConsultasIAController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
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
    public function store(StoreConsultasIARequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ConsultasIA $consultasIA)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ConsultasIA $consultasIA)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateConsultasIARequest $request, ConsultasIA $consultasIA)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ConsultasIA $consultasIA)
    {
        //
    }

    public function cancelacionTardia(Request $request) {
        //$consultas = Consultas::find($request->consultas_
    }
}
