<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    
    public function reservation()
    {
        return view('reservation');
    }

    public function postReservation(Request $request)
    {
        //dd($request->all()); -> Fill in data to test if form works
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'phone' => 'required|digits:10',
            'date' => 'required|date_format:Y/m/d|after:today',
            'seats' => 'required|integer',
            'message' => 'min:10'
        ]);

        $data = array (
            'name' => $request->name,
            'email' => $request->email,
            'phone' => $request->phone,
            'date' => $request->date,
            'time' => $request->time,
            'seats' => $request->seats,
            'reservationMessage' => $request->message,
        );

        Mail::send('emails.reservation', $data, function ($message) use ($data) {
            $message->from('contact@venueat50.co.za');
            $message->to('info@webdevpro.co.za');
            $message->subject($data['name']);
        });

        return redirect('reservation')->with('success', 'Thank you. We will contact you to confirm the booking');
    }

    public function contact()
    {
        return view ('contact');
    }

    public function postContact(Request $request)
    {
        //dd($request->all()); -> Fill in data to test if form works
        $request->validate([
            'name' => 'required|string|min:2',
            'email' => 'required|email',
            'number' => 'required|digits:10',
            'subject' => 'required|min:3',
            'message' => 'required|min:10'
        ]);

        $data = array(
            'name' => $request->name,
            'email' => $request->email,
            'number' => $request->number,
            'subject' => $request->subject,
            'bodyMessage' => $request->message
        );

        Mail::send('emails.contact', $data, function($message) use ($data) {
            $message->from('contact@venueat50.co.za');
            $message->to('info@webdevpro.co.za');
            $message->subject($data['subject']);
        });

        return redirect('contact')->with('success', 'Your message has been sent. We will reply promptly');
    }
}
