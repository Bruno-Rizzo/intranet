<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class DownloadController extends Controller
{
     public function index()
    {
        return view('site.downloads');
    }

     public function download_img()
    {
        return response()->download(storage_path().'/app/public/logo.png');
    }

     public function download_server()
    {
        return response()->download(storage_path().'/app/public/cadastro_servidor.pdf');
    }

     public function download_vehicle()
    {
        return response()->download(storage_path().'/app/public/cadastro_viatura.pdf');
    }
}
