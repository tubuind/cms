<?php

namespace App\Http\Controllers\Common;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CommonController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function error(Request $request)
    {
        return View('error');
    }

    public function loginYoutube(Request $request){
        return View('login_youtube');
    }
}
