<?php
/**
 * Created by PhpStorm.
 * User: bogdankuts
 * Date: 18.01.2018
 * Time: 15:37
 */

namespace App\Http\Controllers;


use App\Integrations\BinotelIntegration;

class CallbackController extends Controller {
	public function startCall() {
		if(array_key_exists('phone', $_POST)) {
			$phone = $_POST['phone'];
		} else {
			
			return 'Phone is missing!';
		}
		
		$binotel = new BinotelIntegration();
		$binotel->startCallOut($phone);
	}
}