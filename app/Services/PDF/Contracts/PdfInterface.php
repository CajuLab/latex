<?php

namespace App\Services\PDF\Contracts;

use Illuminate\Contracts\View\View;

interface PdfInterface
{
    public function setFilename(string $filename): static;
    public function setOrientation(string $orientation): static;
    public function setTitle(string $title): static;
    public function setView(string $page, array $data = []): static;
    public function setData(array $data = []): static;
    public function stream();
    
}
