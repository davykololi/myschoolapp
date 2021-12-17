<?php

namespace App\Listeners;

use App\Events\MarksPublished;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NotifyStudents
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
     * @param  MarksPublished  $event
     * @return void
     */
    public function handle(MarksPublished $event)
    {
        //
    }
}
