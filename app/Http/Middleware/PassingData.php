<?php

namespace App\Http\Middleware;

use App\Models\Configuration;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\View;

class PassingData
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
        View::share([
            'config' => [
                'logo' => Configuration::image('logo'),
                'logo_small' => Configuration::image('logo_small'),
                'app_name' => Configuration::value('app_name'),
                'app_name_short' => Configuration::value('app_name_short'),
                'app_description' => Configuration::value('app_description'),
                'interval' => Configuration::value('interval'),
                'fee' => Configuration::value('fee'),
            ],
        ]);

        return $next($request);
    }
}
