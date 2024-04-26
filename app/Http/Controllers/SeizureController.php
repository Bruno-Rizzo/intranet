<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrisionalUnity;
use App\Models\Coordination;
use App\Models\SeizureType;
use App\Models\Seizure;
use RealRashid\SweetAlert\Facades\Alert;

class SeizureController extends Controller
{
    public function index()
   {
    $this->authorize('create', App\Models\Seizure::class);

    $prisionalUnities = PrisionalUnity::all();
    $coordinations    = Coordination::all();
    $seizureTypes     = SeizureType::all();

    return view('dashboard.seizure.seizure', compact('prisionalUnities','seizureTypes','coordinations'));
   }

   public function store(Request $request)
   {

    $this->authorize('create', App\Models\Seizure::class);

    $validated = $request->validate([
        'prisional_unity_id.*' => 'required',
        'coordination_id.*'    => 'required',
        'date.*'               => 'required',
        'seizure_type_id.*'    => 'required',
        'amount.*'             => 'required'

    ],[
        'prisional_unity_id.*.required' => 'A unidade é obrigatória',
        'coordination_id.*.required'    => 'A coordenação é obrigatória',
        'date.*.required'               => 'A data é obrigatória',
        'seizure_type_id.*.required'    => 'O tipo é obrigatório',
        'amount.*.required'             => 'A quantidade é obrigatória',
    ]);

    $prisional_unity_id = $validated['prisional_unity_id'];
    $coordination_id    = $validated['coordination_id'];
    $date               = $validated['date'];
    $seizure_type_id    = $validated['seizure_type_id'];
    $amount             = $validated['amount'];

    for($i=0 ; $i < count($prisional_unity_id); $i++)
    {
        $data = [
            'prisional_unity_id' => $prisional_unity_id[$i],
            'coordination_id'    => $coordination_id[$i],
            'date'               => $date[$i],
            'seizure_type_id'    => $seizure_type_id[$i],
            'amount'             => $amount[$i],
        ];

        Seizure::create($data);
    }

    Alert::toast('Apreensão cadastrada', 'success');
    return back()->with('success','A Apreensão foi cadastrada!');

   }
}
