<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class ArticleCreateRequest extends Request
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
    	if (user()->permission == 'all' || user()->permission == 'site') {
		    
    		return true;
	    }
	    
	    return false;
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
            'image'               => 'required',
//	        'meta_title[ua]'      => 'required|max:80',
//	        'meta_description'    => 'required|max:200',
//	        'meta_keywords'       => 'required|max:250',
//	        'title'               => 'required|max:255',
//	        'description'         => 'required|max:128',
//	        'file'                => 'required|max:255'
        ];
    }
}
