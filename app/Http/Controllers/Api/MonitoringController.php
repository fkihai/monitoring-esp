<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MonitoringResource;
use App\Models\Monitoring;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;


class MonitoringController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'temp' => 'required|numeric',
            'hum' => 'required|numeric',
            'nh3' => 'required|numeric',
            'fan1' => 'required|boolean',
            'fan2' => 'required|boolean',
            'fan3' => 'required|boolean',
            'fan4' => 'required|boolean',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'error'=> $validator->errors(),
            ],422);
        }
        $data = Monitoring::create($request->all());
        return new MonitoringResource(true,'data add success',$data);
    }
}
