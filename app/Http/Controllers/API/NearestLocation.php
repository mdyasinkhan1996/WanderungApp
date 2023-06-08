<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Auth;
use Validator;

class NearestLocation extends Controller
{
    public function nearestLocation(Request $request){
        if (Auth::check()) {
            // return $request->all();
            $response = (Http::get('https://api.bigdatacloud.net/data/reverse-geocode-client?latitude='.$request->lat.'&longitude='.$request->lon));

            return Response($response);
        }
        return Response(['data' => 'Unauthorized'],401);
    }
}
