<?php

namespace App\Notifications;

use App\Models\Student;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Notifications\Messages\NexmoMessage;
use Illuminate\Notifications\Notification;

class SmsParentOnAdmissionNotification extends Notification
{
    use Queueable;
    protected $student;
    /**
     * Create a new notification instance.
     *
     * @return void
     */
    public function __construct(Student $student)
    {
        //
        $this->student = $student;
    }

    /**
     * Get the notification's delivery channels.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function via($notifiable)
    {
        return ['nexmo'];
    }

    /**
     * Get the mail representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return \Illuminate\Notifications\Messages\MailMessage
     */
    public function toNexmo($notifiable)
    {
        return (new NexmoMessage)
                    ->content($this->student->full_name." ".'has officially been admitted to'." ".$this->student->school->name." ".'Details are as follows. Dormitory:'." ".$this->student->dormitory->name." ".'Class:'." ".$this->student->standard->name." ".'Admission No:'." ".$this->student->admission_no." ".'Thank you for choosing our school and always login to your account to monitor the progress of your child/children.'
                		);
                    
    }

    /**
     * Get the array representation of the notification.
     *
     * @param  mixed  $notifiable
     * @return array
     */
    public function toArray($notifiable)
    {
        return [
            //
        ];
    }
}
