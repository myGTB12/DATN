<?php

namespace App\Http\Middleware;

use App\Enums\StationStatus;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CanCreateStation
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->guard('station_owner')->user();
        $stations = $user->stations;
        foreach ($stations as $station) {
            if ($station->status == StationStatus::PENDING->value) {
                return back()->with(['error' => __('messages.cant_create_station')]);
            }
        }

        return $next($request);
    }
}
