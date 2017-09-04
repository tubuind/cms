<?php

namespace App\Http\Middleware;

use App\Common\Helper\Youtube;
use Closure;

class YoutubeAuth
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
        $client = Youtube::getClient();

        // Check if an auth token exists for the required scopes
        $tokenSessionKey = 'token-' . $client->prepareScopes();
        $stateSession = $request->session()->get('state');
        $stateRequset = $request->input('state');

        if ($stateRequset != null) {
            if (strval($stateSession) !== strval($stateRequset)) {
                return redirect()->route('common.error')->with('message','The session state did not match');
            }

            $client->authenticate($request->input('code'));
            $request->session()->put($tokenSessionKey, $client->getAccessToken());
            return $next($request);
        }

        if ($request->session()->get($tokenSessionKey) != null) {
            $client->setAccessToken($request->session()->get($tokenSessionKey));
        }
        if ($client->getAccessToken()) {
            $request->session()->put('$tokenSessionKey', $client->getAccessToken());
            return $next($request);
        }
        else {
            $state = mt_rand();
            $client->setState($state);
            $request->session()->put('state', $state);

            $authUrl = $client->createAuthUrl();
            return redirect()->route('common.login_youtube')->with('link', $authUrl);
        }
    }
}
