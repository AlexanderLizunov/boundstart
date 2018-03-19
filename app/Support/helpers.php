<?php
/**
 * Created by PhpStorm.
 * User: bogdankuts
 * Date: 11.08.17
 * Time: 17:35
 * @param null $item
 * @param $key
 * @return array|null|string
 */

function lang($key) {
    $portfolioItem = \Request::route()->parameter('portfolioItem');
	$fileName = \Request::route()->getName();

	if (!is_null($portfolioItem)) {

	    return \Lang::get("$fileName.$portfolioItem.$key");
    }

	return \Lang::get("$fileName.$key");
}

function user() {
	
	return \App\User::getFullUser(\Auth::user()->id);
}

/**
 * Create option element from collection
 *
 * @param        $collection
 * @param string $key
 * @param string $value
 *
 * @return array
 * @internal param $array
 */
function createOptions($collection, $key, $value) {
	$options = [];
	foreach ($collection as $element) {
		
		$options[$element->$key] = $element->$value;
	}
	
	return $options;
}