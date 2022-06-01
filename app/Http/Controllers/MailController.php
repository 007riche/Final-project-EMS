<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Department;
use App\Mail\SendMail;
use Illuminate\Support\Facades\Mail;

class MailController extends Controller
{
    //
    public function create()
    {
        return view('admin.mail.create');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'file' => 'mimes:doc,docx,txt,png,jpg,jpeg,odt,ppt,pptx,mp3,mpeg3,mp4,xls',
            'body' => 'required'
        ]);
        $image = $request->file('file');
        $details = [
            'body' => $request->body,
            'file' => $image,
        ];
        // dd($request);
        if ($request->department) {
            $users = User::where('department_id', $request->department)->get();
            // dd($users);
            foreach ($users as $user) {
                Mail::to($user->email)->send(new SendMail($details));
            }
        } elseif ($request->person) {
            $users = User::where('id', $request->person)->first();
            // $userEmail = $user->email;
            // dd($users);
            Mail::to($users->email)->send(new SendMail($details));
        } else {
            $users = User::get();
            // dd($users);

            foreach ($users as $user) {
                Mail::to($user->email)->send(new SendMail($details));
            }
        }
        // dd($request);
        return redirect()->back()->with('message', "Email sent");
    }
}
