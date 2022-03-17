<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\orders;
use Illuminate\Http\Request;

class adminController extends Controller
{
    public function index(){
        $order = orders::get();
        $bekleyensiparis= orders::where('durum','beklemede')->get();
        return view('backend.index',compact('order','bekleyensiparis'));
    }
}
