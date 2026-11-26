<?php

namespace App\Http\Controllers;

use App\Support\AdminPermissions;
use App\Support\VisitTracker;
use Illuminate\Http\Request;

/** POST /v: the small beacon every public page sends once it has loaded. */
class VisitController extends Controller
{
    public function store(Request $request)
    {
        // the admin's own browsing would only blur the numbers
        if (! $request->user()?->hasRole(AdminPermissions::ADMIN_ROLE)) {
            VisitTracker::record($request);
        }

        return response()->noContent();
    }
}
