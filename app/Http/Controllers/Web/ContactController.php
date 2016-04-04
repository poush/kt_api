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

        $replyto = $request->email;

        \Mail::send('emails.contact', ['data' => $request->message ], function ($message) use($replyto) {
            $message->from('do-not-reply@KhareedTo.com','KhareedTo.com');
            $message->subject("New Contact Request");
            $message->to('care@khareedto.com');
            $message->replyTo($replyto);
        });

        return $this->response->noContent();
    }
}
