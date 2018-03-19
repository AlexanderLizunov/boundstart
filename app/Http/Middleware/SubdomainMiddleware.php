<?php

namespace App\Http\Middleware;

use App\Exceptions\LanguageException;
use Closure;

class SubdomainMiddleware {
	
	/**
	 * Handle an incoming request.
	 *
	 * @param  \Illuminate\Http\Request $request
	 * @param  \Closure                 $next
	 * @param string                    $parameterName
	 * @param string                    $fallback
	 *
	 * @return mixed
	 * @throws LanguageException
	 * @internal param null $parameterName
	 */
	public function handle($request, Closure $next, $parameterName = NULL, $fallback = NULL) {
		$host = explode('.', $request->header('host'));
		$subdomains = array_slice($host, 0, count($host) - 2 );
		if (!empty($subdomains)) {
			
			return $next($request);
//			$language = $subdomains[0];
		}
		
		return $next($request);
	}
	
}
