<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class WebController extends Controller
{
    //
    public $services_path = "client.pages.services.";

    // New pages for TNM
    public function caseStudy(Request $request)
    {
        return view("client.pages.case-study");
    }
}
