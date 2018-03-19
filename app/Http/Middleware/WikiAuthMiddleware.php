<?php

namespace App\Http\Middleware;

use Illuminate\Contracts\Auth\Factory as Auth;

class WikiAuthMiddleware extends \Illuminate\Auth\Middleware\Authenticate {
	public function __construct(Auth $auth) {
		parent::__construct($auth);
//		dd($auth);
	}
	
}