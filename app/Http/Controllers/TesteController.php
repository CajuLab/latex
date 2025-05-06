<?php

namespace App\Http\Controllers;

use App\Services\PDF\Contracts\PdfInterface;
use App\Services\PDF\Providers\Latex;
use Illuminate\Http\Request;
use Ismaelw\LaraTeX\LaraTeX;
use App\Services\PDF\BasePDF;

class TesteController extends Controller
{
    private PdfInterface $pdf;

    public function __construct() {
        $this->pdf = new Latex();
    }
    
    public function __invoke(Request $request)
    {
        $this->pdf
            ->setFilename('document.pdf')
            // ->setHeader('relatorios.header', [
            //     'prefeitura' => 'Dados que vão está dentro do header',
            // ])
            // ->setFooter('relatorios.footer', [
            //     'prefeitura' => 'Aqui estara dentro do footer',
            // ])
            // ->setView('relatorios.tex', [
            //                 'prefeitura' => 'PREFEITURA DA NASSAU',
            // ])
            // ->setData([
            //     'conteudo' => 'asdasdasd',
            // ])
            ;

        return $this->pdf->stream();
    }
}
