<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\PrisionalUnity;
use App\Models\Sector;
use App\Models\Faction;
use App\Models\Coordination;
use App\Models\Regime;
use App\Models\Success;
use RealRashid\SweetAlert\Facades\Alert;

class SuccessController extends Controller
{
    public function index()
    {
        $this->authorize('view', App\Models\Success::class);

        $prisionalUnities = PrisionalUnity::all();
        $sectors          = Sector::all();
        $factions         = Faction::all();
        $coordinations    = Coordination::all();
        $regimes          = Regime::all();
        return view('dashboard.seizure.success',compact('prisionalUnities','sectors','factions','coordinations','regimes'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', App\Models\Success::class);

        $validated = $request->validate([
            'date'                   => ['required','date_format:Y-m-d'],
            'sector_id'              => 'required',
            'boss_name'              => 'required',
            'boss_id'                => 'required',
            'coordination_id'        => 'required',
            'coordination_boss_name' => 'required',
            'coordination_boss_id'   => 'required',
            'prisional_unity_id'     => 'required',
            'faction_id'             => 'required',
            'regime_id'              => 'required',
            'director_name'          => 'required',
            'director_id'            => 'required',
            'subdirector_name'       => 'required',
            'subdirector_id'         => 'required',
            'security_boss_name'     => 'required',
            'security_boss_id'       => 'required',
            'team_boss_name'         => 'required',
            'team_boss_id'           => 'required',
            'ro_number'              => 'nullable',
            'seal_number'            => 'nullable',
            'dynamics_of_fact'       => 'nullable',
        ],[
            'date.required'                   => 'O campo data é obrigatório',
            'date.date_format'                => 'O campo data não corresponde ao formato dd/mm/aaaa',
            'date.date'                       => 'A data precisa ser em um formato válido',
            'sector_id.required'              => 'O campo setor é obrigatório',
            'boss_name.required'              => 'O campo chefe / superintendente é obrigatório',
            'boss_id.required'                => 'O campo id é obrigatório',
            'coordination_id.required'        => 'O campo coordenação de área é obrigatório',
            'coordination_boss_name.required' => 'O campo coordenador é obrigatório',
            'coordination_boss_id.required'   => 'O campo id é obrigatório',
            'prisional_unity_id.required'     => 'O campo unidade prisional é obrigatório',
            'faction_id.required'             => 'O campo perfil é obrigatório',
            'regime_id.required'              => 'O campo regime é obrigatório',
            'director_name.required'          => 'O campo diretor é obrigatório',
            'director_id.required'            => 'O campo id é obrigatório',
            'subdirector_name.required'       => 'O campo subdiretor é obrigatório',
            'subdirector_id.required'         => 'O campo id é obrigatório',
            'security_boss_name.required'     => 'O campo chefe de segurança é obrigatório',
            'security_boss_id.required'       => 'O campo id é obrigatório',
            'team_boss_name.required'         => 'O campo chefe de turma é obrigatório',
            'team_boss_id.required'           => 'O campo id é obrigatório',
        ]);

        Success::create($validated);
        Alert::toast('Êxito cadastrado', 'success');
        return back()->with('success','O Êxito foi cadastrado!');
    }

    public function edit(Success $success)
    {
        $this->authorize('view', App\Models\Success::class);

        return view('dashboard.seizure.success_edit', compact('success'));
    }

    public function update(Request $request, Success $success)
    {
        $this->authorize('update', App\Models\Success::class);

        $data = $request->only('ro_number', 'seal_number', 'dynamics_of_fact');
        Success::find($success->id)->update($data);
        Alert::toast('Êxito editado', 'success');
        return to_route('search.index')->with('success','O êxito foi editado!');
    }

    public function download()
    {
        $pdf = public_path('pdf/formulario.pdf');
        return response()->download($pdf);
    }
}
