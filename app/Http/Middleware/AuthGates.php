<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Session;
use Inertia\Inertia;

class AuthGates
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
        $user = auth()->user();
        $permissions_list = array();

        // add gates on controllers
        if (!app()->runningInConsole() && $user) {

            foreach ($user->roles as $role) {
                foreach ($role->permissions as $permission) {
                    $permissions_list[$permission->title][] = $role->id;
                }
            }
            foreach ($permissions_list as $title => $roles) {
                Gate::define($title, function ($user) use ($roles) {
                    return count(array_intersect($user->roles->pluck('id')->toArray(), $roles)) > 0;
                });
            }
        }



        //Share the gates on inertia
        Inertia::share(array_filter([
            'allowed_gates' => function () use ($user) {
                $allowed_gates =  ($user->roles && $user->roles->toArray()) ? $user->roles[0]->permissions->pluck('title') : null;
                return $allowed_gates ? $allowed_gates : null;
            },
            'toast' => function () {
                return Session::get('toast');
            },
            'popstate' => function () {
                return false;
            },
            'modal' => function () {
                return false;
            }
        ]));


        return $next($request);
    }
}
