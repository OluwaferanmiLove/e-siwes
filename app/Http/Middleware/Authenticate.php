<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Models\SiwesSettings;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        $settings = SiwesSettings::find(1);
        if($settings->siwes_end_date > Carbon::now()){
            $settings->siwes_end = "Yes";
        }
        $settings->save();
        if (! $request->expectsJson()) {
            return route('login');
        }
    }
}
