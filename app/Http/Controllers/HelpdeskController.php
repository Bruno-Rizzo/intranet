<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use App\Models\Helpdesk;

class HelpdeskController extends Controller
{
    public function index()
    {
        $calls = Helpdesk::where('status',0)->get();
        return view('dashboard.helpdesk.index', compact('calls'));
    }

    public function edit(Helpdesk $helpdesk)
    {
        $this->authorize('view', App\Models\Helpdesk::class);
        $call = Helpdesk::find($helpdesk->id);
        return view('dashboard.helpdesk.edit', compact('call'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'name'        => ['required','min:4'],
            'whatsapp'    => ['required','min:9'],
            'division_id' => ['required'],
            'trouble_id'  => ['required'],
            'description' => ['max:255'],
        ],[
            'division_id.required' => 'O campo Divisão é obrigatório',
            'trouble_id.required'  => 'O campo Problema é obrigatório'
        ]);

        Helpdesk::create($validated);
        Alert::toast('Chamado cadastrado!', 'success');
        return to_route('home');
    }

    public function update(Request $request, Helpdesk $helpdesk)
    {
        $this->authorize('update', App\Models\Helpdesk::class);
        $call = Helpdesk::find($helpdesk->id);
        $call->status = 1;
        $call->save();

        Alert::toast('Chamado finalizado!', 'success');
        return to_route('helpdesk.index');
    }

    public function confirm($id)
    {
        Alert::question('Excluir Chamado','Deseja excluir este chamado?')
        ->showConfirmButton('<a href="/helpdesk/delete/'.$id.'" style="color:#FFF;text-decoration:none">Excluir</a>', '#BB2D3B')
        ->toHtml()
        ->showCancelButton('Cancelar', '#3085d6')->reverseButtons();
        return redirect()->back();
    }

    public function delete($id)
    {
        $this->authorize('delete', App\Models\Helpdesk::class);
        Helpdesk::find($id)->delete();
        Alert::toast('Chamado excluído!', 'error');
        return redirect()->back();
    }

}
