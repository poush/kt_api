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

        Mail::send('emails.contact', ['data' => $request->message ], function($m) use($request){
            $m->from('do-no-reply@kharidto.com', 'KhareedTo');
            $m->replyTo($request->email);
            $m->subject('New Contact Request at KhareedTo');
            $m->to('care@khareedto.com');

        });

        return $this->response->noContent();
    }
}
