<?php

namespace App\Http\Controllers;
use Carbon\Carbon;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class MonitoringController extends Controller
{
    public function monitoring(){
        $data = Monitoring::all()->last();
        $data->created_at = Carbon::parse($data->created_at)->setTimezone('Asia/Jakarta');
        $dataLength = 20;

        $lengthState = Monitoring::orderBy('temp', 'desc')->get();
        $tempData = Monitoring::latest()->take($dataLength)->pluck('temp');
        $humData = Monitoring::latest()->take($dataLength)->pluck('hum');
        $nh3Data = Monitoring::latest()->take($dataLength)->pluck('nh3');
        return view('page.home',compact('data','tempData','humData','nh3Data','lengthState'));
    }

    public function realtime(){
        $dataLast = Monitoring::all()->last();
        $stateDataLength = Monitoring::orderBy('temp', 'desc')->get();
        $dataLength = 20;

        $parameters = [
            'temp', 'hum', 'nh3'
        ];

        $responseData = ['dataLast' => $dataLast];
        $responseData['stateDataLength'] = $stateDataLength;

        foreach ($parameters as $parameter) {
            $responseData[$parameter] = Monitoring::orderBy('created_at', 'desc')->take($dataLength)->pluck($parameter);
        }

        return response()->json($responseData);
    }
}
