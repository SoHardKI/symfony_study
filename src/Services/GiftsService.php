<?php
namespace App\Services;

class GiftsService
{
    public $gifts = ['oasdas', 'adsad', 'asdsad', 'sadsad123e13'];

    public function __construct()
    {
        shuffle($this->gifts);
    }

}