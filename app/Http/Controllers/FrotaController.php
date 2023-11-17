<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreUpdateFrotaRequest;
use Illuminate\Http\Request;
use App\Models\Frota;
use App\Services\FrotaService;
use Illuminate\Support\Facades\DB;


class FrotaController extends Controller
    {
        protected $frotaService;
    
        public function __construct(FrotaService $frotaService)
        {
            $this->frotaService = $frotaService;
        }
    
        public function importarcsv()
    {
        if (!$this->frotaService->tabelaFrotaEstaVazia()) {
            return redirect()->route('frota.index');
        }

        $csvData = file_get_contents('csv/frotas.csv');
        $rows = explode("\n", $csvData);
        $rows = array_slice($rows, 2);

        $dadosCSV = array_map('str_getcsv', $rows);

        $this->frotaService->importarCSV($dadosCSV);

        return redirect()->route('frota.index');
    }
    
    public function index()
    {
        $itensPorPagina = 10;

        $frotas = $this->frotaService->listarTodasFrotas($itensPorPagina);
        return view('frota.index', compact('frotas'));
    }
    
        public function create()
        {
            return view('frota.create');
        }
    
        public function store(StoreUpdateFrotaRequest $request)
        {
            $this->frotaService->criarFrota($request->all());
            return redirect()->route('frota.index')->with('success', 'Frota criada com sucesso.');
        }
    
        public function edit($id)
        {
            $frota = $this->frotaService->obterFrotaPorId($id);
    
            if (!empty($frota)) {
                return view('frota.edit', compact('frota'));
            } else {
                return redirect()->route('frota.index');
            }
        }
    
        public function update(Request $request, $id)
        {
            $data = [
                'modelo' => $request->modelo,
                'marca' => $request->marca,
                'placa' => $request->placa,
                'ano' => $request->ano,
                'ativo' => $request->ativo
            ];
    
            $this->frotaService->atualizarFrota($id, $data);
    
            return redirect()->route('frota.index')->with('success', 'Frota atualizada com sucesso.');
        }
    
        public function destroy($id)
        {
            $this->frotaService->excluirFrota($id);
            return redirect()->route('frota.index')->with('success', 'Frota excluída com sucesso.');
        }
}
