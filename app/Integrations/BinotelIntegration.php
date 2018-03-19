<?php
/**
 * Created by PhpStorm.
 * User: bogdankuts
 * Date: 18.01.2018
 * Time: 15:24
 */

namespace App\Integrations;

use App\Support\BinotelApi;

class BinotelIntegration {
	/**
	 * API key, you can get one form support@binotel.ua
	 *
	 * @var string
	 */
	private $_key    = '7ebf46-5e73f09';
	
	/**
	 * API secret, you can get one form support@binotel.ua
	 *
	 * @var string
	 */
	private $_secret = '2dbb45-e42d40-5d4a3e-944486-0f295d1f';
	
	/**
	 * Instance of authorized API
	 *
	 * @var BinotelApi
	 */
	protected $api;
	
	/**
	 * Details of ongoing call
	 * @var array
	 */
	private $_callDetails;
	
	/**
	 * Status of ongoing call
	 * @var string
	 */
	private $_callStatus;
	
	/**
	 * All details of ongoing call
	 * @var array
	 */
	private $_callDetail;
	
	/**
	 * Deposition of ongoing call
	 * @var string
	 */
	private $_callDeposition;
	
	/**
	 * Attempts for getting a status of ongoing call
	 * @var int
	 */
	private $_numberOfAttempts     = 10;
	
	/**
	 * Sleep between attempts to fit limitations
	 * @var int
	 */
	private $_delayBetweenAttempts = 10;
	
	
	/**
	 * Available lines of online managers
	 * @var array
	 */
	private $_availableLines = [];
	
	
	/**
	 * Default line to make a call
	 * @var string
	 */
	private $_defaultLine = '903';
	
	
	/**
	 * BinotelIntegration constructor.
	 */
	public function __construct() {
		$api = new BinotelApi($this->_key, $this->_secret);
		$this->api = $api;
		$this->_formAvailableLines();
		
		return $api;
	}
	
	/**
	 * Start a call with the given number
	 *
	 * @param string  $phone
	 * @param null    $line
	 */
	public function startCallOut($phone, $line = null) {
		$telegram = new TelegramIntegration('no email', $phone);
		$extLine = $this->_resolveLine($line);
		
		$result = $this->api->sendRequest('calls/ext-to-phone', array(
			'ext_number'    => $extLine,
			'phone_number'  => $phone,
			'callTimeToExt' => '60',
		));
		
		if ($result['status'] === 'success') {
			$this->_handleSuccess($telegram, $result['generalCallID']);
			
		}  else {
			$this->_handleError($telegram, $result['code']);
			
		}
		
	}
	
	/**
	 * Handle error given by API
	 *
	 * @param TelegramIntegration $telegram
	 * @param integer             $code
	 */
	private function _handleError(TelegramIntegration $telegram, $code) {
		if ($code == 150) {
			$telegram->sendFailedCallMessage('Менеджеры не на месте.');
		} elseif ($code == 200) {
			$telegram->sendFailedCallMessage('Проблема с ip запроса. ');
		} else {
			$telegram->sendFailedCallMessage('Undefined');
		}
	}
	
	/**
	 * Handle success and add a notification to telegram
	 *
	 * @param TelegramIntegration $telegram
	 * @param string              $callId
	 */
	private function _handleSuccess(TelegramIntegration $telegram, $callId) {
		
		for ($i = 0; $i < $this->_numberOfAttempts; $i++) {
			$this->_getCallDetails($callId);
			
			if ($this->_callStatus !== 'success') {
				$telegram->sendFailedCallMessage($this->_callDetails['message']);
				
				break;
			} else {
				
				$telegram->sendSuccessCallMessage();
				break;
			}
		}
	}
	
	/**
	 * Get call details from Binotel
	 *
	 * @param string $callId
	 */
	private function _getCallDetails($callId) {
		$result = $this->api->sendRequest('stats/call-details', array(
			'generalCallID' => $callId
		));
		
		$this->_callDetails = $result;
		$this->_callStatus = $this->_callDetails['status'];
		$this->_callDetail = $this->_callDetails['callDetails'][$callId];
		$this->_callDeposition = $this->_callDetail['disposition'];
	}
	
	/**
	 * Get a list of all available employees from Binotel
	 *
	 * @return array
	 */
	private function _getAllEmployees() {
		$result = $this->api->sendRequest('settings/list-of-employees', array());
		
		if ($result['status'] === 'success') {
			return $result['listOfEmployees'];
		}
		
		return [];
	}
	
	/**
	 * Recreate an array of employees
	 *
	 * @return array
	 */
	private function _formAllEmployees() {
		$employees = $this->_getAllEmployees();
		$result = [];
		if (!empty($employees)) {
			foreach ($employees as $employee) {
				$result[] = [
					'email' => $employee['email'],
					'name' => $employee['name'],
					'department' => $employee['department'],
					'extNumber' => $employee['extNumber'],
					'status' => $employee['extStatus']['status'],
				];
			}
		}
		
		return $result;
	}
	
	/**
	 * Check availability of employees
	 *
	 * @return array
	 */
	private function _availableEmployees() {
		$employees = $this->_formAllEmployees();
		$employeesOnline = [];
		
		if (!empty($employees)) {
			foreach ($employees as $employee) {
				if ($employee['status'] === 'online') {
					$employeesOnline[] = $employee;
				}
			}
		}
		
		
		return $employeesOnline;
	}
	
	/**
	 * Set up available lines for making a call.
	 */
	private function _formAvailableLines() {
		$employeesOnline = $this->_availableEmployees();
		
		if (!empty($employeesOnline)) {
			foreach ($employeesOnline as $employee) {
				$this->_availableLines[] = $employee['extNumber'];
			}
		} else {
			$this->_availableLines[] = $this->_defaultLine;
		}
		
	}
	
	/**
	 * Resolve the line to make a call.
	 *
	 * @param string $line
	 *
	 * @return string
	 */
	private function _resolveLine($line) {
		if (is_null($line)) {
			$line = array_rand($this->_availableLines);
			
			return $this->_availableLines[$line];
		} else {
			
			return $line;
		}
	}
	
}