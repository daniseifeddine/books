<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PreferencesController extends Controller
{


    // language converter function

    function Language_converter($local_language)
    {
        $allowedLocales = ['ar', 'en'];

        if (in_array($local_language, $allowedLocales)) {
            session(['locale' => $local_language]);
        }

        return redirect()->back();
    }
}
