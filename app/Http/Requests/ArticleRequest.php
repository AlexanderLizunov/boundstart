<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Auth;

class ArticleRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
	    $article = $this->route('article');
	    $userId = $article->user->id;
	    if (user()->permission == 'all' || user()->permission == 'site') {
		
		    if (Auth::user()->master || Auth::user()->id === $userId) {
			
			    return true;
		    } else {
			
			    return false;
		    }
	    }
	
	    return false;
	    
//	    if (Auth::user()->master || Auth::user()->id === $userId) {
//
//		    return true;
//	    } else {
//
//		    return false;
//	    }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
	        'published_at'        => 'required',
	        'slug'                => 'required|max:255',
	        //'meta_title[ua]'    => 'required|max:80',
	        //'meta_description'  => 'required|max:200',
	        //'meta_keywords'     => 'required|max:250',
	        //'title'             => 'required|max:255',
	        //'description'       => 'required|max:128',
	        //'file'              => 'required|max:255'
        ];
    }
}
