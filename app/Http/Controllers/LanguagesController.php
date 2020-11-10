<?php

namespace App\Http\Controllers;

class LanguagesController
{
    public function set($locale) {
        //App::setLocale($locale);
        session(['applocale' => $locale]);
        return back();
    }
}