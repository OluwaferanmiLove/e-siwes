<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use App\Models\SiwesSettings;
use Illuminate\Support\Facades\Session;

class Siwes
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next)
    {
        $settings = SiwesSettings::find(1);
        if ($settings->siwes_start == "Yes") {
        return $next($request);
    }else{
        Session::flash('warning', 'Siwes Program has not started yet, check back later');
        return redirect()->route('log-book');
    }
}
}
