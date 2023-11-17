<?php
// app/Services/FrotaService.php
namespace App\Services;

use App\Models\Frota;

class FrotaService
{

    public function tabelaFrotaEstaVazia()
    {
        return Frota::count() === 0;
    }

    public function importarCSV(array $dadosCSV)
    {
        foreach ($dadosCSV as $data) {
            if (isset($data[1])) {
                Frota::create([
                    'modelo' => $data[0],
                    'marca' => $data[1],
                    'placa' => $data[2],
                    'ano' => $data[3],
                    'ativo' => $data[4],
                ]);
            }
        }
    }

    public function listarTodasFrotas($itensPorPagina = 10)
    {
        return Frota::paginate($itensPorPagina);
    }

    public function criarFrota(array $dados)
    {
        return Frota::create($dados);
    }

    public function obterFrotaPorId($id)
    {
        return Frota::find($id);
    }

    public function atualizarFrota($id, array $dados)
    {
        Frota::where('id', $id)->update($dados);
    }

    public function excluirFrota($id)
    {
        Frota::where('id', $id)->delete();
    }
}
