<?php

namespace App\Http\Middleware;

use App\Support\SpamFilter;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Symfony\Component\HttpFoundation\Response;

/**
 * Spam guard for public forms.
 *
 * Every public form includes <x-honeypot />: a hidden "website" field bots fill
 * in, and an encrypted timestamp that shows how fast the form was sent.
 * SpamFilter also checks the content for sales pitches. When a submission
 * looks like spam we pretend it worked, so the sender learns nothing, but we
 * never save it or send any email.
 */
class BlockSpamBots
{
    public function handle(Request $request, Closure $next): Response
    {
        if ($reason = SpamFilter::check($request)) {
            Log::info('Blocked spam form submission', [
                'path' => $request->path(),
                'ip' => $request->ip(),
                'reason' => $reason,
            ]);

            return back()->with('success', 'Thank you! We will contact you soon, In sha Allah.');
        }

        return $next($request);
    }
}
