<?php

namespace App\Http\Controllers\Student;

use App\Course;
use App\Http\Controllers\Controller;
use App\Photo;
use Illuminate\Http\Request;

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
            $coursesArray[] = $courseArray;
        }

        return view('user.student.courses.index', compact('coursesArray'));
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
    }
}
