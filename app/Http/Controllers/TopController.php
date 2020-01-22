<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Log;

class TopController extends Controller
{
    public function __construct(){
        // $this->middleware('member');
    }
    
    //
    public function index() {
        // if (trim(Session::get('key')) == '') {
        //     Log::info('abc111');
        //     Log::info(Session::get('key'));
        //     Log::info('abc222');
        //     Session::put('key','111');
        //     return redirect('/top');
        // }
        return view('top.index');
    }
}
