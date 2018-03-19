<?php
/**
 * Created by PhpStorm.
 * User: BogdanKootz
 * Date: 15.07.16
 * Time: 12:35
 */

return [
	/*
    |--------------------------------------------------------------------------
    | Localization default language
    |--------------------------------------------------------------------------
    |
    |If you want your default language differ from the app default
	|language for all the routes without specifying it every time
	|you can set it here.
    |
    */

    'defaultLanguage' => 'en',


	/*
	|--------------------------------------------------------------------------
	| Localization available languages
	|--------------------------------------------------------------------------
	|
	|We resolve languages for you form the standard Laravel lang folder
	|if you want your available languages to differ from that values
	|please fill free to set them right here as an array of strings.
	|You can also specify another folder for language files, if
	|you want to do so, please leave the Languages array empty.
	|
	*/

	'languages'         => ['en', 'ru'],
    'pathToLanguages'   => '',

	/*
	|--------------------------------------------------------------------------
	| Localization parameter name
	|--------------------------------------------------------------------------
	|
	|We resolve parameter name from middleware parameters for you, but
	|if you want your parameter name to differ from that value, you
	|can specify it here and we will use it for all routes.
	|
	*/

	'parameterName' => 'lang',

	/*
	|--------------------------------------------------------------------------
	| Localization fallback case
	|--------------------------------------------------------------------------
	|
	|We provide two standard fallbacks. First - set the language to default
	|and the second one - is to throw an error, in case the language is
	|not available. You can edit error view in views/errors/language.
	|
	*/

	'errorFallback' => false,

	/*
	|--------------------------------------------------------------------------
	| Localization flashing
	|--------------------------------------------------------------------------
	|
	|We provide you with an ability to flash a message to user in case
	|you do not want to use a fallback error. In this case fill up
	|the next two parameters with a boolean and a message too.
	|
	*/

	'flashing'      => false,
	'flashKey'      => 'unavailable_language',
    'flashMessage'  => 'Sorry the language is unavailable'











];