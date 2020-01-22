<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Session;
use Log;

class ProfileController extends Controller
{
    public function __construct(){
        // $this->middleware('member');
    }
    //
    public function index() {
        // if (trim(Session::get('key')) == '') {
        //     Session::put('key','111');
        //     return redirect('/top');
        // }
        return view('profile.index');
    }
}
