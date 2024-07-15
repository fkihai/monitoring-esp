<?php

namespace App\Http\Controllers;

use App\Models\Monitoring;
use Illuminate\Http\Request;

class MonitoringController extends Controller
{
    public function monitoring(){
        $data = Monitoring::all()->last();
        return view('page.home',compact('data'));
    }

    public function realtime(){
        $data = Monitoring::all()->last();
        return response()->json($data);
    }
}
