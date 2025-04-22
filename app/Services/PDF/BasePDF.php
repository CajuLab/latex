<?php

namespace App\Services\PDF;

use Ismaelw\LaraTeX\LaraTeX;
use App\Services\PDF\Contracts\PdfInterface;

class BasePDF implements PdfInterface
{
    public function __construct(string $provider = '') {
        if($provider === 'latex')
            $this->provider = new LaraTeX();
    }

    public function setHeader(View $view)
    {
        throw new Exception('No implements');
    }

    public function setTitle(string $title)
    {
        throw new Exception('No implements');
    }

    public function setView(string $page, array $data = [])
    {
        $this->provider->setView('relatorio.tex', ['dados' => 'prefeitura']);
    }

    public function setOrientation(string $orientation)
    {
        throw new Exception('No implements');
    }

    public function stream()
    {
        throw new Exception('No implements');
    }

    public function setFooter(View $view)
    {
        throw new Exception('No implements');
    }
}
