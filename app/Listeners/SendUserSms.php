<?php

namespace App\Listeners;

use App\Entities\SmsOutbox;
use App\Events\SmsOutboxCreated;
use App\Jobs\ProcessSmsOutboxJob;
use Carbon\Carbon;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendUserSms
{
    
    public $model;

    /**
     * Create the event listener.
     *
     * @return void
    */
    public function __construct(SmsOutbox $model)
    {
        $this->model = $model;
    }

    /**
     * Handle the event.
     *
     * @param  SmsOutboxCreated  $event
     * @return void
     */
    public function handle(SmsOutboxCreated $event)
    {
        //create a new sms job
        if ($event->sms_outbox) { 

            //start save sms to jobs queue
            //add delay if set
            $delay = 0;
            if ($event->sms_outbox->delay) {
                $delay = $event->sms_outbox->delay;
            }
            
            //create sms_outbox job entry
            $job = (new ProcessSmsOutboxJob($event->sms_outbox))
                   ->delay(Carbon::now()->addSeconds($delay));

            dispatch($job->onQueue('high'));
            //end save sms to jobs queue

        }
    }
}
