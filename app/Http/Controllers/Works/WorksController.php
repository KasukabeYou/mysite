<?php

namespace App\Http\Controllers\Works;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;

class WorksController extends Controller
{
    //
    public function index() {
        // Session::put('key','');
        return view('works.index');
    }
}
