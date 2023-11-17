<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateFrotaRequest;
use Illuminate\Http\Request;
use App\Models\Frota;
use Illuminate\Support\Facades\DB;


class FrotaController extends Controller
{


    public function importarcsv()

    {
        $csvData = file_get_contents('csv/frotas.csv');
        $rows = explode("\n", $csvData);
        
        $rows = array_slice($rows, 2);

        foreach ($rows as $row) {
            $data = explode(",", $row);
            if (isset($data[1])) {

                $frota = new Frota();
                $frota->modelo = $data[0];
                $frota->marca = $data[1];
                $frota->placa = $data[2];
                $frota->ano = $data[3];
                $frota->ativo = $data[4];
                $frota->save();

            }

        }

        return redirect()->route('frota.index');

    }

    public function index(){
      
        $frotas = Frota::all();
        return view('frota.index', compact('frotas'));    
    }

    public function create()
    {
        return view('frota.create');
    }

    public function store(StoreUpdateFrotaRequest $request)
    {
       Frota::create($request->all());
       return redirect()->route('frota.index')->with('success', 'Frota criada com sucesso.');
    }

    public function edit($id)
    {
      $frota = Frota::where('id', $id)->first();
      if(!empty($frota)){
        return view('frota.edit', compact('frota'));
      }else{
        return redirect()->route('frota.index');
      }
     
    }


    public function update(Request $request,$id)
    {
        $data = [
            'modelo' => $request->modelo,
            'marca' => $request->marca,
            'placa' => $request->placa,
            'ano' => $request->ano,
            'ativo' => $request->ativo
        ];
        Frota::where('id', $id)->update($data);
        return redirect()->route('frota.index')->with('success', 'Frota atualizada com sucesso.');
    }

    public function destroy($id)
    {
        Frota::where('id', $id)->delete();
        return redirect()->route('frota.index')->with('success', 'Frota excuída com sucesso.');
    }
}


