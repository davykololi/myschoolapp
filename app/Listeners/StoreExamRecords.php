<?php

namespace App\Listeners;

use App\Events\ExamRecords;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class StoreExamRecords
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ExamRecords $event): void
    {
        //
    }
}
