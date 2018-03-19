<?php
/**
 * Created by PhpStorm.
 * User: bogdankuts
 * Date: 02.10.17
 * Time: 14:52
 */

namespace App\Integrations\CRM;


use App\Support\Curl;

class Pipedrive {
	
	private $_token = '';
	private $_companyName = '';
	private $_requestUrl = '';
	private $_remove_users_ids = [];
	private $_stage_id = null;
	private $_locale = 'en';
	
	//ANI - 3184981, Nastya - 3182227, Nick - 2811225, test - 148091, Evgen - 2971762, Oleg - 2971767,
//	const REMOVE_USERS_IDS = [2811225, 3184981, 2971767, 148091];
	const INBOUND_UKRAINE_PIPE_ID = 6;
	const INBOUND_CANADA_PIPE_ID  = 5;
	const ACTIVITY_TYPE           = 'qualification_';
	const SOURCE_KEY              = 'ae2f8ba14bbf89a3b3114c4aeb738bec1c12ecfb';
	const WEBSITE_KEY             = '46e471e8cc99da92d0c84cf9a1d30f887f3bee99';
	
	public function __construct($locale = 'en', $company = null, $token = null) {
		
		if (is_null($company)) {
			$this->_companyName = 'boundstart';
			$this->_token = 'f232297e79ad0000f8fee2072fc90f524fe74627';
		} else {
			$this->_companyName = $company;
			$this->_token = $token;
		}
		
		$this->_requestUrl = 'https://'.$this->_companyName.'.pipedrive.com/v1/';
		
		if ($locale == 'en') {
			$this->_remove_users_ids = [3182227, 148091, 2971762, 2971767];
			$this->_stage_id = $this->_getStageId(self::INBOUND_CANADA_PIPE_ID);
		} else {
			$this->_remove_users_ids = [3184981, 148091, 2811225, 2971767];
			$this->_stage_id = $this->_getStageId(self::INBOUND_UKRAINE_PIPE_ID);
		}
		
		$this->_locale = $locale;
	}
	
	public function getAllPersons() {
		$persons = $this->_request('/persons');
		$additionalInfo = $persons->additional_data->pagination;
		//TODO::add a loop here
		if ($additionalInfo->more_items_in_collection) {
			$additionalPersons = $this->_request("/persons", "start=".$additionalInfo->next_start.'&limit='.$additionalInfo->limit);
		}
		
		return array_merge($persons->data, $additionalPersons->data);
	}
	
	public function addPerson(array $personData) {
		$existingPersons = $this->_checkIfPersonExists($personData['email'], $personData['phone']);
		if(empty($existingPersons)) {
			$person = $this->_addPerson($personData);
			if (!is_null($person)) {
				$this->_addDealAndTask($person->id, $person->org_id->value, $personData['name']);
			}
		} else {
			$person = reset($existingPersons);
			if (!is_null($person)) {
				$this->_addDealAndTask($person->id, $person->org_id, $personData['name']);
			}
		}
		
	}
	
	public function addDeal($personId, $orgId, $name) {
		$userId = $this->_getUser();
		$data = [
			'title'             => 'Website Deal - '.$name,
			'user_id'           => $userId,
			'person_id'         => $personId,
			'visible_to'        => 3,
			self::SOURCE_KEY    => 'Website Lead',
			'org_id'            => $orgId,
			'stage_id'          => $this->_stage_id
		];
		$deal = $this->_request('/deals', null, $data, 'POST');
		
		if ($deal->success) {
			
			return $deal->data;
		}
		
		return null;
	}
	
	public function addTask($deal) {
		if ($this->_locale == 'ru') {
			$data = [
				'subject'   => 'Связаться в с клиентом',
				'type'      => self::ACTIVITY_TYPE,
				'due_date'  => date('Y-m-d'),
				'due_time'  => date('H:i', time() + 2*60*60),
				'user_id'   => $deal->user_id->id,
				'deal_id'   => $deal->id,
				'person_id' => $deal->person_id->value,
				'note'      => '<p>Узнать подробности о компании, уточнить время демо</p>'
			];
		} else {
			$data = [
				'subject'   => 'Call client back.',
				'type'      => self::ACTIVITY_TYPE,
				'due_date'  => date('Y-m-d'),
				'due_time'  => date('H:i', time() + 2*60*60),
				'user_id'   => $deal->user_id->id,
				'deal_id'   => $deal->id,
				'person_id' => $deal->person_id->value,
				'note'      => '<p>Set demo. Ask for details.</p>'
			];
		}
		
		
		return $this->_request('/activities', null, $data,'POST');
	}
	
	/**
	 * @param $personId
	 * @param $orgId
	 * @param $personName
	 */
	private function _addDealAndTask($personId, $orgId, $personName) {
		$deal = $this->addDeal($personId, $orgId, $personName);
		$task = $this->addTask($deal);
	}
	
	/**
	 * @param array $personData
	 *
	 * @return null|int
	 */
	private function _addPerson(array $personData) {
		$company = $this->_addCompany($personData['company'], $personData['web']);
		$data = [
			'name' => $personData['name'],
			"email" => $personData['email'],
			"phone" => $personData['phone'],
			'org_id' => $company,
		];
		$newPerson = $this->_request('/persons', null, $data, 'POST');
		
		if ($newPerson->success) {
			
			return $newPerson->data;
		}
		
		return null;
	}
	
	/**
	 * Return array of organizations from CRM
	 *
	 * @param $query
	 *
	 * @return null|array
	 */
	private function _getOrganizationsByQuery($query) {
		$organizations =  $this->_request('/organizations/find', 'term='.rawurlencode($query));
		if ($organizations->success == true) {
			
			return $organizations->data;
		}
		
		return null;
	}
	
	/**
	 * Get array of all organizations
	 *
	 * @return array
	 */
	private function _getAllOrganizations() {
		$organizations = $this->_request('/organizations');
		$additionalInfo = $organizations->additional_data->pagination;
		//TODO::add a loop here
		if ($additionalInfo->more_items_in_collection) {
			$additionalPersons = $this->_request("/organizations", "start=".$additionalInfo->next_start.'&limit='.$additionalInfo->limit);
		}
		
		return array_merge($organizations->data, $additionalPersons->data);
	}
	
	/**
	 * Add company if none exist with the same name
	 *
	 * @param $companyName
	 *
	 * @return int
	 */
	private function _addCompany($companyName, $companyWeb) {
		$existingOrganization = $this->_getOrganizationsByQuery($companyName);
		if (!is_null($existingOrganization)) {
			
			return reset($existingOrganization)->id;
		}
		$newCompany = $this->_request('/organizations', null, ['name' => $companyName, self::WEBSITE_KEY => $companyWeb], 'POST');
		
		return $newCompany->data->id;
	}
	
	/**
	 * Remove user from deals assigning
	 *
	 * @param array $users
	 *
	 * @return array
	 */
	private function _removeUsersFromUsers(array $users) {
		foreach ($users as $key => $user) {
//			if (in_array($user->id, self::REMOVE_USERS_IDS)) {
			if (in_array($user->id, $this->_remove_users_ids)) {
				unset($users[$key]);
			}
		}
		
		return $users;
	}
	
	/**
	 * Return user id to assign a deal
	 *
	 * @param null $userId
	 *
	 * @return int|null
	 */
	private function _getUser($userId = null) {
		if (is_null($userId)) {
			$activeUsers = $this->_removeUsersFromUsers($this->_getActiveUsers());
			shuffle($activeUsers);
			
			return reset($activeUsers)->id;
		}
		
		return $userId;
	}
	
	/**
	 * Get all active users from CRM
	 * @return array
	 */
	private function _getActiveUsers() {
		$users = $this->_request('/users')->data;
		
		foreach ($users as $key => $user) {
			if ($user->last_login == "0000-00-00 00:00:00") {
				unset($users[$key]);
			}
		}
		
		return $users;
	}
	
	/**
	 * Check if person already exist by email or phone
	 *
	 * @param $email
	 * @param $phone
	 *
	 * @return array
	 */
	private function _checkIfPersonExists($email, $phone) {
		$personsByEmail = $this->_request('persons/find', 'term='.rawurlencode($email));
		$personsByPhone = $this->_request('persons/find', 'term='.rawurlencode($phone));
		$results = [];
		$contacts = [];
		
		if (!is_null($personsByEmail)) {
			if (!is_null($personsByEmail->data)) {
				$contacts = array_merge($contacts, $personsByEmail->data);
			}
		}
		if (!is_null($personsByPhone)) {
			if (!is_null($personsByPhone->data)) {
				$contacts = array_merge($contacts, $personsByPhone->data);
			}
		}
		foreach ($contacts as $contact) {
			$results[$contact->id] = $contact;
		}
		
		return $results;
	}
	
	/**
	 * @param $pipeId
	 *
	 * @return mixed
	 */
	private function _getStageId($pipeId) {
		
		return $this->_request('stages', "pipeline_id=$pipeId")->data[0]->id;
	}
	
	/**
	 * @param string    $url
	 * @param null      $query
	 * @param null      $params
	 * @param string    $method
	 *
	 * @return mixed
	 */
	private function _request($url, $query = null, $params = null, $method = 'GET') {
		if (is_null($query)) {
			$requestUrl = $this->_requestUrl.$url.'?api_token='.$this->_token;
			
		} else {
			$requestUrl = $this->_requestUrl.$url.'?'.$query.'&api_token='.$this->_token;
		}
		$curl = new Curl($method, $requestUrl, $params);
		
		return json_decode($curl->exec());
	}
	
}