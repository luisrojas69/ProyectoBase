<?php

namespace App\Http\Controllers;

use App\Notifications\SystemNotifications;
use App\User;
use Illuminate\Http\Request;

class MessagesController extends Controller
{
    

	public function index()
	{
		$messages = auth()->user()->notifications;
		return view('pages.admin.messages.inbox', compact('messages'));
	}

    public function compose()
    {
    	$users = User::where('id','!=' , auth()->id())->get();
    	return view('pages.admin.messages.compose', compact('users'));
    }

    public function store(Request $request)
    {
    	$this->validate($request, [
    		'subject' => 'required',
    		'body' => 'required',
    		'recipient_id' => 'required|exists:users,id',
    	]);

    	$message = [
    		'sender' => auth()->user()->name,
	    	'title' => $request->subject,
	    	'body' => $request->body,
    	];
    	
    	User::find($request->recipient_id)->notify(new SystemNotifications($message));

    	return redirect()->back()->with('success', 'Notification was Sended');;
    }
}
