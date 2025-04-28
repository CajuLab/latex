<?php

namespace App\Services\PDF\Providers;

use Exception;
use Ismaelw\LaraTeX\LaraTeX;
use Illuminate\Contracts\View\View;
use App\Services\PDF\Contracts\PdfInterface;

class Latex implements PdfInterface
{
    private LaraTeX $latex;

    public function __construct()
    {
        $this->latex = new LaraTeX();
    }
    // private string $filename = 'document.pdf';

    public function filename(string $filename)
    {
        $this->filename = $filename;
    }

    public function setHeader(View $view)
    {
        // logica pra add o header

        return $this->latex;
    }

    public function setTitle(string $title)
    {
        $this->latex = $title;
        return $this;
    }

    public function setView(string $page, array $data = [])
    {
        // $this->dados['view']['page'] = $page;
        // $this->dados['view']['data'] = $data;
    }

    public function setOrientation(string $orientation)
    {
        // $this->dados['orientation'] = $orientation;
    }

    public function stream()
    {
        return (new LaraTeX('relatorios.tex'))->with([
            'prefeitura' => 'John Doe'            
        ])->inline('document');
    }

    public function setFooter(View $view)
    {
        // $this->dados['footer'] = $view;

        return $this->latex;
    }

}