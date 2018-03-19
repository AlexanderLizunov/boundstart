<?php
/**
 * Created by PhpStorm.
 * User: BogdanKootz
 * Date: 13.07.16
 * Time: 10:51
 */

namespace App\Http\ViewComposers;

use App\Language;
use Illuminate\View\View;


class FrontComposer {

	/**
	 * Env variable, used for navigation and other purposes
	 *
	 * @var string
	 */
	protected $env = '';


	/**
	 * Define environment parameters - $env and $pageTitle for admin pages
	 *
	 */
	private function defineEnvParameters() {
		$route = \Route::currentRouteName();

		switch($route) {
			case 'index':
				$this->env = 'index';
				break;
			case 'articles':
				$this->env = 'articles';
				break;
			case 'article':
				$this->env = 'articles';
				break;
			case 'opportunity':
				$this->env = 'opportunity';
				break;
			case 'opportunity_group':
				$this->env = 'opportunity';
				break;
			case 'field':
				$this->env = 'project';
				break;
			case 'project':
				$this->env = 'project';
				break;
			case 'project_text':
				$this->env = 'project';
				break;
			case 'about':
				$this->env = 'about';
				break;
			case 'our_story':
				$this->env = 'about';
				break;
			case 'all_reports':
				$this->env = 'about';
				break;
			case 'docs':
				$this->env = 'about';
				break;
			case 'reports':
				$this->env = 'about';
				break;
			case 'report':
				$this->env = 'about';
				break;
			case 'team':
				$this->env = 'about';
				break;
			case 'contacts':
				$this->env = 'contacts';
				break;
			case 'donate':
				$this->env = 'donate';
				break;
		}
	}

	/**
	 * Bind data to a view
	 *
	 * @param View $view
	 * @return void
	 */
	public function compose(View $view) {
		$host = explode('.', \request()->header('host'));
		$subdomains = array_slice($host, 0, count($host) - 2 );
		if (!empty($subdomains)) {
			$language = $subdomains[0];
		} else {
			$language = 'en';
		}
//		$this->defineEnvParameters();
		$view->with('lang', $language);
//		$view->with('languages', Language::all());
	}

}