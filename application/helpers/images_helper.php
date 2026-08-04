<?php
defined('BASEPATH') OR exit('No direct script access allowed');

/**
 * Mengonversi file gambar yang baru diunggah menjadi WebP dan menghapus file
 * sumbernya. Mengembalikan nama file WebP atau FALSE bila konversi gagal.
 */
if (!function_exists('convert_image_to_webp'))
{
    function convert_image_to_webp($directory, $filename, $quality = 82)
    {
        $source = rtrim($directory, '/') . '/' . $filename;
        $extension = strtolower(pathinfo($filename, PATHINFO_EXTENSION));

        if ($extension === 'webp') {
            return $filename;
        }

        if (!function_exists('imagecreatefromstring') || !function_exists('imagewebp')) {
            return FALSE;
        }

        $content = @file_get_contents($source);
        $image = $content === FALSE ? FALSE : @imagecreatefromstring($content);
        if ($image === FALSE) {
            return FALSE;
        }

        if (function_exists('imagepalettetotruecolor')) {
            imagepalettetotruecolor($image);
        }
        imagealphablending($image, TRUE);
        imagesavealpha($image, TRUE);

        $webp_filename = pathinfo($filename, PATHINFO_FILENAME) . '.webp';
        $target = rtrim($directory, '/') . '/' . $webp_filename;
        $converted = imagewebp($image, $target, $quality);
        imagedestroy($image);

        if (!$converted || !file_exists($target)) {
            return FALSE;
        }

        @unlink($source);
        return $webp_filename;
    }
}
