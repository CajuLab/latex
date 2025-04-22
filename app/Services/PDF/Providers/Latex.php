<?php

namespace App\Services\PDF\Providers;

use Exception;
use Ismaelw\LaraTeX\LaraTeX;
use Illuminate\Contracts\View\View;
use App\Services\PDF\Contracts\PdfInterface;

class Latex implements PdfInterface
{
    private array $dados = [];
    private string $filename = 'document.pdf';

    public function setFilename(string $filename)
    {
        $this->filename = $filename;
    }

    public function setHeader(View $view)
    {
        $this->dados['header'] = $title;
    }

    public function setTitle(string $title)
    {
        $this->dados['title'] = $title;
    }

    public function setView(string $page, array $data = [])
    {
        $this->dados['view']['page'] = $page;
        $this->dados['view']['data'] = $data;
    }

    public function setOrientation(string $orientation)
    {
        $this->dados['orientation'] = $orientation;
    }

    public function stream()
    {
        return $latex = (new LaraTeX($this->dados['view']['page']))
        ->with($this->dados['view']['data'])
        ->inline($this->filename);
    }

    public function setFooter(View $view)
    {
        $this->dados['footer'] = $view;
    }

}
