<?php

namespace App\Services\PDF;

use Exception;
use Illuminate\Contracts\View\View;
use App\Services\PDF\Providers\Latex;
use App\Services\PDF\Contracts\PdfInterface;

class BasePDF implements PdfInterface
{
    
    public function __construct(private PdfInterface $provider) {
        // if($provider === 'latex')
        //     $this->provider = new Latex();
        // if($provider === 'wkhtmltopdf')
        //     $this->provider = new wk();
    }

    public function filename(string $filename)
    {
        $this->provider->filename($filename);
        return $this;
    }

    public function setHeader(View $view)
    {
        throw new Exception('No implements');
    }

    public function setTitle(string $title)
    {
        $this->provider->filename($title);
    }

    public function setView(string $page, array $data = [])
    {
        $this->provider->setView($page, $data);
        return $this;
    }

    public function setOrientation(string $orientation)
    {
        throw new Exception('No implements');
    }

    public function stream()
    {
        return $this->provider->stream();
    }

    public function setFooter(View $view)
    {
        throw new Exception('No implements');
    }
}
