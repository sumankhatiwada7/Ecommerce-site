<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class rolemanager
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next,$role): Response
    {
        if(!auth()->check()){
            return redirect()->route('login');
        }
        $authusrole=auth()->user()->role;
        switch($role){
            case 'admin':
                if($authusrole==0){
                    return $next($request);
                }
                break;
            case 'vendor':
                if($authusrole==1){
                    return $next($request);
                }
                break;
            case 'user':
                if($authusrole==2){
                    return $next($request);
                }
                break;
            default:
                return redirect()->route('dashboard');
        }
        switch($authusrole){
            case 0:
                return redirect()->route('admin');
            case 1:
                return redirect()->route('vendor');
            case 2:
                return redirect()->route('customer.dashboard');
            default:
                return redirect()->route('dashboard');
        }
    }
}
