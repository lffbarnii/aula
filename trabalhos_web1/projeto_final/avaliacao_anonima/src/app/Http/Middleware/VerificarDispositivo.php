<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class VerificarDispositivo
{
    public function handle(Request $request, Closure $next): Response
    {
        if (!$request->hasCookie('dispositivo_id')) {
            return redirect()->route('dispositivos.selecionar');
        }

        return $next($request);
    }
}