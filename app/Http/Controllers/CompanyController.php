<?php

namespace App\Http\Controllers;

use App\Entities\Company;
use Session;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::orderBy('id', 'desc')->paginate(10);
        return view('companies.index')->withCompanies($companies);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
                
        $user_id = auth()->user()->id;

        $this->validate($request, [
            'name' => 'unique:companies|required|max:255',
            'phone_number' => 'required|max:13',
            'sms_user_name' => 'sometimes|unique:companies'
        ]);

        $phone_number = '';
        if ($request->phone_number) {
            if (!isValidPhoneNumber($request->phone_number)){
                $message = \Config::get('constants.error.invalid_phone_number');
                Session::flash('error', $message);
                return redirect()->back()->withInput();
            }
            $phone_number = formatPhoneNumber($request->phone_number);
        }

        $remove_spaces_regex = "/\s+/";
        //remove all spaces
        $sms_user_name = preg_replace($remove_spaces_regex, '', $request->sms_user_name);

        $company = new Company();
        $company->name = $request->name;
        $company->phone_number = $phone_number;
        $company->email = $request->email;
        $company->sms_user_name = $sms_user_name;
        $company->physical_address = $request->physical_address;
        $company->box = $request->box;
        $company->company_no = $request->company_no;
        $company->created_by = $user_id;
        $company->updated_by = $user_id;
        $company->save();

        Session::flash('success', 'Successfully created new company - ' . $company->name);
        return redirect()->route('companies.show', $company->id);

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
        $company = Company::where('id', $id)
                  ->first();

        return view('companies.show')->withCompany($company);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        
        $company = Company::where('id', $id)->first();

        return view('companies.edit')->withCompany($company);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        
        $user_id = auth()->user()->id;

        $company = Company::findOrFail($id);

        $this->validate($request, [
            'name' => 'required|max:255|unique:companies,name,'.$company->id,
            'phone_number' => 'required|max:13',
            'sms_user_name' => 'sometimes'
        ]);

        $phone_number = '';
        if ($request->phone_number) {
            if (!isValidPhoneNumber($request->phone_number)){
                $message = \Config::get('constants.error.invalid_phone_number');
                Session::flash('error', $message);
                return redirect()->back()->withInput();
            }
            $phone_number = formatPhoneNumber($request->phone_number);
        }

        $remove_spaces_regex = "/\s+/";
        //remove all spaces
        $sms_user_name = preg_replace($remove_spaces_regex, '', $request->sms_user_name);

        //update company record
        $company->name = $request->name;
        $company->phone_number = $phone_number;
        $company->email = $request->email;
        $company->sms_user_name = $sms_user_name;
        $company->physical_address = $request->physical_address;
        $company->box = $request->box;
        $company->company_no = $request->company_no;
        $company->updated_by = $user_id;
        $company->save();

        Session::flash('success', 'Successfully updated company - ' . $company->name);
        return redirect()->route('companies.show', $company->id);

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
