<?php

namespace App\Http\Controllers;

use App\Integrations\CRM\Pipedrive;
use App\Integrations\TelegramIntegration;


class IntegrationsController extends Controller {

	
	private $_email;
	private $_phone;
	private $_name;
	private $_company = 'Undefined';
	private $_web = 'Undefined';

	/**
	 * IntegrationsController constructor.
	 */
	public function __construct() {
		$this->_phone = $_POST['phone'];
		$this->_email = $_POST['email'];
		$this->_name = $_POST['name'];
		if (array_key_exists('company', $_POST)) {
			$this->_company = $_POST['company'];
		}
		if (array_key_exists('web', $_POST)) {
			$this->_web = $_POST['web'];
		}
	}

	/**
	 *
	 * Send all integration requests
	 *
	 */
	public function sendRequests() {
		$locale = $this->_getLocale();
		
		if ($locale == null) {
			$pipeDrive = new Pipedrive();
		} else {
			$pipeDrive = new Pipedrive($locale);
			
		}
		$pipeDrive->addPerson(
			['name'     => $this->_name,
			 'email'    => $this->_email,
			 'phone'    => $this->_phone,
			 'company'  => $this->_company,
			 'web'      => $this->_web
			]
		);
		
		
		$telegram = new TelegramIntegration($this->_email, $this->_phone, ['company' => $this->_company, 'site' => $this->_web, 'name' => $this->_name]);
		$telegram->sendMessage();
		
	}
	
	private function _getLocale() {
		$host = explode('.', \Request::header('host'));
		$subdomains = array_slice($host, 0, count($host) - 2 );
		if (!empty($subdomains)) {
			
			return $subdomains[0];
		}
		
		return 'en';
	}
}
