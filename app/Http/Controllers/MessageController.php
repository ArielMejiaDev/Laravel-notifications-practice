<?php

namespace App\Http\Controllers;

use App\Message;
use App\Notifications\MessageNotification;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Notifications\DatabaseNotification;

class MessageController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('messages.index', [
            'messages' => Message::paginate(3)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('messages.create', [
            'users' => User::where('id', '!=', auth()->id())->get()
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'recipient_id' => 'required',
            'body' => 'required'
        ]);

        $message_data = array_merge(['sender_id' => auth()->id()], $request->toArray());

        $message = Message::create($message_data);

//        User::find($request->recipient_id)->notify(new MessageNotification($message));

        return redirect()->back()->with('status', __('Message is created!'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function show(Message $message)
    {

        if (auth()->user()->unreadNotifications->count() > 0) {

            $notification = DatabaseNotification::where('data', json_encode([
                'text' => 'mensaje de: ' . $message->sender->name,
                'link' => route('messages.show', $message)
            ]))->first();
            $notification->markAsread();
        }

        return view('messages.show', compact('message'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function edit(Message $message)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Message $message)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Message  $message
     * @return \Illuminate\Http\Response
     */
    public function destroy(Message $message)
    {
        //
    }
}
