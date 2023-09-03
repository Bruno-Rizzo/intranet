<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Helpdesk;

class DashboardController extends Controller
{
    public function index()
    {
        $total  = Helpdesk::all()->count();
        $opened = Helpdesk::where('status',0)->count(); 
        $closed = Helpdesk::where('status',1)->count(); 
        return view('dashboard.index',compact('total','opened','closed'));
    }
}
