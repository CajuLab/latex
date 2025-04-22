<?php

namespace App\Services\PDF\Providers;

use Exception;
use App\Services\PDF\Contracts\PdfInterface;

class Latex implements PdfInterface
{

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
        return $this->stubPath = $page;
    }

    public function setOrientation(string $orientation)
    {
        throw new Exception('No implements');
    }

    public function stream()
    {
        return $this->inline('matricula.pdf');
    }

    public function setFooter(View $view)
    {
        throw new Exception('No implements');
    }

}
