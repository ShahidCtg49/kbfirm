<?php

namespace App\Http\Middleware;

use App\Models\User;
use Closure;

use App\Http\Traits\ResponseTrait; // custome
use Session; // custome
use Illuminate\Http\Request;

class isInvestor
{
    use ResponseTrait;
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        if (!Session::has('userId') || Session::has('userId') == null || !Session::has('identity')) {
            return redirect()->route('logOut');
        } else {
            $user = User::find(Session::get('userId'));
            if (!$user) {
                return redirect()->route('logOut');
            } else if (Session::get('identity') != 'investor') {
                return redirect(route(Session::get('identity') . '.dashboard'))->with($this->resMessageHtml(false, 'error', 'Access Denied'));
            } else {
                return $next($request);
            }
        }
        return redirect()->route('logOut');
    }
}
