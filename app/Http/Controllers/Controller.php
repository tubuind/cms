<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        $this->detectedLanguage();
    }

    private function detectedLanguage(){
        $lang = null;
        $listLanguage = config('app.list_locale');
        $cookieLang = Cookie::get('lang');

        if (!empty($cookieLang)) {
            $lang = Crypt::decrypt($cookieLang);
        }

        if (!array_key_exists ($lang, $listLanguage)) {
            $language = config('app.default_locale');
            $lang = $language['alias'];
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
