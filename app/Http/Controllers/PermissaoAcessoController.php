<?php

namespace App\Http\Controllers;

use App\Models\PermissaoAcesso;
use Illuminate\Http\Request;

class PermissaoAcessoController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('app.permissao_acesso.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('app.permissao_acesso.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        dd($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PermissaoAcesso  $permissaoAcesso
     * @return \Illuminate\Http\Response
     */
    public function show(PermissaoAcesso $permissaoAcesso)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PermissaoAcesso  $permissaoAcesso
     * @return \Illuminate\Http\Response
     */
    public function edit(PermissaoAcesso $permissaoAcesso)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PermissaoAcesso  $permissaoAcesso
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PermissaoAcesso $permissaoAcesso)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PermissaoAcesso  $permissaoAcesso
     * @return \Illuminate\Http\Response
     */
    public function destroy(PermissaoAcesso $permissaoAcesso)
    {
        //
    }
}
