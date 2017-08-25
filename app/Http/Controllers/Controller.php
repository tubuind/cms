<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->detectedLanguage();
    }

    private function detectedLanguage(){
        $listLanguage = config('app.list_locale');
        $lang = Cookie::get('lang');

        if (!array_key_exists ($lang, $listLanguage)) {
            $language = config('app.default_locale');
            $cookieLang = $language['alias'];
        }
        else{
            $language = $listLanguage[$lang];
        }

        unset($listLanguage[$lang]);

        App::setLocale($lang);
        View::share('listLanguage', $listLanguage);
        View::share('language', $language);
    }
}
