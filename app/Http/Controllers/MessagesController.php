<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Messages;

class MessagesController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Messages Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles all the messages submitted by a guest to the admin.
    */

    public function __construct()
    {
        $this->middleware('auth', ['except' => ['create', 'store']]);
    }

    public function index()
    {
        $messages = Messages::orderBy('created_at', 'desc')->paginate(30);
        return view('messages.index')->with('messages', $messages);
    }

    public function create()
    {
        return view('messages.create');
    }

    public function show($id)
    {
        if($message = Messages::find($id)) return view('messages.show')->with('message', $message);
        else return abort(404);
    }

    public function destroy($id)
    {
        $message = Messages::find($id);
        $message->delete();

        return redirect(route('messages.index'))->with('success', 'Pesan berhasil dihapus.');
    }

    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required',
            'email' => 'required',
            'content' => 'required',
        ]);

        $message = new Messages;
        $message->name = $request->input('name');
        $message->email = $request->input('email');
        $message->content = $request->input('content');
        $message->save();

        return redirect(route('messages.create'))->with('success', 'Pesan berhasil dikirim.');
    }


    // Drop all the rows from the table message (clear the inbox)
    public function dropAll() {
        Messages::truncate();
        return redirect(route('messages.index'))->with('success', 'Inbox berhasil dikosongkan.');
    }


    public function edit($id) { return abort(404); }

    public function update(Request $request, $id) { return abort(404); }

}
