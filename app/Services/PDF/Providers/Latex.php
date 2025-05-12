<?php

namespace App\Services\PDF\Providers;

use Exception;
use Ismaelw\LaraTeX\LaraTeX;
use Illuminate\Contracts\View\View;
use App\Services\PDF\Contracts\PdfInterface;


class Latex implements PdfInterface
{
    private array $content = [];
    private array $header = [];
    private array $footer = [];
    private array $options = [];
    private string $filename = 'document.pdf';

    public function filename(string $filename)
    {
        $this->filename = $filename;
    }

    public function setTitle(string $title)
    {
        $this->options['title'] = $title;
    }

    public function setHeader(string $page, array $data = [])
    {
        $header = new LatexHeader(...$data);
        $this->header['data'] = $header;
        $this->header['page'] = $page;

    }

    public function setFooter(string $page, array $data = [])
    {
        $this->footer['page'] = $page;
        $this->footer['data'] = $data;
    }

    public function setView(string $page, array $data = [])
    {
        $this->content['page'] = $page;
        $this->content['data'] = $data;
    }

    public function setOrientation(string $orientation)
    {
        $this->options['orientation'] = $orientation;
    }

    public function stream()
    {
        // dd((new LaraTeX())->convertHtmlToLatex(file_get_contents(resource_path('/views/relatorios/header.blade.php'))));
        return (new LaraTeX($this->content['page']))
            ->with(
                [
                    'data' => $this->content['data'],
                    'header' => [
                        'include' => file_get_contents(resource_path($this->header['page'])),
                        'data' => $this->header['data'],
                    ],
                ]
            )
            ->inline($this->filename);
    }

}


class LatexHeader
{
    public function __construct(
        readonly public string $estado,
        public ?string $prefeitura = null,
        readonly public string $secretaria,
        readonly public ?string $gabinete = null,
        readonly public string $cnpj,
        readonly public string $logradouro,
        public ?string $logo_prefeitura = null,
        public ?string $logo_secretaria = null,
    ) {
        if (!isset($this->logo_prefeitura)) {
            $this->logo_prefeitura = storage_path('app/public/logo.png');
        }

        if (!isset($this->logo_secretaria)) {
            $this->logo_secretaria = storage_path('app/public/logosecretaria.png');
        }
    }
}