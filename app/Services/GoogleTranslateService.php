<?php

namespace App\Services;

use Google\Cloud\Translate\V2\TranslateClient;

class GoogleTranslateService
{
    protected $translate;

    public function __construct()
    {
        $this->translate = new TranslateClient([
            'key' => config('services.google_translate.key'),
        ]);
    }

    public function translate($text, $target = 'en')
    {
        $result = $this->translate->translate($text, [
            'target' => $target
        ]);

        return $result['text'];
    }
}