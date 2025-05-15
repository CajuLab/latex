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
            ->filename('document.pdf')
            ->setHeader('/views/relatorios/header.blade.php', [
                'estado' => 'ESTADO DO PIAUÍ',
                'prefeitura' => 'PREFEITURA MUNICIPAL DE NOSSA SENHORA DOS REMÉDIOS',
                'secretaria' => 'SECRETARIA MUNICIPAL DE EDUCAÇÃO',
                'gabinete' => 'GABINETE DA SECRETÁRIA',
                'cnpj' => '30.006.293/0001-85',
                'logradouro' => 'Rua Alfredo Lages, 380 – Centro',
                ])
            ->setFooter('/views/relatorios/footer.blade.php', [
                'municipio' => 'Nossa Senhora dos Remédios – Piauí',
                'telefone' => '(86) 3245-1204',
                'cep' => '64140.000',
                ])
                
            ->setView('relatorios.tex', [
                            'prefeitura' => 'PREFEITURA DA NASSAU',
                        ]);

        return $this->pdf->stream();
    }
}
