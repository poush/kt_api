<?php

namespace App\Http\Controllers\Web;

use Dingo\Api\Exception\ValidationHttpException;
use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use Validator;

use Mail;

class ContactController extends Controller
{
    public function sendForm(Request $request){
        $validator = Validator::make($request->all(),[
            'email'    => 'required|email',
            'message'  => 'required'
        ]);
        
        if($validator->fails())
            throw new ValidationHttpException($validator->errors());

        Mail::send('email.contact', ['message' => $request->message], function($m) use($request){
            $m->from($request->email);
            $m->to('care@khareedto.com', 'New contact request');

        });
    }
}
