<?php

namespace App\Console\Commands;

use App\Models\Enrolment;
use App\Models\Completion;
use Illuminate\Console\Command;

class CreateCompletions extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:name';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {
        $enrolments = Enrolment::all();
        foreach ($enrolments as $enrolment) {
            if ($enrolment->course_completed) {
                Completion::create(
                    [
                        'user_id' => $enrolment->user_id,
                        'enrolment_id' => $enrolment->id,
                        'certification' => "Congratulations! You completed the course" . $enrolment->course->title . "!",
                    ]
                );
            }
        }
    }
}
