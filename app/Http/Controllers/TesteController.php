<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Ismaelw\LaraTeX\LaraTeX;
use App\Services\PDF\BasePDF;

class TesteController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $pdf = new BasePDF('latex');
        $pdf->setView('relatorios.tex');
        $pdf->stream();
        // return (new LaraTeX)->dryRun();
        // return (new LaraTeX('relatorios.tex'))
        //             ->with([
        //                 'prefeitura' => 'PARNAIBA PIAUI'
        //             ])->inline('matricula.pdf');
        // return (new LaraTeX('latex.tex'))->with([
        //     'Name' => 'Luiz Lins',
        //     'Dob' => '27/10/1985',
        //     'SpecialCharacters' => '$ (a < b) $',
        //     'languages' => [
        //         'Português',
        //         'Chinês',
        //         'Espanhol'
        //     ]
        // ])->inline('test.pdf');
        // ])->savePdf(storage_path('app/export/test.pdf'));
    }
}
