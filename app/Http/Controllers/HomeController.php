<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Site;

class HomeController extends Controller
{

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
      $site = Site::where('id',1)->first();
      return view('home')->with(['site' => $site]);
    }
}
