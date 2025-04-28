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
            ->setHeader('relatorios.header', [
                'prefeitura' => 'PREFEITURA DA NASSAU',
            ])
            ->setFooter('relatorios.footer', [
                'prefeitura' => 'PREFEITURA DA NASSAU',
            ])
            ->setView('relatorios.tex', [
                            'prefeitura' => 'PREFEITURA DA NASSAU',
                        ]);

        return $this->pdf->stream();
    }
}
