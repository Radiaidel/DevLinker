<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;
use App\Models\Visitor;
class TrackVisitors
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */    public function handle(Request $request, Closure $next)
    {
        // Log visitor information
        $visitor = new Visitor();
        $visitor->ip_address = $request->ip(); // Get the visitor's IP address
        $visitor->user_agent = $request->header('User-Agent'); // Get the visitor's user agent
        $visitor->visited_at = now(); // Get the current timestamp
        $visitor->save();

        return $next($request);
    }
    
}
