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

        return \View::make('emails.contact')->withData($request->email);

//        Mail::send('emails.contact', ['data' => $request->input('message')], function($m) use($request){
//            $m->from('do-no-reply@kharidto.com', 'KhareedTo');
////            $m->replyTo($request->input('email'));
//            $m->to('care@khareedto.com', 'New contact request');
//
//        });
    }
}
