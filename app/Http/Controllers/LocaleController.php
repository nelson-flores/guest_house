<?php

namespace App\Http\Controllers;

use App\Services\pdf\DomPdfServiceImpl;
use App\Services\pdf\MPdfServiceImpl;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Session;

class LocaleController extends Controller
{
    public function change($locale)
    {
        if (!\in_array($locale, ['pt', 'en'])) {
            abort(400);
        }

        App::setLocale($locale);
        Session::put('locale', $locale);

        return redirect()->back();
    }
    public function teste(){
    }
}
