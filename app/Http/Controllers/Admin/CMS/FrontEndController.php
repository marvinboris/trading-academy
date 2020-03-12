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
        $items = ['header' => 'Header', 'footer' => 'Footer', 'home' => 'Home', 'about' => 'About Us', 'courses' => 'Courses', 'contact' => 'Contact', 'faq' => 'FAQ', 'blog' => 'Blog', 'post' => 'Post', 'sign_up' => 'Register', 'sign_in' => 'Sign In'];

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

        $languages = Language::get();

        if ($request->has('en.frontend.pages.home.slider.content.0.img')) {
            if ($file = $request->file('en.frontend.pages.home.slider.content.0.img')) {
                $fileName = $file->getClientOriginalName();
                $file->move('images', $fileName);
                foreach ($languages as $language) {
                    $input[$language->lang]['frontend']['pages']['home']['slider']['content'][0]['img'] = '/images/' . htmlspecialchars($fileName);
                }
            }
        } else foreach ($languages as $language) {
            $input[$language->lang]['frontend']['pages']['home']['slider']['content'][0]['img'] = $contentFile['pages'][$language->lang]['frontend']['pages']['home']['slider']['content'][0]['img'];
        }

        if ($request->has('en.frontend.pages.home.slider.content.1.img')) {
            if ($file = $request->file('en.frontend.pages.home.slider.content.1.img')) {
                $fileName = $file->getClientOriginalName();
                $file->move('images', $fileName);
                foreach ($languages as $language) {
                    $input[$language->lang]['frontend']['pages']['home']['slider']['content'][1]['img'] = '/images/' . htmlspecialchars($fileName);
                }
            }
        } else foreach ($languages as $language) {
            $input[$language->lang]['frontend']['pages']['home']['slider']['content'][1]['img'] = $contentFile['pages'][$language->lang]['frontend']['pages']['home']['slider']['content'][1]['img'];
        }

        if ($request->has('en.frontend.pages.home.slider.content.2.img')) {
            if ($file = $request->file('en.frontend.pages.home.slider.content.2.img')) {
                $fileName = $file->getClientOriginalName();
                $file->move('images', $fileName);
                foreach ($languages as $language) {
                    $input[$language->lang]['frontend']['pages']['home']['slider']['content'][2]['img'] = '/images/' . htmlspecialchars($fileName);
                }
            }
        } else foreach ($languages as $language) {
            $input[$language->lang]['frontend']['pages']['home']['slider']['content'][2]['img'] = $contentFile['pages'][$language->lang]['frontend']['pages']['home']['slider']['content'][2]['img'];
        }

        if ($request->has('en.frontend.pages.home.presentation.first_pic')) {
            if ($file = $request->file('en.frontend.pages.home.presentation.first_pic')) {
                $fileName = $file->getClientOriginalName();
                $file->move('images', $fileName);
                foreach ($languages as $language) {
                    $input[$language->lang]['frontend']['pages']['home']['presentation']['first_pic'] = '/images/' . htmlspecialchars($fileName);
                }
            }
        } else foreach ($languages as $language) {
            $input[$language->lang]['frontend']['pages']['home']['presentation']['first_pic'] = $contentFile['pages'][$language->lang]['frontend']['pages']['home']['presentation']['first_pic'];
        }

        if ($request->has('en.frontend.pages.home.presentation.second_pic')) {
            if ($file = $request->file('en.frontend.pages.home.presentation.second_pic')) {
                $fileName = $file->getClientOriginalName();
                $file->move('images', $fileName);
                foreach ($languages as $language) {
                    $input[$language->lang]['frontend']['pages']['home']['presentation']['second_pic'] = '/images/' . htmlspecialchars($fileName);
                }
            }
        } else foreach ($languages as $language) {
            $input[$language->lang]['frontend']['pages']['home']['presentation']['second_pic'] = $contentFile['pages'][$language->lang]['frontend']['pages']['home']['presentation']['second_pic'];
        }

        if ($request->has('en.frontend.pages.home.level_courses.polygon')) {
            if ($file = $request->file('en.frontend.pages.home.level_courses.polygon')) {
                $fileName = $file->getClientOriginalName();
                $file->move('images', $fileName);
                foreach ($languages as $language) {
                    $input[$language->lang]['frontend']['pages']['home']['level_courses']['polygon'] = '/images/' . htmlspecialchars($fileName);
                }
            }
        } else foreach ($languages as $language) {
            $input[$language->lang]['frontend']['pages']['home']['level_courses']['polygon'] = $contentFile['pages'][$language->lang]['frontend']['pages']['home']['level_courses']['polygon'];
        }

        if ($request->has('en.frontend.pages.about.about.img')) {
            if ($file = $request->file('en.frontend.pages.about.about.img')) {
                $fileName = $file->getClientOriginalName();
                $file->move('images', $fileName);
                foreach ($languages as $language) {
                    $input[$language->lang]['frontend']['pages']['about']['about']['img'] = '/images/' . htmlspecialchars($fileName);
                }
            }
        } else foreach ($languages as $language) {
            $input[$language->lang]['frontend']['pages']['about']['about']['img'] = $contentFile['pages'][$language->lang]['frontend']['pages']['about']['about']['img'];
        }

        if ($request->has('en.frontend.pages.sign_in.img')) {
            if ($file = $request->file('en.frontend.pages.sign_in.img')) {
                $fileName = $file->getClientOriginalName();
                $file->move('images', $fileName);
                foreach ($languages as $language) {
                    $input[$language->lang]['frontend']['pages']['sign_in']['img'] = '/images/' . htmlspecialchars($fileName);
                }
            }
        } else foreach ($languages as $language) {
            $input[$language->lang]['frontend']['pages']['sign_in']['img'] = $contentFile['pages'][$language->lang]['frontend']['pages']['sign_in']['img'];
        }

        if ($request->has('en.frontend.pages.sign_up.img')) {
            if ($file = $request->file('en.frontend.pages.sign_up.img')) {
                $fileName = $file->getClientOriginalName();
                $file->move('images', $fileName);
                foreach ($languages as $language) {
                    $input[$language->lang]['frontend']['pages']['sign_up']['img'] = '/images/' . htmlspecialchars($fileName);
                }
            }
        } else foreach ($languages as $language) {
            $input[$language->lang]['frontend']['pages']['sign_up']['img'] = $contentFile['pages'][$language->lang]['frontend']['pages']['sign_up']['img'];
        }

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
