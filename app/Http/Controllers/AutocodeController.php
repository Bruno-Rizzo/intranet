<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use SimpleSoftwareIO\QrCode\Facades\QrCode;
use App\Models\Autocode;
use App\Models\Division;
use Carbon\Carbon;

class AutocodeController extends Controller
{
    public function index()
    {
        $divisions = Division::all()->sortBy('name');
        return view('site.qrcode.index',compact('divisions'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'origin'      => 'required',
            'description' => 'required',
        ],[
            'origin.required'      => 'O campo origem é obrigatório',
            'description.required' => 'O campo descrição é obrigatório'
        ]);

        $autocode = new Autocode;
        $autocode->origin=Division::where('id',$validated['origin'])->first();
        $autocode->origin=$autocode->origin['name'];
        $autocode->description=$validated['description'];

        $autocode->save();

        $origin      = $autocode->origin;
        $description = $autocode->description;
        $date        = Carbon::now()->format('d/m/Y H:i:s');;
        $string      = "Origem: ".$origin." - "."Descrição: ".$description." - "."Data: ".$date;

        $qrcode = QrCode::generate($string);

        return view('site.qrcode.store')->with('qrcode',$qrcode);
    }
}
