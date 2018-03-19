<?php

namespace App\Http\Middleware;

use App\Exceptions\LanguageException;
use Closure;

class LocalizationMiddleware {
	/**
	 * Array of all available languages for the site
	 *
	 * @var array
	 */
	protected $availableLanguages = [];
	
	/**
	 * Default language for site
	 * will be returned if unknown language is found
	 * or no language parameter passed to route
	 *
	 * @var string
	 */
	protected $defaultLanguage;
	
	/**
	 * Language used for site
	 * will be returned after the language is resolved
	 *
	 * @var string
	 */
	protected $language;
	
	/**
	 * Default parameter name to be accepted from route
	 *
	 * @var string
	 */
	protected $parameterName;
	
	/**
	 * Indicates which fallback to use
	 * if set to false -> use default language
	 * if set to true -> throw an exception
	 *
	 * @var bool
	 */
	protected $useErrorFallback;
	
	
	/**
	 * LocalizationMiddleware constructor.
	 * Set up default language and available languages.
	 */
	public function __construct() {
		$this->getDefaultLanguage();
		$this->getAvailableLanguages();
	}
	
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
		//		dd($request);
		$this->defineLanguage($request, $parameterName, $fallback);
		
		\App::setLocale($this->language);
		
		return $next($request);
	}
	
	
	/**
	 * Get the default language from localization.config file
	 * or from app.config file if the first one not exist.
	 */
	private function getDefaultLanguage() {
		if (config('localization.defaultLanguage') === '') {
			$this->defaultLanguage = config('app.locale');
		} else {
			$this->defaultLanguage = config('localization.defaultLanguage');
		}
	}
	
	/**
	 * Set the array of available languages based on
	 * provided array/path/default path
	 */
	private function getAvailableLanguages() {
		if (!empty(config('localization.languages'))) {
			$this->availableLanguages = config('localization.languages');
		} else {
			$directories = $this->getLocalesList();
			$languages = [];
			foreach ($directories as $directory) {
				$languages[] = substr(strrchr($directory, '/lang'), 1);
			}
			
			$this->availableLanguages = $languages;
		}
	}
	
	/**
	 * Check if path-to-languages exist and
	 * return the list of languages directories
	 *
	 * @return array
	 */
	private function getLocalesList() {
		if (config('localization.pathToLanguages') !== '') {
			
			return \File::directories(config('localization.pathToLanguages'));
		}
		
		return \File::directories(resource_path() . '/lang');
	}
	
	/**
	 * Resolve which language to use depending on parameter
	 *
	 * @param \Illuminate\Http\Request $request
	 * @param string                   $parameterName
	 * @param string                   $fallback
	 *
	 * @return string
	 * @throws LanguageException
	 */
	private function defineLanguage($request, $parameterName, $fallback) {
		$language = \Route::input('lang');
		$this->resolveFallback($fallback);
		
		if ($language && in_array($language, $this->availableLanguages)) {
			$this->language = $language;
		} elseif ($this->useErrorFallback) {
			throw new LanguageException;
		} else {
			$this->language = $this->defaultLanguage;
			if (config('localization.flashing') === true) {
				$this->flashMessageToUser();
			}
		}
	
	
	
//		OLD
//		$this->resolveParameterName($parameterName);

//		$language = $request->route()->parameter($this->parameterName);
//
//		if ($language && in_array($language, $this->availableLanguages)) {
//			$this->language = $language;
//		} elseif ($this->useErrorFallback) {
//			throw new LanguageException;
//		} else {
//			$this->language = $this->defaultLanguage;
//			if (config('localization.flashing') === true) {
//				$this->flashMessageToUser();
//			}
//		}
	}
	
	/**
	 * Resolve the name of the parameter used in routes
	 *
	 * @param string $parameterName
	 */
	private function resolveParameterName($parameterName) {
		if (!is_null($parameterName)) {
			$this->parameterName = $parameterName;
		} else {
			$this->parameterName = config('localization.parameterName');
		}
	}
	
	/**
	 * Set the fallback property
	 *
	 * @param string|null $fallback
	 */
	private function resolveFallback($fallback) {
		if ($fallback === 'error') {
			$this->useErrorFallback = true;
		} else {
			$this->useErrorFallback = config('localization.errorFallback');
		}
	}
	
	/**
	 * Flashing the message to user
	 *
	 * @param string $message
	 */
	private function flashMessageToUser($message = NULL) {
		if (!is_null($message)) {
			$messageToUser = $message;
		} else {
			$messageToUser = config('localization.flashMessage');
		}
		\Session::flash(config('localization.flashKey'), $messageToUser);
	}
	
}
