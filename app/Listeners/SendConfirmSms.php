<?php

namespace App\Listeners;

use App\Events\UserCreated;
use Dingo\Api\Exception\StoreResourceFailedException;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class SendConfirmSms
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
     * @param  UserCreated  $event
     * @return void
     */
    public function handle(UserCreated $event)
    {
        //create a new sms 
        if ($event->user) {
            
            $new_user = $event->user;
            $user_id = $new_user->id;
            $phone_country = $new_user->phone_country;
            $phone = $new_user->phone;
            $first_name = $new_user->first_name;
            $sms_type_id = config('constants.sms_types.registration_sms');

            //start send confirm sms to user *****************//
            $phone = getDatabasePhoneNumber($phone, $phone_country);
            $code = generateCode(5);
            $message = "Dear $first_name, this is your account confirmation code: $code";

            //start attempt to send sms
            try {

                //send user sms
                createSmsOutbox($message, $phone, $sms_type_id);

            } catch(\Exception $e) {
                
                log_this($e->getMessage());
                throw new StoreResourceFailedException('Error sending sms - ' . $e);

            }
            //end attempt to send sms

            //start store confirm code
            try {

                //send user sms
                createConfirmCode($code, $phone, $phone_country, $sms_type_id, $user_id);

            } catch(\Exception $e) {
                
                log_this($e->getMessage());
                throw new StoreResourceFailedException('Error saving confirm code - ' . $e);

            }
            //end store confirm code
            
            //end send confirm sms to user *****************//

        }
    }
}
