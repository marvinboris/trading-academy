<?php

namespace App\Http\Controllers\Student;

use App\Commission;
use App\Course;
use App\Http\Controllers\Controller;
use App\Notifications\Commission as NotificationsCommission;
use App\Notifications\FirstInstallment;
use App\Notifications\Payment as NotificationsPayment;
use App\Notifications\SecondInstallment;
use App\Payment;
use App\Photo;
use App\Session;
use App\SessionStudent;
use App\Student;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;

class CoursesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $courses = Course::get();
        $coursesArray = [];

        $colors = [
            'bronze' => 'pink',
            'silver' => 'orange',
            'diamond' => 'blue',
        ];
        $iconColors = [
            'bronze' => 'scarlet',
            'silver' => 'scarlet',
            'diamond' => 'orange',
        ];
        $traderColors = [
            'bronze' => 'scarlet text-white',
            'silver' => 'orange text-white',
            'diamond' => 'blue text-white',
        ];

        foreach ($courses as $course) {
            $courseArray = $course->toArray();
            $courseArray['img'] = $course->photo->path;
            $courseArray['color'] = $colors[$course->slug];
            $courseArray['trader'] = [
                'level' => $course->title,
                'color' => $traderColors[$course->slug]
            ];
            $courseArray['reviews'] = [
                'mark' => $course->mark(),
                'voters' => count($course->views)
            ];
            $courseArray['iconColor'] = $iconColors[$course->slug];
            $courseArray['link'] = route('student.courses.enroll', $course->id);
            $coursesArray[] = $courseArray;
        }

        return view('pages.user.student.courses.index', compact('coursesArray'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function mine(Request $request)
    {
        //
        $show = $request->show ?? 10;

        $sessions = Student::where('user_id', Auth::id())->first()->sessions()->latest()->paginate($show);
        $all = Student::where('user_id', Auth::id())->first()->sessions()->latest()->get();

        $data = [
            'list' => $sessions,
            'all' => $all,
            'table' => [
                ['key' => 'Course', 'value' => function ($item) {
                    return $item->course->title;
                }],
                ['key' => 'Session', 'value' => function ($item) {
                    return "
                    <div>From : <strong>" . $item->start->format('D, d M Y') . "</strong></div>
                    <div>To : <strong>" . $item->end->format('D, d M Y') . "</strong></div>
                ";
                }],
                ['key' => 'Amount paid', 'value' => function ($item) {
                    return $item->pivot->amount;
                }],
                ['key' => 'Preregistration', 'raw' => true, 'value' => function ($item) {
                    return '<span class="badge badge-success">Paid</span>';
                }],
                ['key' => 'First installment', 'raw' => true, 'value' => function ($item) {
                    return in_array($item->pivot->status, ['first-installment', 'cash']) ? '<span class="badge badge-success">Paid</span>' : '<a href="' . route('student.courses.confirm', ['course' => $item->course->slug, 'session' => $item->id]) . '?payment=first-installment&new=0' . '" class="badge badge-danger text-decoration-none">Not paid</a>';
                }],
                ['key' => 'Second installment', 'raw' => true, 'value' => function ($item) {
                    return $item->pivot->status === 'cash' ? '<span class="badge badge-success">Paid</span>' : '<a href="' . route('student.courses.confirm', ['course' => $item->course->slug, 'session' => $item->id]) . '?payment=cash&new=0' . '" class="badge badge-danger text-decoration-none">Not paid</a>';
                }],
                ['key' => 'Limit date of next payment', 'value' => function ($item) {
                    $start = $item->start->timestamp;
                    $limitDate = $start;
                    if ($item->pivot->status === 'first-installment') $limitDate = $start + 30 * 24 * 60 * 60;
                    if ($item->pivot->status === 'cash') return '<strong class="text-700 text-green">Paid</strong>';
                    $paymentDay = Carbon::createFromTimeString($item->pivot->updated_at)->timestamp;

                    $percentage = (time() - $paymentDay) * 100 / ($start - $paymentDay);
                    $daysLeft = ceil(($limitDate - time()) / (24 * 60 * 60));

                    $limit = Carbon::createFromTimestamp($limitDate)->format('D, d M Y');
                    return '
                        <div class="text-center text-small">
                            <div class="progress">
                                <div class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" aria-valuenow="' . $percentage . '" aria-valuemin="0" aria-valuemax="100" style="width: ' . $percentage . '%"></div>
                            </div>
                            <div class="d-flex justify-content-between pt-2">
                                <div>' . $daysLeft . ' day(s) left</div>
                                <div>' . $limit . '</div>
                            </div>
                        </div>
                    ';
                }],
                ['key' => 'Action', 'raw' => true, 'value' => function ($item) {
                    return '
                        <a href="' . route('student.courses.show', $item->id) . '" class="fas fa-eye text-primary text-decoration-none"></a>
                    ';
                }],
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => 'light',
        ];

        return view('pages.user.student.courses.mine', compact('data'));
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $documents = Course::findOrFail($id)->documents;
        $data = [
            'list' => $documents,
            'table' => [
                ['key' => 'Name', 'value' => function ($item) {
                    return $item->name;
                }],
                ['key' => 'Action', 'value' => function ($item) {
                    return '<a href="' . $item->path . '" class="fas fa-download"></a>';
                }],
            ],
            'headBgColor' => 'green',
            'bodyBgColor' => 'light',
        ];

        return view('pages.user.student.courses.show', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function enroll($id)
    {
        //
        $course = Course::findOrFail($id);
        $sessions = $course->sessions;

        $colors = [
            'bronze' => 'pink',
            'silver' => 'orange',
            'diamond' => 'blue',
        ];
        $iconColors = [
            'bronze' => 'scarlet',
            'silver' => 'scarlet',
            'diamond' => 'orange',
        ];
        $traderColors = [
            'bronze' => 'scarlet text-white',
            'silver' => 'orange text-white',
            'diamond' => 'blue text-white',
        ];

        $courseArray = $course->toArray();
        $courseArray['img'] = $course->photo->path;
        $courseArray['color'] = $colors[$course->slug];
        $courseArray['trader'] = [
            'level' => $course->title,
            'color' => $traderColors[$course->slug]
        ];
        $courseArray['reviews'] = [
            'mark' => $course->mark(),
            'voters' => count($course->views)
        ];
        $courseArray['iconColor'] = $iconColors[$course->slug];
        $courseArray['popular'] = true;
        $courseArray['link'] = route('student.courses.enroll', $course->id);

        return view('pages.user.student.courses.enroll', compact('courseArray', 'sessions'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirm($course, $session, Request $request)
    {
        //
        $input = $request->all();

        $courseData = Course::whereSlug($course)->first();
        $sessionData = Session::findOrFail($session);
        $payment = $input['payment'];
        $new = $input['new'];

        $prices = [];

        if ($new == 1) {
            $prices = [
                'preregistration' => 40,
                'first-installment' => 40 + ($courseData->price - 40) / 2,
                'cash' => $courseData->price
            ];
        } else {
            $prices = [
                'first-installment' => ($courseData->price - 40) / 2,
                'cash' => ($courseData->price - 40) / 2
            ];
        }

        $price = $prices[$payment];
        $hash = Crypt::encryptString(json_encode([
            'course' => $courseData->id,
            'session' => $sessionData->id,
            'payment' => $payment,
            'price' => $price,
            'new' => $new
        ]));

        return view('pages.user.student.courses.confirm', compact('courseData', 'sessionData', 'payment', 'price', 'hash', 'new'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function confirmed(Request $request)
    {
        //
        $hash = $request->hash;
        $data = json_decode(Crypt::decryptString($hash));

        $new = $data->new;
        $courseId = $data->course;
        $sessionId = $data->session;
        $price = $data->price;
        $payment = $data->payment;

        $user = Auth::user();
        $student = Student::where('user_id', Auth::id())->first();

        if ($user->balance < $price) return redirect()
            ->back()
            ->with('balance', 'Insufficient balance');

        $user->update(['balance' => $user->balance - $price]);

        $sponsor = $user->sponsor();
        $sponsor->update(['balance' => $sponsor->balance + ($price * .1)]);

        $session = Course::findOrFail($courseId)->sessions()->findOrFail($sessionId);

        $commission = Commission::create([
            'user_id' => $sponsor->id,
            'session_id' => $sessionId,
            'amount' => $price * .1,
            'referral' => $user->ref
        ]);

        if ($new == 1) {
            $session->update(['places' => $session->places - 1]);
            $session_student = SessionStudent::create([
                'student_id' => $student->id,
                'session_id' => $session->id,
                'amount' => $price,
                'status' => $payment
            ]);
            $user->notify(new FirstInstallment($session_student))
                ->delay($session->start->subDays(3));
            $user->notify(new SecondInstallment($session_student))
                ->delay($session->start->addDays(27));
        } else {
            $pivot = SessionStudent::where('student_id', $student->id)->where('session_id', $session->id)->first();
            $pivot->update([
                'amount' => $pivot->amount + $price,
                'status' => $payment
            ]);
        }

        $payment = Payment::create([
            'student_id' => $student->id,
            'session_id' => $session->id,
            'amount' => $price
        ]);

        $user->notify(new NotificationsPayment($payment));
        $sponsor->notify(new NotificationsCommission($commission));

        return redirect(route('student.courses.mine'));
    }
}
