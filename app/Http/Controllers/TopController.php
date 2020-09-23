<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use Log;
use App;

class TopController extends Controller
{
    public function __construct(){
        // $this->middleware('member');
    }
    
    //
    public function index() {
        App::setLocale('ja');
        Session::put('locale','ja');

        return view('top.index');
    }
}
