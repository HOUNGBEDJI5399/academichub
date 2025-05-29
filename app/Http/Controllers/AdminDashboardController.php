<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AdminDashboardController extends Controller
{
    

    
    public function headeradminpage() {

        return view('admindashboard.headeradmin');
        
    }


    public function indexpage() {

        return view('admindashboard.index');
        
    }


}
