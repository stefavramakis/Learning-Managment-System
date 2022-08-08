<?php

namespace App\Http\Controllers;

use App\Models\Enrolment;
use Illuminate\Http\Request;

class EnrollCourseController extends Controller
{
    public function enrollCourse(Request $request)
    {
        $counter = 0;
        $enrolled = 0;
        foreach ($request->all() as $req) {
            $enroll = Enrolment::where('user_id', $req['user_id'])->where('course_id', $req['course_id'])->get();
            if (!$enroll->count()) {
                $enrolment = new Enrolment();
                $enrolment->user_id = $req['user_id'];
                $enrolment->course_id = $req['course_id'];
                $enrolment->course_enrolled = 1;
                $enrolment->course_completed = 0;
                $enrolment->save();
            }
            $counter++;
        }

        if ($counter == count($request->all())) {
            return ["Enrolment" => "Requests are valid", "Enrolled" => $enrolled];
        }
        else {
            return ["Enrolment" => "Enrolments are not valid"];
        }
    }
}
