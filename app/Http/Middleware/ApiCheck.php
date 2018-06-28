<?php

namespace App\Http\Middleware;

use Closure;
use Symfony\Component\HttpFoundation\Response;

class ApiCheck
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
        $response = $next($request);

        $response->setContent($this->prettify($response));

        if (strpos($request->headers->get('Accept'), 'text/html') === false) {
            return $response;
        }

        $response->setContent($this->linkify($response));
        if($request->getRequestUri() === '/'){
            $response->setContent(view('welcome', ['request' => $request, 'response' => $response]));
            $response->headers->set('Content-Type', 'text/html');
            return $response;
        }

        $response->setContent(view('api', ['request' => $request, 'response' => $response]));
        $response->headers->set('Content-Type', 'text/html');
        return $response;
    }

    protected function prettify(Response $response)
    {
        if ($response->headers->get('Content-Type') == 'application/json') {
            return trim(json_encode(json_decode($response->getContent()), JSON_PRETTY_PRINT | JSON_UNESCAPED_SLASHES), '[]');
        }
        return $response->getContent();
    }
    protected function linkify(Response $response)
    {
        return preg_replace_callback('#https?://[^"]+#', function ($matches) {
            return "<a href='{$matches[0]}'>{$matches[0]}</a>";
        }, $response->getContent());
    }
}
