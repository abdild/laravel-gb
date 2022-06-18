<?php

declare(strict_types=1);

namespace App\Services;

use Illuminate\Http\UploadedFile;
use Symfony\Component\HttpFoundation\File\Exception\UploadException;

class UploadService
{
    public function uploadImage(UploadedFile $file): string
    {
        $path = $file->storeAs('news', $file->hashName(), 'upload');
        if (!$path) {
            throw new UploadException("File wasn\'t upload");
        }

        return $path;
    }
}
