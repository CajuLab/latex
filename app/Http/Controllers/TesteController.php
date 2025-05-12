<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ismaelw\LaraTeX\LaraTeX;
use App\Services\PDF\BasePDF;

class TesteController extends Controller
{
    private BasePDF $pdf;

    public function __construct() {
        $this->pdf = new BasePDF('latex');
    }

    public function __invoke(Request $request)
    {
        $this->pdf
            ->filename('capeta.pdf')
            ->setHeader('/views/relatorios/header.blade.php', [
                'estado' => 'ESTADO DO PIAUÍ',
                'prefeitura' => 'PREFEITURA MUNICIPAL DE NOSSA SENHORA DOS REMÉDIOS',
                'secretaria' => 'SECRETARIA MUNICIPAL DE EDUCAÇÃO',
                'gabinete' => 'GABINETE DA SECRETÁRIA',
                'cnpj' => '30.006.293/0001-85',
                'logradouro' => 'Rua Alfredo Lages, 380 – Centro',
                ])
            ->setView('relatorios.tex', [
                            'prefeitura' => 'PREFEITURA DA NASSAU',
                        ]);

        return $this->pdf->stream();
    }
}
