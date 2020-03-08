<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use App\Language;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ComponentsController extends Controller
{
    //
    public function index()
    {
        $jsonString = file_get_contents(base_path('content.json'));
        $contentFile = json_decode($jsonString, true);
        $page_content = $contentFile['pages'];

        $languages = Language::get();

        return view('pages.admin.cms.components', [
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
            $contentFile['pages'][$language->lang]['components'] = $input[$language->lang]['components'];
        }

        $contentText = json_encode($contentFile);
        file_put_contents(base_path('content.json'), $contentText);

        return redirect()
            ->back()
            ->with('success', 'Content successfully updated.');
    }
}
