<?php

namespace App\Providers;

use App\Language;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
	
	private $views = ['pages/about',
	                  'pages/articles',
	                  'pages/article',
	                  'pages/demo',
	                  'pages/index',
	                  'pages/what-we-do',
	                  'errors/404',
	];
	
	/**
	 * Bootstrap any application services.
	 *
	 * @return void
	 */
	public function boot() {
		view()->composer($this->views, 'App\Http\ViewComposers\FrontComposer');
		view()->composer('admin/*', 'App\Http\ViewComposers\AdminComposer');
		view()->composer('wiki/*', 'App\Http\ViewComposers\WikiComposer');
		view()->composer('pages.partials/*', function($view) {
			$view->with('languages', Language::all());
		});
	}
	
	/**
	 * Register any application services.
	 *
	 * @return void
	 */
	public function register()
	{
		//
	}
}
