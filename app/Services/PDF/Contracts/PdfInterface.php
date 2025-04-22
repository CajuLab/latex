<?php

namespace App\Services\PDF\Contracts;

use Illuminate\Contracts\View\View;

interface PdfInterface
{
    public function filename(string $filename);
    public function setHeader(View $view);
    public function setTitle(string $title);
    public function setView(string $page, array $data = []);
    public function setOrientation(string $orientation);
    public function stream();
    public function setFooter(View $view);

}
