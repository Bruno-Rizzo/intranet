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

        $data = [
        'assessoria_suporte_tecnico'               => Administrative::where('division_id', 1)->where('status',1)->count(),
        'assessoria_especial_inteligencia'         => Administrative::where('division_id', 2)->where('status',1)->count(),
        'divisao_administrativa'                   => Administrative::where('division_id', 3)->where('status',1)->count(),
        'divisao_informatica'                      => Administrative::where('division_id', 4)->where('status',1)->count(),
        'divisao_de_protocolo'                     => Administrative::where('division_id', 5)->where('status',1)->count(),
        'escola_inteligencia'                      => Administrative::where('division_id', 6)->where('status',1)->count(),
        'gabinete'                                 => Administrative::where('division_id', 7)->where('status',1)->count(),
        'ministerio_publico'                       => Administrative::where('division_id', 8)->where('status',1)->count(),
        'nucleo_campos'                            => Administrative::where('division_id', 9)->where('status',1)->count(),
        'nucleo_gericino'                          => Administrative::where('division_id', 10)->where('status',1)->count(),
        'nucleo_grande_rio'                        => Administrative::where('division_id', 11)->where('status',1)->count(),
        'nucleo_japeri'                            => Administrative::where('division_id', 12)->where('status',1)->count(),
        'nucleo_niteroi'                           => Administrative::where('division_id', 13)->where('status',1)->count(),
        'nucleo_leste_fluminense'                  => Administrative::where('division_id', 14)->where('status',1)->count(),
        'nucleo_sul_fluminense'                    => Administrative::where('division_id', 15)->where('status',1)->count(),
        'servico_acompanhamento_processual'        => Administrative::where('division_id', 16)->where('status',1)->count(),
        'superintendencia_especializadas'          => Administrative::where('division_id', 17)->where('status',1)->count(),
        'superintendencia_contrainteligencia'      => Administrative::where('division_id', 18)->where('status',1)->count(),
        'superintendencia_inteligencia'            => Administrative::where('division_id', 19)->where('status',1)->count(),
        'superintendencia_inteligencia_eletronica' => Administrative::where('division_id', 20)->where('status',1)->count(),
        'total'                                    => Administrative::where('status', 1)->count()
        ];

        $administratives = Administrative::where('status', 1)->orderBy('division_id')->get();
        $pdf = PDF::loadView('dashboard.reports.administrative_show_all',compact('administratives','data'))->setPaper('a4','portrait');
        return $pdf->stream('lista_de_servidores.pdf');
    }

    public function administrative_show_all_by_name()
    {
        $this->authorize('report', App\Models\Administrative::class);

        $data = [
        'assessoria_suporte_tecnico'               => Administrative::where('division_id', 1)->where('status',1)->count(),
        'assessoria_especial_inteligencia'         => Administrative::where('division_id', 2)->where('status',1)->count(),
        'divisao_administrativa'                   => Administrative::where('division_id', 3)->where('status',1)->count(),
        'divisao_informatica'                      => Administrative::where('division_id', 4)->where('status',1)->count(),
        'divisao_de_protocolo'                     => Administrative::where('division_id', 5)->where('status',1)->count(),
        'escola_inteligencia'                      => Administrative::where('division_id', 6)->where('status',1)->count(),
        'gabinete'                                 => Administrative::where('division_id', 7)->where('status',1)->count(),
        'ministerio_publico'                       => Administrative::where('division_id', 8)->where('status',1)->count(),
        'nucleo_campos'                            => Administrative::where('division_id', 9)->where('status',1)->count(),
        'nucleo_gericino'                          => Administrative::where('division_id', 10)->where('status',1)->count(),
        'nucleo_grande_rio'                        => Administrative::where('division_id', 11)->where('status',1)->count(),
        'nucleo_japeri'                            => Administrative::where('division_id', 12)->where('status',1)->count(),
        'nucleo_niteroi'                           => Administrative::where('division_id', 13)->where('status',1)->count(),
        'nucleo_leste_fluminense'                  => Administrative::where('division_id', 14)->where('status',1)->count(),
        'nucleo_sul_fluminense'                    => Administrative::where('division_id', 15)->where('status',1)->count(),
        'servico_acompanhamento_processual'        => Administrative::where('division_id', 16)->where('status',1)->count(),
        'superintendencia_especializadas'          => Administrative::where('division_id', 17)->where('status',1)->count(),
        'superintendencia_contrainteligencia'      => Administrative::where('division_id', 18)->where('status',1)->count(),
        'superintendencia_inteligencia'            => Administrative::where('division_id', 19)->where('status',1)->count(),
        'superintendencia_inteligencia_eletronica' => Administrative::where('division_id', 20)->where('status',1)->count(),
        'total'                                    => Administrative::where('status', 1)->count()
        ];

        $administratives = Administrative::where('status', 1)->orderBy('name')->get();
        $pdf = PDF::loadView('dashboard.reports.administrative_show_all',compact('administratives','data'))->setPaper('a4','portrait');
        return $pdf->stream('lista_de_servidores.pdf');
    }

    public function administrative_inactives()
    {
        $this->authorize('report', App\Models\Administrative::class);

        $total = Administrative::where('status', 0)->count();
        $administratives = Administrative::where('status', 0)->orderBy('name')->get();
        $pdf = PDF::loadView('dashboard.reports.administrative_inactives',compact('administratives','total'))->setPaper('a4','portrait');
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

        $total = Administrative::where('division_id',$validated['division_id'])->count();
        $administratives = Administrative::where('division_id',$validated['division_id'])->get();
        $pdf = PDF::loadView('dashboard.reports.administrative_for_sector',compact('administratives','total'))->setPaper('a4','portrait');
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
