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
            ->setView('relatorios.tex', [
                            'Name' => 'John Doe',
                            'Dob' => '01/01/1990',
                            'SpecialCharacters' => '$ (a < b) $',
                            'languages' => [
                                'English',
                                'Spanish',
                                'Italian',
                                'France',
                                'Portuguese',
                            ]
                        ]);

        return $this->pdf->stream();
    }
}
