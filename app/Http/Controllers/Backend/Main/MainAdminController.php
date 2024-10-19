<?php

namespace App\Http\Controllers\Backend\Main;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class MainAdminController extends Controller
{
    /**
     * @param Request $request
     * @return \Illuminate\Http\Response
     */
    public function __invoke(Request $request)
    {
        return response()->view('backend.main.main-backend');
    }
}
