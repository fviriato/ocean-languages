<?php

namespace App\Http\Controllers;

use App\Models\AulaIdioma;
use Illuminate\Http\Request;

class AulaIdiomaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.aula.idioma.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.aula.idioma.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\AulaIdioma  $aulaIdioma
     * @return \Illuminate\Http\Response
     */
    public function show(AulaIdioma $aulaIdioma)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\AulaIdioma  $aulaIdioma
     * @return \Illuminate\Http\Response
     */
    public function edit(AulaIdioma $aulaIdioma)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\AulaIdioma  $aulaIdioma
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, AulaIdioma $aulaIdioma)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\AulaIdioma  $aulaIdioma
     * @return \Illuminate\Http\Response
     */
    public function destroy(AulaIdioma $aulaIdioma)
    {
        //
    }
}
