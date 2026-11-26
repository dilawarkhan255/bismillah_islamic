<?php

namespace App\Http\Controllers;

use App\Support\ChatAssistant;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use RuntimeException;

/** POST /chat: AI answer for the website chatbot. On any problem the widget falls back to the FAQs. */
class ChatController extends Controller
{
    public function reply(Request $request, ChatAssistant $assistant): JsonResponse
    {
        if (! ChatAssistant::enabled()) {
            return response()->json(['error' => 'ai_off'], 503);
        }

        $data = $request->validate([
            'messages'           => 'required|array|min:1|max:12',
            'messages.*.role'    => 'required|in:user,assistant',
            'messages.*.content' => 'required|string|max:1000',
        ]);

        $history = array_map(fn ($m) => ['role' => $m['role'], 'content' => trim($m['content'])], $data['messages']);
        if ($history[0]['role'] !== 'user' || end($history)['role'] !== 'user') {
            return response()->json(['error' => 'bad_history'], 422);
        }

        try {
            return response()->json($assistant->reply($history));
        } catch (RuntimeException) {
            return response()->json(['error' => 'unavailable'], 503);
        }
    }
}
