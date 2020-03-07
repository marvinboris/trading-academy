<?php

namespace App\Http\Controllers\Admin\CMS;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class ComponentsController extends Controller
{
    //
    public function index()
    {
        $jsonString = file_get_contents(base_path('content.json'));
        $contentFile = json_decode($jsonString, true);
        $page_content = $contentFile['pages'][Session::get('lang')]['components'];

        return view('pages.admin.cms.components', [
            'page_content' => $page_content
        ]);
    }

    public function post(Request $request)
    {
        $jsonString = file_get_contents(base_path('content.json'));
        $contentFile = json_decode($jsonString, true);

        $input = $request->except('_token');

        if ($file = $request->file('logo')) {
            $fileName = $file->getClientOriginalName();
            $file->move('images', $fileName);
            $input['logo'] = '/images/' . htmlspecialchars($fileName);
        } else $input['logo'] = $contentFile['global']['logo'];

        $contentFile['global'] = $input;

        $contentText = json_encode($contentFile);
        file_put_contents(base_path('content.json'), $contentText);

        return redirect()
            ->back()
            ->with('success', 'Content successfully updated.');
    }
}
