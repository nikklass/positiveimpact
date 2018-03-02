<?php

namespace App\Services\User;

use App\Entities\Account;
use App\Entities\DepositAccount;
use App\User;
use Carbon\Carbon;
use Dingo\Api\Exception\StoreResourceFailedException;
use Dingo\Api\Routing\Helpers;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class UserStore 
{
    
    use Helpers;

    public function createItem($data) {

            
        //current date and time
        $date = Carbon::now();
        $date = getLocalDate($date);
        $date = $date->toDateTimeString();

        //global variables
        $loan_repayment_product_id = config('constants.account_settings.loan_repayment_account_product_id');
        $savings_product_id = config('constants.account_settings.savings_account_product_id');


        DB::beginTransaction();

            //start create user
            try {
                
                $new_user = new User();
                $new_user = $new_user::create($data);

            } catch(\Exception $e) {
                
                DB::rollback();
                throw new StoreResourceFailedException($e);

            }
            //end create user


            //start create new user savings account
            /*try {
                
                $user_savings_account = new Account();

                //get next account number
                $company_id = $new_user->company_id;
                $user_cd = $new_user->user_cd;
                $account_number = generate_account_number($company_id, $user_cd, '', $savings_product_id);

                $acct_attributes['account_no'] = $account_number;
                $acct_attributes['account_name'] = $new_user->first_name . ' ' . $new_user->last_name;
                $acct_attributes['product_id'] = $savings_product_id;
                $acct_attributes['company_id'] = $new_user->company_id;
                $acct_attributes['user_id'] = $new_user->id;

                $user_savings_account = $user_savings_account::create($acct_attributes);

            } catch(Exception $e) {
                
                DB::rollback();
                throw new StoreResourceFailedException($e);

            }*/
            //end create new user savings account


            //start create new user loan repayment account
            /*try {
                
                $user_loan_repayment_account = new Account();

                //get next account number
                $company_id = $new_user->company_id;
                $user_cd = $new_user->user_cd;
                $account_number = generate_account_number($company_id, $user_cd, '', $loan_repayment_product_id);

                $acct_attributes['account_no'] = $account_number;
                $acct_attributes['account_name'] = $new_user->first_name . ' ' . $new_user->last_name;
                $acct_attributes['product_id'] = $loan_repayment_product_id;
                $acct_attributes['company_id'] = $new_user->company_id;
                $acct_attributes['user_id'] = $new_user->id;

                $user_loan_repayment_account = $user_loan_repayment_account::create($acct_attributes);

            } catch(Exception $e) {
                
                DB::rollback();
                throw new StoreResourceFailedException($e);

            }*/
            //end create new user loan repayment account


            //start create new savings deposit account
            /*try {
                
                $deposit_account = new DepositAccount();

                //get account details
                $user_id = $new_user->id;
                $company_id = $new_user->company_id;
                $account_no = $user_savings_account->account_no;
                $account_id = $user_savings_account->id;
                $account_name = $user_savings_account->account_name;

                $dep_acct_attributes['account_id'] = $account_id;
                $dep_acct_attributes['account_no'] = $account_no;
                $dep_acct_attributes['account_name'] = $account_name;
                $dep_acct_attributes['product_id'] = $savings_product_id;
                $dep_acct_attributes['opened_at'] = $date;
                $dep_acct_attributes['available_at'] = $date;
                $dep_acct_attributes['company_id'] = $company_id;
                $dep_acct_attributes['primary_user_id'] = $user_id;

                $deposit_account = $deposit_account::create($dep_acct_attributes);

            } catch(Exception $e) {
                
                DB::rollback();
                throw new StoreResourceFailedException($e);

            }*/
            //end create new savings deposit account


            //start create new loan repayment deposit account
            /*try {
                
                $deposit_account = new DepositAccount();

                //get account details
                $user_id = $new_user->id;
                $company_id = $new_user->company_id;
                $account_no = $user_loan_repayment_account->account_no;
                $account_id = $user_loan_repayment_account->id;
                $account_name = $user_loan_repayment_account->account_name;

                $dep_loan_repayment_acct_attributes['account_id'] = $account_id;
                $dep_loan_repayment_acct_attributes['account_no'] = $account_no;
                $dep_loan_repayment_acct_attributes['account_name'] = $account_name;
                $dep_loan_repayment_acct_attributes['product_id'] = $loan_repayment_product_id;
                $dep_loan_repayment_acct_attributes['opened_at'] = $date;
                $dep_loan_repayment_acct_attributes['available_at'] = $date;
                $dep_loan_repayment_acct_attributes['company_id'] = $company_id;
                $dep_loan_repayment_acct_attributes['primary_user_id'] = $user_id;

                $deposit_account = $deposit_account::create($dep_loan_repayment_acct_attributes);

            } catch(Exception $e) {
                
                DB::rollback();
                throw new StoreResourceFailedException($e);

            }*/
            //end create new loan repayment deposit account


        DB::commit();


        //successfully inserted records, return created user
        //$new_user['savings_account_no'] = $user_savings_account->account_no;
        //$new_user['loan_repayment_account_no'] = $user_loan_repayment_account->account_no;

        //dd($new_user, $user_account, $deposit_account);

        return $new_user;

    }

}
