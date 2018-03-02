<?php

namespace App\Jobs;

use App\Entities\SmsOutbox;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Foundation\Bus\Dispatchable;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Queue\SerializesModels;

class ProcessSmsOutboxJob implements ShouldQueue
{
    use Dispatchable, InteractsWithQueue, Queueable, SerializesModels;

    protected $sms_outbox;

    /**
     * The number of times the job may be attempted.
     *
     * @var int
     */
    public $tries = 1; 

    /**
     * The number of seconds the job can run before timing out.
     *
     * @var int
     */
    public $timeout = 180;

    /**
     * Create a new job instance.
     *
     * @return void
     */
    public function __construct(SmsOutbox $sms_outbox)
    {
        $this->sms_outbox = $sms_outbox;
    }

    /**
     * Execute the job.
     *
     * @return void
     */
    public function handle()
    {
        
        $app_short_name = config('constants.settings.app_short_name');

        //start process sms send here
        //get message data
        $params['sms_message']     = $this->sms_outbox->message;
        $params['phone_number']    = $this->sms_outbox->phone_number;
        $params['company_id']      = $this->sms_outbox->company_id;
        $params['sms_user_name']   = $this->sms_outbox->sms_user_name;
        $params['sms_type_id']     = $this->sms_outbox->sms_type_id;
        //send sms
        $response = sendApiSms($params); 
        //end process sms send here

        //start log response
        $message_log = "\n\n************************************ SNB SMS MSG *********************************";
        $message_log .= "\n\n\n" . json_encode($this->sms_outbox) . "\n\n\n";
        $message_log .= "\n\n\n" . json_encode($response) . "\n\n\n";
        $message_log .= "************************************ SNB SMS MSG ************************************";
        $message_log .= "\n\n\n\n\n\n\n";

        //get the log file name
        log_this($message_log);
        //end log response

    }
}
