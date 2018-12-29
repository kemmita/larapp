<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client as GuzzleClient;
class ApiController extends Controller
{
    public function github($username){
        $client = new GuzzleClient();
        $response = $client->get('https://api.github.com/users/'.$username);
        //use json_decode to convert into a php object
        $api_data = json_decode($response->getBody());
        return view('api')->with('data',$api_data);
    }

}
