<?php
/**
 * Created by PhpStorm.
 * User: bogdankuts
 * Date: 11.08.17
 * Time: 17:30
 */

namespace App\Support;


use App\User;

class Help {
	/**
	 * @string $key
	 */
	public static function lang($key) {
		
		return \Lang::get($key);
	}
	
	/**
	 * @param array  $data
	 * @param string $key
	 *
	 * @return array
	 */
	public static function processSwitch(array $data, $key = 'checkbox') {
		if (!array_key_exists($key, $data)) {
			$data[$key] = 0;
		}
		
		return $data;
	}
	
	public static function user() {
		
		return User::getFullUser(\Auth::user()->id);
	}
	
}