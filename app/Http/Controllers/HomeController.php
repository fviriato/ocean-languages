<?php

namespace App\Http\Controllers;

use App\Models\Sessao;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {

        $request['ip'] = $request->ip();
        $request['navegador'] = $_SERVER['HTTP_USER_AGENT'];
        $request['login'] = date('Y-m-d H:i:s', time());
        $request['user_id'] = Auth::user()->id;

        Sessao::create($request->all());

        // dd($request->all());

        return view('app.home');
    }


    public function pedagogico()
    {
        return view('app.pedagogico');
    }


    public function financeiro()
    {
        return view('app.financeiro');
    }


    public function administrativo()
    {
        return view('app.administrativo');
    }


    public function gerencial()
    {
        return view('app.gerencial');
    }

    public function logout(Sessao $sessao)
    {

        dd($sessao);


    }
}
