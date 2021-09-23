<?php

namespace App\Http\Controllers\Painel;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\Painel\Produto;
use DB;

class HomeController extends Controller
{

    private $produto;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Produto $produto)
    {
        $this->middleware('auth');
        $this->produto = $produto;
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $aba1 = 'active';
        $categorys = DB::table('produtos')
                 ->select('category as name', DB::raw('count(*) as total'))
                 ->groupBy('category')
                 ->get();
        return view('painel.home.home', compact('aba1', 'categorys'));
    }
}
