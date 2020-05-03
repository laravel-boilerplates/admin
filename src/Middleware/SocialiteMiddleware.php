<?php

namespace LaravelPreset\Tabler\Middleware;

use Closure;
use Illuminate\Support\Facades\Redirect;
use InvalidArgumentException;
use Symfony\Component\Debug\Exception\FatalThrowableError;

class SocialiteMiddleware
{
  /**
   * Handle an incoming request.
   *
   * @param  \Illuminate\Http\Request  $request
   * @param  \Closure  $next
   * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
   */
  public function handle($request, Closure $next)
  {
    $provider = $request->route('provider');

    try {
      \Socialite::with($provider);
    } catch (InvalidArgumentException $e) {
      // Provider doesn't exist
      flash('We had a problem with this login provider. Please try again later.')->error();
      return redirect()->route('login');
    } catch (FatalThrowableError $e) {

      // Provider doesn't exist
      flash('We had a problem with this login provider. Please try again later.')->error();
      return redirect()->route('login');
    }

    return $next($request);
  }
}
