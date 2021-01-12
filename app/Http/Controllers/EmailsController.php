<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Jobs\sendMail;
use Auth;

class EmailsController extends Controller
{
    public function sendMail(Request $request)
    {
        $data = [
            'sender' => Auth::user(),
            'data' => $request->all()
        ];

        sendMail::dispatch($data);
        return back()->with('status', 'Success send mail to '.$request->input('email'));
    }
}
