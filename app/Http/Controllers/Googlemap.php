<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Google\Client as GoogleClient;

class Googlemap extends Controller
{
    public function mapresponse(){
        $response = (Http::get('http://api.geonames.org/findNearbyPlaceNameJSON?lat=47.3&lng=9&username=mdyasinkhan'));

        return Response($response);

    }
}
