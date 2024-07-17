<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Division;
use App\Models\Position;
use App\Models\Matrial;
use App\Models\Acaution;
use App\Models\Administrative;
use App\Models\Movement;
use App\Models\AdmMovement;
use App\Models\Type;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Validation\Rule;

class AdministrativeController extends Controller
{
    public function index()
    {
        return view('dashboard.administrative.index');
    }

    public function create()
    {
        $this->authorize('create', App\Models\Administrative::class);

        $divisions = Division::all();
        $positions = Position::all();
        $matrials  = Matrial::all();
        return view('dashboard.administrative.create', compact('divisions','positions','matrials'));
    }

    public function store(Request $request)
    {
        $this->authorize('create', App\Models\Administrative::class);

        $validated = $request->validate([
            'name'         => 'required|min:6',
            'identify'     => 'required|unique:administratives|numeric',
            'division_id'  => 'required',
            'position_id'  => 'required',
            'address'      => 'required',
            'complement'   => 'nullable',
            'county'       => 'required',
            'city'         => 'required',
            'phone'        => 'required',
            'email'        => 'required|email',
            'cpf'          => 'required',
            'rg'           => 'required',
            'birth'        => 'required',
            'entry'        => 'required',
            'matrial_id'   => 'required',
            'observations' => 'nullable',
        ],[
            'identify.required'    => 'O campo id funcional é obrigatório',
            'identify.unique'      => 'Este id funcional já está cadastrado',
            'identify.numeric'     => 'Utilize apenas números neste campo',
            'division_id.required' => 'O campo setor é obrigatório',
            'position_id.required' => 'O campo função é obrigatório',
            'address.required'     => 'O campo endereço é obrigatório',
            'county.required'      => 'O campo bairro é obrigatório',
            'city.required'        => 'O campo cidade é obrigatório',
            'city.required'        => 'O campo cidade é obrigatório',
            'phone.required'       => 'O campo celular é obrigatório',
            'birth.required'       => 'O campo dt.nascimento é obrigatório',
            'entry.required'       => 'O campo dt.admissão é obrigatório',
            'matrial_id.required'  => 'O campo estado civil é obrigatório',
        ]);
        Administrative::create($validated);
        Alert::toast('Servidor cadastrado!', 'success');
        return to_route('administrative.index');
    }

    public function search(Request $request)
    {
        $validated = $request->validate(['name'=>'required']);
        $search = Administrative::where('name','like', '%'.$validated['name'].'%')->get();
        return view('dashboard.administrative.index',compact('search'));
    }

    public function edit(Administrative $administrative)
    {
        $divisions = Division::all();
        $positions = Position::all();
        $matrials  = Matrial::all();
        $acautions = Acaution::where('administrative_id',$administrative->id)->get();
        $movements = AdmMovement::where('administrative_id',$administrative->id)->get();
        return view('dashboard.administrative.edit',compact('administrative','divisions','positions','matrials','acautions','movements'));
    }



    public function update(Request $request , Administrative $administrative)
    {
        $validated = $request->validate([
            'name'         => 'required|min:6',
            'identify'     => ['required','numeric',Rule::unique('administratives')->ignore($administrative)],
            'division_id'  => 'required',
            'position_id'  => 'required',
            'address'      => 'required',
            'complement'   => 'nullable',
            'county'       => 'required',
            'city'         => 'required',
            'phone'        => 'required',
            'email'        => 'required|email',
            'cpf'          => 'required',
            'rg'           => 'required',
            'birth'        => 'required',
            'entry'        => 'required',
            'matrial_id'   => 'required',
            'observations' => 'nullable',
        ],[
            'identify.required'    => 'O campo id funcional é obrigatório',
            'identify.unique'      => 'Este id funcional já está cadastrado',
            'identify.numeric'     => 'Utilize apenas números neste campo',
            'division_id.required' => 'O campo setor é obrigatório',
            'position_id.required' => 'O campo função é obrigatório',
            'address.required'     => 'O campo endereço é obrigatório',
            'county.required'      => 'O campo bairro é obrigatório',
            'city.required'        => 'O campo cidade é obrigatório',
            'city.required'        => 'O campo cidade é obrigatório',
            'phone.required'       => 'O campo celular é obrigatório',
            'birth.required'       => 'O campo dt.nascimento é obrigatório',
            'entry.required'       => 'O campo dt.admissão é obrigatório',
            'matrial_id.required'  => 'O campo estado civil é obrigatório',
        ]);

        $request->status ? $validated['status'] = 1 : $validated['status'] = 0;

        Administrative::find($administrative->id)->update($validated);
        Alert::toast('Servidor editado!', 'success');
        return to_route('administrative.edit',$administrative->id);

    }

    public function movement_create( Administrative $administrative)
    {
        $divisions = Division::all();
        $positions = Position::all();
        $movements = Movement::all();
        return view('dashboard.administrative.movement_create',compact('movements','divisions','positions','administrative'));
    }

    public function movement_store(Request $request , Administrative $administrative)
    {
        $validated = $request->validate([
            'division_id'  => 'required',
            'position_id'  => 'required',
            'movement_id'  => 'required',
            'date'         => 'required',
        ],[
            'division_id.required' => 'O campo setor é obrigatório',
            'position_id.required' => 'O campo função é obrigatório',
            'movement_id.required' => 'O campo movimentação é obrigatório',
        ]);
        $validated['administrative_id'] = $administrative->id;
        AdmMovement::create($validated);
        Alert::toast('Movimentação cadastrada!', 'success');
        return to_route('administrative.edit',$administrative->id);
    }

    public function movement_confirm($id)
    {
        Alert::question('Excluir Movimentação','Deseja excluir esta movimentação?')
        ->showConfirmButton('<a href="/movement/delete/'.$id.'" style="color:#FFF;text-decoration:none">Excluir</a>', '#BB2D3B')
        ->toHtml()
        ->showCancelButton('Cancelar', '#3085d6')->reverseButtons();
        return redirect()->back();
    }

    public function movement_delete($id)
    {
        $this->authorize('delete', App\Models\Administrative::class);

        AdmMovement::find($id)->delete();
        Alert::toast('Movimentação excluída!', 'error');
        return redirect()->back();
    }

    public function acaution_create(Administrative $administrative)
    {
        $types = Type::all();
        return view('dashboard.administrative.acaution_create',compact('types','administrative'));
    }

    public function acaution_store(Request $request, Administrative $administrative)
    {
        $validated = $request->validate([
            'type_id'         => 'required',
            'brand'           => 'required',
            'model'           => 'required',
            'caliber'         => 'required',
            'acaution_number' => 'required',
            'gun_number'      => 'required',
        ],[
            'type_id.required'         => 'O campo espécie é obrigatório',
            'brand.required'           => 'O campo marca é obrigatório',
            'model.required'           => 'O campo modelo é obrigatório',
            'caliber.required'         => 'O campo calibre é obrigatório',
            'acaution_number.required' => 'O campo cautela/craf é obrigatório',
            'gun_number.required'      => 'O campo nºarma é obrigatório',
        ]);
        $validated['administrative_id'] = $administrative->id;
        Acaution::create($validated);
        Alert::toast('Acautelamento cadastrado!', 'success');
        return to_route('administrative.edit',$administrative->id);
    }

    public function acaution_confirm($id)
    {
        Alert::question('Excluir Acautelamento','Deseja excluir este acautelamento?')
        ->showConfirmButton('<a href="/acaution/delete/'.$id.'" style="color:#FFF;text-decoration:none">Excluir</a>', '#BB2D3B')
        ->toHtml()
        ->showCancelButton('Cancelar', '#3085d6')->reverseButtons();
        return redirect()->back();
    }

    public function acaution_delete($id)
    {
        $this->authorize('create', App\Models\Administrative::class);

        Acaution::find($id)->delete();
        Alert::toast('Acautelamento excluído!', 'error');
        return redirect()->back();
    }

    public function download()
    {
        $pdf = public_path('pdf/atualizacao.pdf');
        return response()->download($pdf);
    }
}
