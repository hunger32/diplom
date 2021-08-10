<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\Auth\Authenticatable;

class ShareLoggedUser
{
    /**
     * The View Factory.
     *
     * @var \Illuminate\Contracts\View\Factory
     */
    protected Factory $factory;

    /**
     * The Authenticated user, if any.
     *
     * @var \Illuminate\Contracts\Auth\Authenticatable|null
     */
    protected Authenticatable $user, $virtual_markets;

    /**
     * Create a new Share Authenticated User instance.
     *
     * @param  \Illuminate\Contracts\View\Factory  $factory
     * @param  \Illuminate\Contracts\Auth\Authenticatable|null  $user
     */
    public function __construct(Factory $factory, Authenticatable $user = null)
    {
        $this->factory = $factory;
        $this->user = $user;
        $this->virtual_markets = $this->user->virtual_markets->get();
    }

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $this->factory->share('virtual_markets', $this->virtual_markets);

        return $next($request);
    }
}