<?php

namespace App\Services;

class ProductImgResolver
{
    public static function resolve(?string $image): string
    {
        if (!$image || trim($image) === '') {
            return 'default.png';
        }

        return $image;
    }
}
