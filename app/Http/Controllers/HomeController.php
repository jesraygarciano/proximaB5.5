<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Mapper;


class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */

    public function welcome(){

        // Mapper::map(10.318686,123.90317049999999);
        Mapper::map(10.318686,123.90317049999999,['zoom' => 19, 'markers' => ['title' => 'My Location', 'animation' => 'DROP'], 'clusters' => ['size' => 10, 'center' => true, 'zoom' => 30]]);

        return view('welcome');
    }

    public function index()
    {
        return view('home');
    }

}
