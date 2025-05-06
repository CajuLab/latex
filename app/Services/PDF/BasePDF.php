<?php

namespace App\Services\PDF;

use Exception;
use Illuminate\Contracts\View\View;
use App\Services\PDF\Providers\Latex;
use App\Services\PDF\Contracts\PdfInterface;

class BasePDF implements PdfInterface
{

    public function __construct(private PdfInterface $provider)
    {
        // if($provider === 'latex')
        //     $this->provider = new Latex();
        // if($provider === 'wkhtmltopdf')
        //     $this->provider = new wk();
    }

    public function setFilename(string $filename): static
    {
        $this->provider->setFilename($filename);
        return $this;
    }

    public function setHeader(View $view): static
    {
        throw new Exception('No implements');
    }

    public function setTitle(string $title): static
    {
        $this->provider->filename($title);
    }

    public function setView(string $page, array $data = []): static
    {
        $this->provider->setView($page, $data);
        return $this;
    }

    public function setData(array $data = []): static
    {
        foreach ($data as $key => $value) {
            array_push($this->data, [$key => $value]);
        }
    }

    public function setOrientation(string $orientation): static
    {
        throw new Exception('No implements');
    }

    public function setFooter(View $view): static
    {
        throw new Exception('No implements');
    }

    public function stream()
    {
        return $this->provider->stream();
    }
}
