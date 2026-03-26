<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use PDF;
Use Carbon\Carbon;
use App\Models\Division;
use App\Models\Administrative;
use App\Models\AdmMovement;
use App\Models\Acaution;
use App\Models\Vehicle;

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

        $total = Administrative::where('division_id',$validated['division_id'])->where('status', 1)->count();
        $administratives = Administrative::where('division_id',$validated['division_id'])->where('status', 1)->get();
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

     public function vehicle_index()
    {
        $this->authorize('report', App\Models\Vehicle::class);

        $divisions = Division::all();
        return view('dashboard.vehicle.report_index', compact('divisions'));
    }

     public function vehicle_server()
    {
         $data = [
        'assessoria_suporte_tecnico'               => Vehicle::where('division_id', 1)->count(),
        'assessoria_especial_inteligencia'         => Vehicle::where('division_id', 2)->count(),
        'divisao_administrativa'                   => Vehicle::where('division_id', 3)->count(),
        'divisao_informatica'                      => Vehicle::where('division_id', 4)->count(),
        'divisao_de_protocolo'                     => Vehicle::where('division_id', 5)->count(),
        'escola_inteligencia'                      => Vehicle::where('division_id', 6)->count(),
        'gabinete'                                 => Vehicle::where('division_id', 7)->count(),
        'ministerio_publico'                       => Vehicle::where('division_id', 8)->count(),
        'nucleo_campos'                            => Vehicle::where('division_id', 9)->count(),
        'nucleo_gericino'                          => Vehicle::where('division_id', 10)->count(),
        'nucleo_grande_rio'                        => Vehicle::where('division_id', 11)->count(),
        'nucleo_japeri'                            => Vehicle::where('division_id', 12)->count(),
        'nucleo_niteroi'                           => Vehicle::where('division_id', 13)->count(),
        'nucleo_leste_fluminense'                  => Vehicle::where('division_id', 14)->count(),
        'nucleo_sul_fluminense'                    => Vehicle::where('division_id', 15)->count(),
        'servico_acompanhamento_processual'        => Vehicle::where('division_id', 16)->count(),
        'superintendencia_especializadas'          => Vehicle::where('division_id', 17)->count(),
        'superintendencia_contrainteligencia'      => Vehicle::where('division_id', 18)->count(),
        'superintendencia_inteligencia'            => Vehicle::where('division_id', 19)->count(),
        'superintendencia_inteligencia_eletronica' => Vehicle::where('division_id', 20)->count(),
        'total'                                    => Vehicle::all()->count()
        ];
        $vehicles = Vehicle::all()->sortBy('name');
        $pdf = PDF::loadView('dashboard.reports.vehicle_for_server',compact('vehicles','data'))->setPaper('a4','landscape');
        return $pdf->stream('lista_de_viaturas.pdf');
    }

     public function vehicle_division(Request $request)
    {
        $this->authorize('report', App\Models\Vehicle::class);

        $validated = $request->validate([
            'division_id' => 'required'
        ],[
            'division_id.required' => 'O campo setor é obrigatório'
        ]);

        $division = Division::findOrFail($validated['division_id']);
        $division_name = $division->name;
        $total = Vehicle::where('division_id',$validated['division_id'])->count();
        $vehicles = Vehicle::where('division_id',$validated['division_id'])->get();
        $pdf = PDF::loadView('dashboard.reports.vehicle_for_division',compact('vehicles','total','division_name'))->setPaper('a4','landscape');
        return $pdf->stream('viaturas_por_setor.pdf');
    }

     public function vehicle_search(Request $request)
    {
        $this->authorize('report', App\Models\Vehicle::class);

        $validated = $request->validate([
            'plate'=>'required', 
            ],[
            'plate.required' => 'O campo placa é obrigatório',
            ]);

        $divisions = Division::all();       
        $search = Vehicle::where('original_plate', 'like', '%' . $validated['plate'] . '%')
                     ->orWhere('reserved_plate', 'like', '%' . $validated['plate'] . '%')
                     ->get();
        return view('dashboard.vehicle.report_index',compact('search','divisions'));
    }

     public function vehicle_info($id)
    {
        $this->authorize('report', App\Models\Vehicle::class);
        
        $vehicle = Vehicle::where('id', $id)->first();
        $pdf = PDF::loadView('dashboard.reports.vehicle_info',compact('vehicle'))->setPaper('a4','portrait');
        return $pdf->stream('dados_da_viatura.pdf');
    }


}
