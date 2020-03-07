<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function index()
    {
        return view('pages.admin.cms.front-end.index');
    }

    public function page($page)
    {
        $pages = ['header', 'footer', 'welcome', 'about-us', 'blog', 'faq', 'courses', 'sign-in', 'sign-up'];

        if (!in_array($page, $pages)) return redirect()
            ->back()
            ->with('danger', 'This component does not exist.');

        $jsonString = file_get_contents(base_path('content.json'));
        $contentFile = json_decode($jsonString, true);
        $page_content = $contentFile['front-end'][$page];

        return view('pages.admin.cms.front-end.' . $page, [
            'page_content' => $page_content
        ]);
    }
}
