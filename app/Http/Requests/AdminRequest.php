<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;

class AdminRequest extends Request {

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize() {
	    if (\Auth::user()->master) {
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
            'name'                  => 'required',
            'email'                 => 'email|required',
            'password'              => 'required|min:6',
            'password_confirmation' => 'required|same:password'
        ];
    }
}
