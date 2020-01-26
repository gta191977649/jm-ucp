<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use ipinfo\ipinfo\IPinfo;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $user = Auth::user();
        return view('home')->with('user', $user);
    }

    public function geoIP($ip) {
        $access_token = '8cf7c3c855be58';
        $client = new IPinfo($access_token);
        $ip_address = $ip;
        $details = $client->getDetails($ip_address);
        return  $details;
    }
}
