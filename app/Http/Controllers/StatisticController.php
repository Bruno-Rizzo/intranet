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
            'date1' => ['required','date_format:Y-m-d'],
            'date2' => ['required','date_format:Y-m-d'],
        ],[
            'date1.required'    => 'O campo data inicial é obrigatório',
            'date1.date_format' => 'O campo data inicial não corresponde ao formato dd/mm/aaaa',
            'date2.required'    => 'O campo data final é obrigatório',
            'date2.date_format' => 'O campo data finalnão corresponde ao formato dd/mm/aaaa',
        ]);

        $date1    = $request->date1;
        $date2    = $request->date2;
        $seizures = Seizure::whereBetween('date', [$date1, $date2])->get();
        return view('dashboard.seizure.seizure_export',compact('seizures'));
    }

    public function success_export(Request $request)
    {
        $validated = $request->validate([
            'date3' => ['required','date_format:Y-m-d'],
            'date4' => ['required','date_format:Y-m-d'],
        ],[
            'date3.required'    => 'O campo data inicial é obrigatório',
            'date3.date_format' => 'O campo data inicial não corresponde ao formato dd/mm/aaaa',
            'date4.required'    => 'O campo data final é obrigatório',
            'date4.date_format' => 'O campo data final não corresponde ao formato dd/mm/aaaa',
        ]);

        $date3     = $request->date3;
        $date4     = $request->date4;
        $successes = Success::whereBetween('date', [$date3, $date4])->get();
        return view('dashboard.seizure.success_export',compact('successes'));
    }
}
