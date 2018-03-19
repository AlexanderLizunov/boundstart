<?php

namespace App\Http\Controllers;

use App\Article;
use App\Field;
use App\Language;
use App\Subscriber;
use Illuminate\Http\Request;

use App\Http\Requests;

class PagesController extends Controller {

	public function index() {
		
		return view('pages.index')->with([
		    'portfolioItems' => \Lang::get('index')['portfolio'],
            'quotesItems' => \Lang::get('index')['quotes'],
//            'packagesItems' => \Lang::get('index')['packages'],
		]);
	}
	
	public function about() {
		
		return view('pages.about');
	}
	
	public function whatWeDo() {
		
		return view('pages.what-we-do')->with([
            'step7Items2' => \Lang::get('what-we-do')['adv']
        ]) ;
	}
    public function demo() {

        return view('pages.demo');
    }
    
    public function sales() {
		
		return view('pages.sales')->with([
			'portfolioItems' => \Lang::get('sales')['portfolio']
		]);
    }
    
    public function photo() {
	   
		return view('pages.photographers')->with([
            'portfolioItems' => \Lang::get('index')['portfolio'],
	    ]);
    }
}
