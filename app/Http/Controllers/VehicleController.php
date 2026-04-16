<?php

namespace App\Http\Controllers;

use App\Models\Vehicle;
use App\Models\Division;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class VehicleController extends Controller
{
      public function index()
    {
        $this->authorize('view', App\Models\Vehicle::class);
        
        $vehicles = Vehicle::all()->sortBy('name');
        return view('dashboard.vehicle.index', compact('vehicles'));
    }

     public function create()
    {
        $this->authorize('create', App\Models\Vehicle::class);

        $divisions = Division::orderBy('name')->get();
        return view('dashboard.vehicle.create', compact('divisions'));
    }

    public function edit(Vehicle $vehicle)
    {
        $this->authorize('update', App\Models\Vehicle::class);

        $divisions = Division::all();
        return view('dashboard.vehicle.edit',compact('divisions','vehicle'));
    }

     public function store(Request $request)
    {
        $this->authorize('create', App\Models\Vehicle::class);

        $validated = $request->validate([
            'name'              => 'nullable',
            'identify'          => 'nullable',
            'division_id'       => 'required',
            'patrimony_type'    => 'nullable',
            'vehicle_type'      => 'required',
            'brand'             => 'required',
            'model'             => 'required',
            'original_plate'    => 'required',
            'reserved_plate'    => 'nullable',
            'kilometer'         => 'required',
            'credential_number' => 'required',
            'disclaimer'        => 'nullable',
        ],[
            'division_id.required'       => 'O campo setor é obrigatório',
            'vehicle_type.required'      => 'O campo tipo de veículo é obrigatório',
            'brand.required'             => 'O campo marca é obrigatório',
            'model.required'             => 'O campo modelo é obrigatório',
            'original_plate.required'    => 'O campo placa original é obrigatório',
            'kilometer.required'         => 'O campo kilometragem é obrigatório',
            'credential_number.required' => 'O campo nº credencial é obrigatório',
        ]);


        // ✅ Verifica se o arquivo foi enviado antes de processá-lo
        if ($request->hasFile('disclaimer')) {

            // Gera nome único para evitar sobrescrita
            $originalName  = pathinfo($request->file('disclaimer')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension     = $request->file('disclaimer')->getClientOriginalExtension();
            $uniqueName    = $originalName . '_' . uniqid() . '.' . $extension;

            // Salva o arquivo em public/pdf (pasta já existe no seu projeto)
            $request->file('disclaimer')->move(public_path('pdf'), $uniqueName);

            // Substitui o objeto de arquivo pelo nome único antes de salvar no banco
            $validated['disclaimer'] = $uniqueName;

         }

            Vehicle::create($validated);
            Alert::toast('Viatura cadastrada!', 'success');
            return to_route('vehicle.index');

    }

    public function update(Request $request, Vehicle $vehicle)
{
        $this->authorize('update', App\Models\Vehicle::class);

        $validated = $request->validate([
            'name'              => 'nullable',
            'identify'          => 'nullable',
            'division_id'       => 'required',
            'patrimony_type'    => 'nullable',
            'vehicle_type'      => 'required',
            'brand'             => 'required',
            'model'             => 'required',
            'original_plate'    => 'required',
            'reserved_plate'    => 'required',
            'kilometer'         => 'required',
            'credential_number' => 'required',
            'disclaimer'        => 'nullable|file|mimes:pdf',
            'observations'      => 'nullable',
            'status'            => 'nullable',
        ],[
            'division_id.required'       => 'O campo setor é obrigatório',
            'vehicle_type.required'      => 'O campo tipo de veículo é obrigatório',
            'brand.required'             => 'O campo marca é obrigatório',
            'model.required'             => 'O campo modelo é obrigatório',
            'original_plate.required'    => 'O campo placa original é obrigatório',
            'kilometer.required'         => 'O campo kilometragem é obrigatório',
            'credential_number.required' => 'O campo nº credencial é obrigatório',
        ]);

        // Trata o status do checkbox (não enviado quando desmarcado)
        $validated['status'] = $request->has('status') ? 1 : 0;

        // Se um novo PDF foi enviado, substitui o antigo
        if ($request->hasFile('disclaimer')) {

            // Remove o arquivo antigo se existir
            if ($vehicle->disclaimer && file_exists(public_path('pdf/' . $vehicle->disclaimer))) {
                unlink(public_path('pdf/' . $vehicle->disclaimer));
            }

            $originalName           = pathinfo($request->file('disclaimer')->getClientOriginalName(), PATHINFO_FILENAME);
            $extension              = $request->file('disclaimer')->getClientOriginalExtension();
            $uniqueName             = $originalName . '_' . uniqid() . '.' . $extension;
            $request->file('disclaimer')->move(public_path('pdf'), $uniqueName);
            $validated['disclaimer'] = $uniqueName;

        } else {
            // Mantém o termo anterior
            unset($validated['disclaimer']);
        }

        $vehicle->update($validated);
        Alert::toast('Viatura atualizada!', 'success');
        return to_route('vehicle.index');
}

}
