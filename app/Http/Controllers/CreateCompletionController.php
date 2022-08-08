<?php

namespace App\Http\Controllers;

use App\Models\Enrolment;
use App\Models\Completion;
use Illuminate\Http\Request;

class CreateCompletionController extends Controller
{
    public function create(Request $request)
    {
        $counter = 0;
        $completions = 0;

        foreach ($request->all() as $req) {
            $enrolment = Enrolment::where('user_id', $req['user_id'])->where('id', $req['enrolment_id'])->first();
            if ($enrolment && $enrolment->course_completed) {
                Completion::create(
                    [
                        'user_id' => $enrolment->user_id,
                        'enrolment_id' => $enrolment->id,
                        'certification' => "Congratulations! You completed the course" . $enrolment->course->title . "!",
                    ]
                );
                $completions++;
            }
            $counter++;
        }

        if ($counter == count($request->all())) {
            return ["Completions" => "Completions are valid", "Completions created" => $completions];
        }
        else {
            return ["Completions" => "Completions are not valid"];
        }
    }
}
