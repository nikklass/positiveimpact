<?php

namespace App\Http\Controllers\Web;

use App\Entities\Comment;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ReCaptchataTestFormRequest;
use Session;

class CommentController extends Controller
{
    
    protected $model;

    public function __construct(Comment $model)
    {
        $this->model = $model;
    }

    public function index(Request $request)
    {   
    }

    public function create(Request $request)
    {  
        return view('site.contacts');
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(ReCaptchataTestFormRequest $request)
    { 

        //dd($request);

        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'phone' => 'required',
            'message' => 'required',
        ]);

        //create item
        $comment = $this->model->create($request->all());

        Session::flash('success', 'Thank you for your message. We reply to enquiries within 48 Hrs.');
        
        return redirect()->back();

    }


    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Comment::find($id);
        $item->delete();

        return response(['data' => ""], 200);
    }

}
