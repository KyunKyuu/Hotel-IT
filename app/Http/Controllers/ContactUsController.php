<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;

class ContactUsController extends Controller {


    // Store Contact Form data
    public function contact_send(Request $request) {

        // Form validation
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required|email',
            'message' => 'required'
         ]);
      

        //  Send mail to admin
        \Mail::send('mail', [
            'name' => $request->get('name'),
            'email' => $request->get('email'),
            'subject' => 'Pesan dari user',
            'user_query' => $request->get('message'),
        ], function($message) use ($request){
            $message->from($request->email);
            $message->to('teguh.iqbal782@gmail.com', 'pyqdhoncelrhteps')->subject('Pesan dari user');
        });

        return back()->with('success', 'We have received your message and would like to thank you for writing to us.');
    }

}