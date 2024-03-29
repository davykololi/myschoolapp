<?php

namespace App\Providers;

use Illuminate\Auth\Events\Registered;
use Illuminate\Auth\Listeners\SendEmailVerificationNotification;
use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\MarksPublished;
use App\Events\ExamRecords;
use App\Listeners\NotifyStudents;
use App\Events\StudentRegistered;
use App\Listeners\NotifyStudent;
use App\Listeners\StoreExamRecords;

class EventServiceProvider extends ServiceProvider
{
    /**
     * The event listener mappings for the application.
     *
     * @var array
     */
    protected $listen = [
        Registered::class => [
            SendEmailVerificationNotification::class,
        ],

        MarksPublished::class => [
            NotifyStudents::class,
        ],

        StudentRegistered::class => [
            NotifyStudent::class,
        ],

        ExamRecords::class => [
            StoreExamRecords::class,
        ],
    ];

    /**
     * Register any events for your application.
     *
     * @return void
     */
    public function boot()
    {
        parent::boot();

        //
    }
}
