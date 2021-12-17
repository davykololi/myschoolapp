<?php

namespace App\Listeners;

use Mail;
use App\Events\StudentRegistered;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyStudent
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  StudentRegistered  $event
     * @return void
     */
    public function handle(StudentRegistered $event)
    {
        // Access the student using $event->student
        $email = $event->student->email;
        Mail::to($email)->send('emails.student.registered',$event->student);

        try{
            $basic = new \Nexmo\Client\Credentials\Basic(getenv("NEXMO_KEY"),getenv("NEXMO_SECRET"));
            $client = new \Nexmo\Client($basic);

            $student = $event->student;
            $receiverNumber = $student->parent->phone_no;
            $school = auth()->user()->school->name;
            $message = $student->full_name." ".'successfully admitted to'.$school->name;

            $message = $client->message()->send([
                        'to' => $receiverNumber,
                        'from' =>$school,
                        'text' => $message,
                    ]);
        } catch(Exception $e){
            dd("Error".$e->getMessage());
        }
    }
}
