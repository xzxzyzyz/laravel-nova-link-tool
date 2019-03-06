<?php

namespace Xzxzyzyz\LaravelNovaLinkTool\Http\Middleware;

use Xzxzyzyz\LaravelNovaLinkTool\LinkTool;

class Authorize
{
    /**
     * Handle the incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return \Illuminate\Http\Response
     */
    public function handle($request, $next)
    {
        return resolve(LinkTool::class)->authorize($request) ? $next($request) : abort(403);
    }
}
