<?php

namespace App\Http\Controllers;

use App\Services\PDF\Providers\Latex;
use Illuminate\Http\Request;
use Ismaelw\LaraTeX\LaraTeX;
use App\Services\PDF\BasePDF;

class TesteController extends Controller
{
    private BasePDF $pdf;

    public function __construct() {
    }
    
    public function __invoke(Request $request)
    {

        return (new LaraTeX('welcome'))->with ([
            'Name' => 'John Doe',
            'Orientation' => 'portrait',
            'Dob' => '01/01/1990',
            'SpecialCharacters'

        ])
        return $pdf->stream();
    }
}
