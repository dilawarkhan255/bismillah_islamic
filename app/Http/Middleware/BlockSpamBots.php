<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * Honeypot for public forms.
 *
 * Every public form has a hidden "website" field (<x-honeypot />). Real visitors
 * never see it, so it stays empty; spam bots fill in every field. When it is
 * filled we pretend the submission worked, so the bot learns nothing, but we
 * never save it or send any email.
 */
class BlockSpamBots
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($request->filled('website')) {
            return back()->with('success', 'Thank you! We will contact you soon, In sha Allah.');
        }

        return $next($request);
    }
}
