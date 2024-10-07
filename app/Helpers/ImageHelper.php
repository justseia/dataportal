<?php

namespace App\Helpers;

use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Storage;

class ImageHelper
{
    public UploadedFile|null $file;

    public string $storage_path;

    public function toStoragePath(string $storage_path, ?string $current_file_path = null): array
    {
        $this->storage_path = $storage_path;
        $this->deleteFile($current_file_path);

        return $this->uploadAndGetResponse($this->file);
    }

    public function addMedia(?UploadedFile $file): static
    {
        $this->file = $file;

        return $this;
    }

    public function deleteFile(?string $file_path): void
    {
        if ($file_path) {
            if (Storage::exists($file_path)) {
                Storage::delete($file_path);
            }
        }
    }

    private function uploadAndGetResponse(UploadedFile $file): array
    {
        return [
            'name' => $file->getClientOriginalName(),
            'mime' => $file->getMimeType(),
            'ext' => $file->getClientOriginalExtension(),
            'size' => $file->getSize(),
            'url' => $file->store($this->storage_path),
        ];
    }
}
