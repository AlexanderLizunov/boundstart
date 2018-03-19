<?php
/**
 * Created by PhpStorm.
 * User: bogdankuts
 * Date: 08.09.17
 * Time: 12:07
 */

namespace App\Http\ViewComposers;


use App\User;
use Illuminate\View\View;

class WikiComposer {
	/**
	 * Bind data to a view
	 *
	 * @param View $view
	 * @return void
	 */
	public function compose(View $view) {
		
		$view->with('user',  User::getFullUser(\Auth::user()->id));
	}
}