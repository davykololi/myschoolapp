<?php

namespace App\Jobs;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldBeUnique;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;
use App\Models\MyParent;
use Mail;

class ParentsSendEmailJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;
    protected $details;
    public $timeout = 7200; //2 hours

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct($details)
    {
        //
        $this->details = $details;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        //
        $data = MyParent::all();
        $input['subject'] = $this->detais['subject'];

        foreach($data as $key => $value){
            $input['email'] = $value->email;
            $input['full_name'] = $value->full_name;

            Mail::send('mail.Test_mail',[],function($message) use($input){
                $message->to($input['email'],$input['name'])->subject($input['subject']);
            });
        }
    }
}
