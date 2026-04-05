<?php

declare(strict_types=1);

namespace App\Traits;

use Illuminate\Support\Str;
use Intervention\Image\Laravel\Facades\Image;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Log;

trait IUpload
{
    /**
     * Upload an image, convert it to WebP format, and save it.
     */
    public function uploadImage($file, $path)
    {
        // Ensure directory exists in storage/public
        $dir = $this->handleNotFoundDirectories($path);

        // Generate unique filename
        $name = Str::random(10) . '.webp';

        // Full storage path
        $fullPath = storage_path("app/public/{$dir}/{$name}");

        // Read and convert to WebP with quality 90
        $image = Image::read($file)
            // ->toWebp(90)
            ->save($fullPath);

        return "{$dir}/{$name}";
    }

    /**
     * Handle not found directories and create them if needed.
     */
    public function handleNotFoundDirectories($path)
    {
        $position = strpos($path, 'public/');

        if ($position !== false) {
            $subPath = substr($path, $position + strlen('public/'));
            $this->mkdirIfNotExists($subPath);
            return $subPath;
        }

        $this->mkdirIfNotExists($path);
        return $path;
    }

    /**
     * Create directory if it does not exist.
     */
    public function mkdirIfNotExists($path)
    {
        $fullPath = storage_path('app/public/' . $path);
        if (!file_exists($fullPath)) {
            mkdir($fullPath, 0777, true);
        }
    }

    /**
     * Upload a document and save it.
     */
    public function uploadDocument($file, $path)
    {
        // Handle not found directories
        $dir = $this->handleNotFoundDirectories($path);

        // Create unique name for the document with the original extension
        $filename = Str::random(10) . '.' . $file->getClientOriginalExtension();

        Storage::disk('public')->putFileAs($dir, $file, $filename);

        return $dir . '/' . $filename;
    }

    /**
     * Delete file from filesystem.
     */
    public function deleteFile(?string $path = null)
    {
        try {
            if (isset($path)) {
                $fullPath = storage_path('app/public/' . $path);
                if (file_exists($fullPath)) {
                    unlink($fullPath);
                }
            }
        } catch (\Exception $e) {
            Log::error($e->getMessage());
        }

    }
}
