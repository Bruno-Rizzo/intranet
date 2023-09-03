<?php

namespace App\Http\Controllers;

use App\Models\Division;
use App\Models\Trouble;
use Illuminate\Http\Request;


class SiteController extends Controller
{
    public function index()
    {
        return view('site.index');
    }

    public function links()
    {
        return view('site.links');
    }

    public function helpdesk()
    {
        $divisions = Division::all();
        $troubles  = Trouble::all();
        return view('site.helpdesk', compact('divisions','troubles'));
    }

    public function sobre()
    {
        return view('site.sobre');
    }

}
