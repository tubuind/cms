<?php

namespace App\Http\Controllers\Guest;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cookie;
use function Symfony\Component\VarDumper\Tests\Fixtures\bar;
use App\Http\Controllers\Controller;

class LanguagesController extends Controller
{
    public function __construct() {
        parent::__construct();
    }
    
    /**
     * Set language of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function set(Request $request)
    {
        $locale = $request->input('lang');
        $listLanguage = config('app.list_locale');

        if (!array_key_exists($locale, $listLanguage)) {
            $locale = config('app.default_locale')['alias'];
        }
        else{
            $locale = $listLanguage[$locale]['alias'];
        }

        return back()->withCookie(Cookie::forever('lang', $locale));
    }
}
