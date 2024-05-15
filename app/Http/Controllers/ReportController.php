<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
Use Carbon\Carbon;
use App\Models\Division;
use App\Models\Administrative;
use App\Models\AdmMovement;
use App\Models\Acaution;

class ReportController extends Controller
{
    public function administrative_index()
    {
        $this->authorize('report', App\Models\Administrative::class);

        $divisions = Division::all();
        return view('dashboard.administrative.report_index', compact('divisions'));
    }

    public function administrative_show_all()
    {
        $this->authorize('report', App\Models\Administrative::class);

        $administratives = Administrative::where('status', 1)->orderBy('division_id')->get();
        $pdf = PDF::loadView('dashboard.reports.administrative_show_all',compact('administratives'))->setPaper('a4','portrait');
        return $pdf->stream('lista_de_servidores.pdf');
    }

    public function administrative_inactives()
    {
        $this->authorize('report', App\Models\Administrative::class);

        $administratives = Administrative::where('status', 0)->orderBy('division_id')->get();
        $pdf = PDF::loadView('dashboard.reports.administrative_inactives',compact('administratives'))->setPaper('a4','portrait');
        return $pdf->stream('lista_servidores_inativos.pdf');
    }

    public function administrative_for_sector(Request $request)
    {
        $this->authorize('report', App\Models\Administrative::class);

        $validated = $request->validate([
            'division_id' => 'required'
        ],[
            'division_id.required' => 'O campo setor é obrigatório'
        ]);

        $administratives = Administrative::where('division_id',$validated['division_id'])->get();
        $pdf = PDF::loadView('dashboard.reports.administrative_for_sector',compact('administratives'))->setPaper('a4','portrait');
        return $pdf->stream('servidores_por_setor.pdf');
    }

    public function administrative_search(Request $request)
    {
        $this->authorize('report', App\Models\Administrative::class);

        $validated = $request->validate(['name'=>'required']);
        $divisions = Division::all();
        $search = Administrative::where('name','like', '%'.$validated['name'].'%')->get();
        return view('dashboard.administrative.report_index',compact('search','divisions'));
    }

    public function administrative_info($id)
    {
        $this->authorize('report', App\Models\Administrative::class);

        $administrative = Administrative::where('id', $id)->first();
        $adm_movements  = AdmMovement::where('administrative_id', $id)->get();
        $acautions      = Acaution::where('administrative_id', $id)->get();
        $pdf = PDF::loadView('dashboard.reports.administrative_info',compact('administrative','adm_movements','acautions'))->setPaper('a4','portrait');
        return $pdf->stream('dados_do_servidor.pdf');
    }
}
