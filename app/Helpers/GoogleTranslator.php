<?php

namespace App\Helpers;

use App\Services\GoogleTranslateService;


trait GoogleTranslator{
    public function __($text,$language = 'en'){
        return (new GoogleTranslateService())->translate($text,$language);
    }
}