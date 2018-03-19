<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

class BaseController extends Controller {
	//TODO:think how to use trait in controllers and LanguageMiddleware instead on duplications
	/**
	 * Array of all available languages for the site
	 *
	 * @var array
	 */
	protected $availableLanguages = ['ua', 'ru'];


	/**
	 * Default language for site
	 * will be returned if unknown language is found
	 * or no language parameter passed to route
	 *
	 * @var string
	 */
	protected $lang = 'ua';


	/**
	 * BaseController constructor.
	 *
	 * @param Request $request
	 */
	public function __construct(Request $request) {
		$lang = $request->route()->parameter('lang');

		if ($lang && in_array($lang, $this->availableLanguages)) {
			$this->lang = $lang;
		}
	}
}
