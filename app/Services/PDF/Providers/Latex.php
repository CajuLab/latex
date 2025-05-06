<?php

namespace App\Services\PDF\Providers;

use Exception;
use Ismaelw\LaraTeX\LaraTeX;
use Illuminate\Contracts\View\View;
use App\Services\PDF\Contracts\PdfInterface;

class Latex implements PdfInterface
{
    private array $data = [];
    private string $filename = 'document.pdf';

    public function filename(string $filename)
    {
        $this->filename = $filename;
    }

    public function setTitle(string $title)
    {
        $this->data['title'] = $title;
    }

    public function setHeader(string $page, array $data = [])
    {
        $this->data['header']['page'] = $page;
        $this->data['header']['data'] = $data;
    }

    public function setFooter(string $page, array $data = [])
    {
        $this->data['footer']['page'] = $page;
        $this->data['footer']['data'] = $data;
    }

    public function setView(string $page, array $data = [])
    {
        $this->data['view']['page'] = $page;
        $this->data['view']['data'] = $data;
    }

    public function setOrientation(string $orientation)
    {
        $this->data['orientation'] = $orientation;
    }

    public function stream()
    {
        return $latex = (new LaraTeX($this->data['view']['page']))
        ->with(['data' => $this->data])
        ->inline($this->filename);
    }

}
