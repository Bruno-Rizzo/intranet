<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Success;
use App\Models\PrisionalUnity;
use App\Models\Seizure;

class SearchController extends Controller
{
    public function index()
    {
        $this->authorize('search', App\Models\Seizure::class);

        $prisionalUnities = PrisionalUnity::all();
        return view('dashboard.seizure.search', compact('prisionalUnities'));
    }

    public function result(Request $request)
    {

        $this->authorize('search', App\Models\Seizure::class);

        $validated = $request->validate([
            'prisional_unity_id' => 'required',
            'date'               => 'required',
        ],[
            'prisional_unity_id.required' => 'O campo unidade prisional é obrigatório'
        ]);

     $prisionalUnities = PrisionalUnity::all();

     $seizures  = Seizure::where('prisional_unity_id',$request->prisional_unity_id)
                         ->where('date',$request->date)
                         ->get();
     $successes = Success::where('prisional_unity_id',$request->prisional_unity_id)
                         ->where('date',$request->date)
                         ->get();

     return view('dashboard.seizure.search',compact('seizures','prisionalUnities','successes'));

    }
}
