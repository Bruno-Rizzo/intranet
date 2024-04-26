<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Success;
use App\Models\Seizure;

class StatisticController extends Controller
{
    public function index()
    {
        $this->authorize('export', App\Models\Seizure::class);

        return view('dashboard.seizure.statistic');
    }

    public function seizure_export(Request $request)
    {
        $validated = $request->validate([
            'date1' => 'required',
            'date2' => 'required',
        ],[
            'date1.required' => 'O camo data inicial é obrigatório',
            'date2.required' => 'O camo data final é obrigatório',
        ]);

        $date1    = $request->date1;
        $date2    = $request->date2;
        $seizures = Seizure::whereBetween('date', [$date1, $date2])->get();
        return view('dashboard.seizure.seizure_export',compact('seizures'));
    }

    public function success_export(Request $request)
    {
        $validated = $request->validate([
            'date3' => 'required',
            'date4' => 'required',
        ],[
            'date3.required' => 'O camo data inicial é obrigatório',
            'date4.required' => 'O camo data final é obrigatório',
        ]);

        $date3     = $request->date3;
        $date4     = $request->date4;
        $successes = Success::whereBetween('date', [$date3, $date4])->get();
        return view('dashboard.seizure.success_export',compact('successes'));
    }
}
