<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;
use Validator;

class NearestLocation extends Controller
{
    public function nearestLocation($param){
        if (Auth::check()) {
            $LatLon = explode("&",$param);
            $lat = substr($LatLon[0], 4);
            $lon = substr($LatLon[1], 4);
            $response = (Http::get('https://api.bigdatacloud.net/data/reverse-geocode-client?latitude='.$lat.'&longitude='.$lon));

            return Response($response);
        }
        return Response(['data' => 'Unauthorized'],401);
    }
    public function nearest_location(Request $request){
        if (Auth::check()) {
            $response = (Http::get('https://api.bigdatacloud.net/data/reverse-geocode-client?latitude='.$request->lat.'&longitude='.$request->lon));

            return Response($response);
        }
        return Response(['data' => 'Unauthorized'],401);
    }
}
