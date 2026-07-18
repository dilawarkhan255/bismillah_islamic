<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Message;
use Illuminate\Http\Request;

class MessageController extends Controller
{
    public function index()
    {
        $messages = Message::latest()->get();

        return view('admin.pages.messages.index', compact('messages'));
    }

    public function show(Message $message)
    {
        if (!$message->is_read) {
            $message->update(['is_read' => true]);
        }

        return view('admin.pages.messages.show', compact('message'));
    }

    public function destroy(Message $message)
    {
        $message->delete();

        return redirect()->back()->with('success', 'Message deleted successfully.');
    }
}
