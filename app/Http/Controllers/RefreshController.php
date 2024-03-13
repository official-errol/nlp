<?php

namespace App\Http\Controllers;

use Artisan;
use Illuminate\Http\Request;

class RefreshController extends Controller
{
    public function refresh(){
        


        // $arr = ['files/jepge.jpg','files/asas.PNG', 'files/asasa.jpeg'];

        // $fileName = implode(",", $arr);
        // dd($fileName );
        // Happy Med Processing Fee
    	Artisan::call('route:cache');
        Artisan::call('cache:clear');
       
        dd( "refresh");
    }
}
