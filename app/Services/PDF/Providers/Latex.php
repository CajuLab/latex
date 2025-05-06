<?php

namespace App\Services\PDF\Providers;

use Exception;
use Ismaelw\LaraTeX\LaraTeX;
use Illuminate\Contracts\View\View;
use App\Services\PDF\Contracts\PdfInterface;

class Latex implements PdfInterface
{
    private LaraTeX $latex;
    private array $properties = [
        'filename' => 'document.pdf',
        'title' => 'Relatório'
    ];

    public function __construct()
    {
        $this->latex = new LaraTeX();
    }

    public function setFilename(string $filename): static
    {
        $this->properties['filename'] = $filename;
        return $this;
    }

    public function setHeader(View $view): static
    {
        // logica pra add o header
        return $this;
    }

    public function setTitle(string $title): static
    {
        $this->properties['title'] = $title;
        return $this;
    }

    public function setView(string $page, array $data = []): static
    {
        // $this->dados['view']['page'] = $page;
        // $this->dados['view']['data'] = $data;
        return $this;
    }
    public function setData(array $data = []): static
    {
        foreach ($data as $key => $value) {
            array_push($this->data['data'], [$key => $value]);
        }
        return $this;
    }
    
    public function setOrientation(string $orientation): static
    {
        // $this->dados['orientation'] = $orientation;
        return $this;
    }
    
    public function setFooter(View $view): static
    {
        // $this->dados['footer'] = $view;
        return $this;
        // return $latex = (new LaraTeX($this->data['view']['page']))
        // ->with($this->data)
        // ->inline($this->filename);
    }
    
    public function stream()
    {
        $LatexString = (new LaraTeX)->convertHtmlToLatex(file_get_contents(resource_path()."/views/relatorios/header.blade.php"));
        dd($LatexString);
        return (new LaraTeX('relatorios.tex'))->with([
            'prefeitura' => 'John Doe',
            'header' => (new LaraTeX)->convertHtmlToLatex(file_get_contents(resource_path()."/views/relatorios/header.blade.php")),
            ,         
        ])->inline($this->properties['filename']);
    }
}