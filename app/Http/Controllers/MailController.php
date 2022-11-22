<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use Mail; // add 
use App\Mail\MyDemoMail; // add 
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
class MailController extends Controller
{
    // writing a function that will grab a user email and send email to the user.
    public function index()
    {
        $mailData = [
            'title' => 'Mail from ItSolutionStuff.com',
            'url' => 'https://www.itsolutionstuff.com'
        ];
        Mail::to('emeholisaeloka@gmail.com')->send(new MyDemoMail($mailData));
         
        dd("Email is sent successfully.");
    }
}
