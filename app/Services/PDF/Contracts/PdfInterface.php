<?php

namespace App\Services\PDF\Contracts;

use Illuminate\Contracts\View\View;

interface PdfInterface
{
    public function setTitle(string $title);
    public function setHeader(string $page, array $data = []);
    public function setFooter(string $page, array $data = []);
    public function setView(string $page, array $data = []);
    public function setOrientation(string $orientation);
    public function filename(string $filename);
    public function stream();

}
