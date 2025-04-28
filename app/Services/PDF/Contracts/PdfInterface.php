<?php

namespace App\Services\PDF\Contracts;

use Illuminate\Contracts\View\View;

interface PdfInterface
{
    public function filename(string $filename);
    public function setOrientation(string $orientation);
    public function setTitle(string $title);
    public function setView(string $page, array $data = []);
    public function setHeader(View $view);
    public function setFooter(View $view);
    public function stream();
    
}
