<?php

namespace App\Http\Middleware;

use App\Http\Requests\RegistrationRequest;
use App\Models\Cart;
use Closure;

class RegistrationWizard
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        return $next($request);
    }
}
