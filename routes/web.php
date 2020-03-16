<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

use App\User;
use App\Language;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Request;
use Illuminate\Support\Facades\Session;

if (!Session::has('lang') || !Session::has('flag')) {
    if (Auth::check()) {
        $lang = Auth::user()->lang;
        Session::put('lang', $lang);
        Session::put('flag', Language::where('lang', $lang)->first()->flag);
    } else {
        Session::put('lang', 'en');
        Session::put('flag', 'gb');
    }
}

Route::name('lang')->get('lang/{lang}', function ($lang) {
    Session::put('lang', $lang);
    Session::put('flag', Language::where('lang', $lang)->first()->flag);
    return redirect()
        ->back();
});

Auth::routes();

Route::namespace('Admin')->name('admin.')->prefix('admin')->group(function () {
    Route::redirect('/', url('admin/login'));

    Route::namespace('Auth')->middleware('guest:admin')->group(function () {
        //Login Routes
        Route::get('login', 'LoginController@showLoginForm')->name('login');
        Route::post('login', 'LoginController@login');
        Route::post('logout', 'LoginController@logout')->name('logout');

        Route::get('verify', 'LoginController@getVerify')->name('verify');
        Route::post('verify', 'LoginController@verify');
    });

    Route::middleware('auth:admin')->group(function () {
        Route::get('dashboard', 'DashboardController@index')->name('dashboard');

        Route::name('users.')->prefix('users')->group(function () {
            Route::resource('admins', 'AdminsController');
            Route::resource('authors', 'AuthorsController');
            Route::resource('students', 'StudentsController');
            Route::resource('teachers', 'TeachersController');
        });

        Route::name('media.')->prefix('media')->group(function () {
            Route::resource('photos', 'PhotosController');
            Route::resource('documents', 'DocumentsController');
        });

        Route::name('about-user.')->prefix('about-user')->group(function () {
            Route::name('verifications.cancelled')->get('verifications/cancelled', 'VerifyController@cancelled');
            Route::name('verifications.approved')->get('verifications/approved', 'VerifyController@approved');
            Route::name('verifications.get')->get('verifications/pending', 'VerifyController@get');
            Route::name('verifications.show')->get('verifications/{verification}', 'VerifyController@show');
            Route::name('verifications.post')->post('verifications/{verification}', 'VerifyController@post');

            Route::name('commissions')->get('commissions', 'CommissionsController@get');
        });

        Route::resource('channels', 'ChannelsController');
        Route::resource('comments/replies', 'CommentRepliesController');
        Route::resource('comments', 'CommentsController');
        Route::resource('courses', 'CoursesController');
        Route::resource('deposits', 'DepositsController');
        Route::resource('expenses', 'ExpensesController');
        Route::resource('messages', 'MessagesController');
        Route::resource('posts', 'PostsController');
        Route::resource('roles', 'RolesController');
        Route::resource('sessions', 'SessionsController');
        Route::resource('views', 'ViewsController');

        Route::name('cms.')->prefix('cms')->namespace('CMS')->group(function () {
            Route::name('global')->get('global', 'GlobalController@index');
            Route::name('global.post')->post('global', 'GlobalController@post');

            Route::name('components')->get('components', 'ComponentsController@index');
            Route::name('components.post')->post('components', 'ComponentsController@post');

            Route::name('front-end')->get('front-end', 'FrontEndController@index');
            Route::name('front-end.post')->post('front-end', 'FrontEndController@post');

            Route::name('back-end.index')->get('back-end', 'BackEndController@index');
        });
    });
});

Route::get('email/verify/{id}/{code}', function ($id, $code) {
    $user = User::findOrFail($id);
    if ($user->email_verified_at) {
        Request::session()->flash('already_verified', 'Account already activated. Please login.');
    } else {
        $string = $user->toJson();
        if ($string === Crypt::decryptString($code)) {
            $time = json_decode($string)->created_at;
            $now = time();
            if ($now - strtotime($time) < 24 * 60 * 60) {
                $user->email_verified_at = $now;
                Request::session()->flash('activated', 'Account activation successful.');
                $user->save();
            } else Request::session()->flash('not_verified', 'Your activation link has expired. Please, contact the administrator.');
        } else Request::session()->flash('not_verified', 'Your activation link is incorrect. Please, contact the administrator.');
    }

    return redirect()
        ->route('login');
});

Route::middleware('logout_on_verification')->get('/', 'FrontEndController@welcome');

Route::redirect('home', url('/'));

Route::name('blog')->get('blog', 'FrontEndController@blog');
Route::name('about-us')->get('about-us', 'FrontEndController@about_us');
Route::name('contact')->get('contact', 'FrontEndController@contact');
Route::name('faq')->get('faq', 'FrontEndController@faq');
Route::name('courses.show')->get('courses/{course}', 'FrontEndController@course');
Route::name('courses.view')->post('courses/{course}', 'FrontEndController@view');
Route::name('posts.show')->get('blog/{post}', 'FrontEndController@post');
Route::name('posts.store')->post('blog/{post}', 'FrontEndController@store');

Route::namespace('Method')->group(function () {
    Route::post('cryptobox/callback', 'CryptoboxController@callback');
    Route::get('cryptobox/callback', 'CryptoboxController@callback');
});

Route::name('export.')->prefix('export')->group(function () {
    Route::name('xlsx')->post('xlsx', 'ExportController@xlsx');
    Route::name('csv')->post('csv', 'ExportController@csv');
    Route::name('pdf')->post('pdf', 'ExportController@pdf');
});

Route::middleware(['auth', 'verification', 'status'])->group(function () {
    Route::get('dashboard', function () {
        return redirect()
            ->route(strtolower(Auth::user()->role->name) . '.dashboard')
            ->with('new', true);
    });

    Route::namespace('Method')->group(function () {
        Route::name('user.finance.deposits.cryptobox.post')->post('user/finance/deposits/cryptobox', 'CryptoboxController@index');
        Route::name('user.finance.deposits.cryptobox.get')->get('user/finance/deposits/cryptobox', 'CryptoboxController@index');

        Route::name('monetbil.notify.')->prefix('monetbil')->group(function () {
            Route::name('post')->post('notify', 'MonetbilController@notify');
            Route::name('get')->get('notify', 'MonetbilController@notify');
        });
    });

    Route::name('user.')->prefix('user')->group(function () {
        Route::name('team')->get('team', 'TeamController@index');
        Route::name('commissions')->get('commissions', 'CommissionsController@index');
        Route::name('messages')->get('messages', 'MessagesController@index');
        Route::name('notifications.show')->get('notifications/details/{id}', 'NotificationsController@show');
        Route::name('notifications')->get('notifications', 'NotificationsController@index');
        Route::name('finance.')->namespace('Finance')->prefix('finance')->group(function () {
            Route::post('transfers/confirm', 'TransfersController@confirm')->name('transfers.confirm');
            Route::resource('transfers', 'TransfersController');

            Route::resource('deposits', 'DepositsController');

            Route::resource('withdraws', 'WithdrawsController');
        });
        Route::name('settings.')->prefix('settings')->namespace('Settings')->group(function () {
            Route::name('profile.')->group(function () {
                Route::get('change-password', 'ProfileController@change_password')->name('change-password');
                Route::get('edit-language', 'ProfileController@edit_language')->name('edit-language');

                Route::post('profile', 'ProfileController@post')->name('post');
            });

            Route::post('verification', 'VerificationController@post')->name('verification.post');
            Route::get('verification', 'VerificationController@get')->name('verification.get');
        });
    });

    Route::namespace('Author')->name('author.')->middleware('author')->prefix('author')->group(function () {
        Route::name('dashboard')->get('dashboard', 'DashboardController@index');
        Route::resource('posts', 'PostsController');
    });

    Route::middleware('participant')->group(function () {
        Route::namespace('Student')->name('student.')->middleware('student')->prefix('student')->group(function () {
            Route::name('dashboard')->get('dashboard', 'DashboardController@index');
            Route::name('courses.')->prefix('courses')->group(function () {
                Route::name('index')->get('', 'CoursesController@index');
                Route::name('mine')->get('mine', 'CoursesController@mine');
                Route::name('show')->get('mine/{course}', 'CoursesController@show');
                Route::name('enroll')->get('{course}/enroll', 'CoursesController@enroll');
                Route::name('confirm')->get('{course}/enroll/{session}/confirm', 'CoursesController@confirm');
                Route::name('confirmed')->post('confirmed', 'CoursesController@confirmed');
            });
        });

        Route::namespace('Teacher')->name('teacher.')->middleware('teacher')->prefix('teacher')->group(function () {
            Route::name('dashboard')->get('dashboard', 'DashboardController@index');
            Route::resource('courses', 'CoursesController');
            Route::resource('messages', 'MessagesController');
            Route::resource('sessions', 'SessionsController');
            Route::resource('documents', 'DocumentsController');
        });
    });
});
