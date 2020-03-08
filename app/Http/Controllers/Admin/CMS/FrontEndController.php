<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function index()
    {
        $jsonString = file_get_contents(base_path('content.json'));
        $contentFile = json_decode($jsonString, true);
        $page_content = $contentFile['pages'];

        $languages = Language::get();
        $items = ['header' => 'Header', 'footer' => 'Footer', 'home' => 'Home', 'about' => 'About Us', 'courses' => 'Courses', 'contact' => 'Contact', 'faq' => 'FAQ', 'sign_up' => 'Register', 'sign_in' => 'Sign In'];

        return view('pages.admin.cms.front-end', [
            'items' => $items,
            'languages' => $languages,
            'page_content' => $page_content,
        ]);
    }

    public function post(Request $request)
    {
        $jsonString = file_get_contents(base_path('content.json'));
        $contentFile = json_decode($jsonString, true);

        $input = $request->except('_token');

        foreach (Language::get() as $language) {
            $contentFile['pages'][$language->lang]['frontend'] = $input[$language->lang]['frontend'];
        }

        $contentText = json_encode($contentFile);
        file_put_contents(base_path('content.json'), $contentText);

        return redirect()
            ->back()
            ->with('success', 'Content successfully updated.');
    }
}
