<?php

namespace App\Http\Controllers\Mail;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MailController extends Controller
{
    public function __construct(){
        // $this->middleware('member');
    }
    //
    public function index() {
        return view('mail.index');
    }
}
