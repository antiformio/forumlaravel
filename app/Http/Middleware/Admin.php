<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */


    /**
     * Se o user está logado E se o user é admin então retorna o proximo pedido
     *  se não está logado então redirecctiona para o inicio
     */
    public function handle($request, Closure $next)
    {

        if(Auth::check()) {
            if (Auth::user()->isAdmin()) {

                return $next($request);

            }
        }
        return redirect('/');


    }
}
