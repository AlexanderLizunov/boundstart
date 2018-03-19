<?php
/**
 * Created by PhpStorm.
 * User: BogdanKootz
 * Date: 13.07.16
 * Time: 10:51
 */

namespace App\Http\ViewComposers;

use Illuminate\View\View;


class AdminComposer {

	/**
	 * Env variable, used for navigation and other purposes
	 *
	 * @var string
	 */
	protected $env = '';

	/**
	 * Title variable used for header in admin panel
	 *
	 * @var string
	 */
	protected $title = '';

	/**
	 * Define environment parameters - $env and $pageTitle for admin pages
	 *
	 */
	private function defineEnvParameters() {
		$route = \Route::currentRouteName();

		switch($route) {
			case 'dashboard':
				$this->title = 'Dashboard';
				$this->env = 'dashboard';
				break;
			case 'admins':
				$this->title = 'Администраторы';
				$this->env = 'admins';
				break;
			case 'admin':
				$this->title = 'Администратор';
				$this->env = 'admin';
				break;
			case 'create_admin':
				$this->title = 'Добавить администратора';
				$this->env = 'admin_create';
				break;
			case 'edit_admin':
				$this->title = 'Изменить администратора';
				$this->env = 'admin_update';
				break;
			case 'admin_articles':
				$this->title = 'Блог';
				$this->env = 'articles';
				break;
			case 'admin_article':
				$this->title = 'Статья';
				$this->env = 'article';
				break;
			case 'edit_article':
				$this->title = 'Изменить статью';
				$this->env = 'update_article';
				break;
			case 'create_article':
				$this->title = 'Добавить статью';
				$this->env = 'create_article';
				break;
			case 'admin_about':
				$this->title = 'Ver 0.5';
				$this->env = 'about';
				break;
			case 'recent_admins':
				$this->title = 'Последние админы';
				break;
			case 'recent_articles':
				$this->title = 'Последние статьи';
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
		$this->defineEnvParameters();

		$view->with('env', $this->env);
		$view->with('pageTitle', $this->title);
	}
	
}