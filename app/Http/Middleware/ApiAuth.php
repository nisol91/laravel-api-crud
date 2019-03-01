<?php

namespace App\Http\Middleware;

use Closure;

class ApiAuth
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
        // $apiKey = env('API_AUTH');
        $apiKey = 'Bearer ' . config('app.api_key');

        if (empty($request->header('Authorization'))) {
            return response()->json([
                'error'=>'Manca autorizzazione'
            ]);
        }
        if ($request->header('Authorization') != $apiKey) {
            return response()->json([
                'error'=>'Chiave sbagliata'
            ]);
        }
        return $next($request);
    }
}
