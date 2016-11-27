<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use View;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;


class AppController extends Controller
{
    public function index() {
      // $ch = curl_init('http://muslimsalat.com/daily.json?key='.env('MUSLIM_SALAT_KEY'));
      //
      // $client = new Client(); //GuzzleHttp\Client
      // $result = $client->get('http://muslimsalat.com/daily.json'.env('MUSLIM_SALAT_KEY'));
      // return $result;

      // return View::make('app.index')->with(['json' => json_encode($json->body)]);
      return View::make('app.index');
    }

    public function monthly() {
      return View::make('app.monthly');
    }
}
