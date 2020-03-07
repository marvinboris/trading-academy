<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class BackEndController extends Controller
{
    //
    public function index()
    {
        return view('pages.admin.cms.back-end.index');
    }
}
