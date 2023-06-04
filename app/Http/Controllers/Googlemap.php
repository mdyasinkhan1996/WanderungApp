<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Google\Client as GoogleClient;

class Googlemap extends Controller
{
    public function mapresponse(){
        // $response = (Http::get('https://maps.googleapis.com/maps/api/place/textsearch/json?key='{{api_key}}&query={{query}}&radius={{ radius }}&type={{ type }}&pagetoken={{ token }}&location={{location}}&region={{ region }}&language={{ language }}));
        // $response = (Http::get('https://maps.googleapis.com/maps/api/place/textsearch/json?key='.'AIzaSyCm8ZomzS6O-IeIwzd6Q0hlX_lbXBGMdBE'.'&radius='.'1000'));
        // $response = (Http::get('https://maps.googleapis.com/maps/api/geocode/json?latlng='.'24.94962,'.' 90.37071'.'&key='.'AIzaSyCm8ZomzS6O-IeIwzd6Q0hlX_lbXBGMdBE'.'&radius='.'1000'));
        // var url = 'https://maps.googleapis.com/maps/api/geocode/json?latlng=${latitude},${longitude}&key=${apiKey}';
        // return ($response);

    }


    public function getNearestPlaces()
    {
        $googleClient = new GoogleClient();
        $googleClient->setApplicationName('http://127.0.0.1:8000');
        $googleClient->setDeveloperKey('AIzaSyCm8ZomzS6O-IeIwzd6Q0hlX_lbXBGMdBE');

        $latitude = '24.94962';
        $longitude = '90.37071';
        $placeType = 'restaurant';

        $maps = new \Google_Service_Maps($googleClient);
        $response = $maps->placesNearby([
            'location' => "{$latitude},{$longitude}",
            'radius' => 500, // Set the radius as per your requirement
            'type' => $placeType,
        ]);

        $places = [];

        foreach ($response->results as $result) {
            $places[] = $result->name;
        }

        return response()->json($places);
    }
}
