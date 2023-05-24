<?php

namespace App\Http\Controllers;

use App\Models\InviteLink;
use App\Notifications\SendEmailNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Notification;

class InviteLinkController extends Controller
{
    public function create(Request $request)
    {
       


        $details = array();
        $text=$request->generatedStringInput;
        $details['actionurl']='http://127.0.0.1:8000/lister/register/'.$text;
        $email=$request->email;
        InviteLink::create([
           'link'=>$request->generatedStringInput
        ]);

        // Notification::send($email, new SendEmailNotification($details));
        Notification::route('mail', $email)
            ->notify(new SendEmailNotification($details));
        
        return redirect()->route('admin.index')->with('message',"Sent Suceessfully.");
    }
}
