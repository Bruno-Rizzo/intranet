<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
     public function index()
    {
        return view('site.downloads');
    }

     public function download()
    {
        return response()->download(storage_path().'/app/public/logo.png');
    }
}
