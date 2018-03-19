<?php

namespace App\Trello;

use App\User;
use Illuminate\Database\Eloquent\Model;
use App\Support\Curl;
use Carbon\Carbon;

/**
 * App\Trello\Trello
 *
 * @mixin \Eloquent
 */
class Trello extends Model {
	
	private $_key = 'a666c19ba2ceb43a4fb562df48eca996';
	private $_token = 'abd817c37abdd8d78eda21ab1105bcbd00367c3ee4232af61b20c15ea05bbfb5';
	private $_organization = 'boundstart';
	
	/**
	 * Get all users in organization
	 *
	 * @return array
	 */
	public function getAllUsers() {
		$curl = new Curl('GET', $this->_formRequest("organizations/$this->_organization/members?"));
		$curl->exec();
		$results = $curl->response();
		
		return json_decode($results);
	}
	
	/**
	 * Get all boards in organization
	 *
	 * @return array
	 */
	public function getAllBoards() {
		$curl = new Curl('GET', $this->_formRequest("organizations/$this->_organization/boards?lists=open&"));
		$curl->exec();
		$response = $curl->response();
		
		return $this->_formBoardsArray(json_decode($response));
	}
	
	/**
	 * Get all boards in organization, which are visible to the team
	 *
	 * @return array
	 */
	public function getAllBoardsVisibleToTeam() {
		$curl = new Curl('GET', $this->_formRequest("organizations/$this->_organization/boards?filter=organization&lists=open&"));
		$curl->exec();
		$response = $curl->response();
		
		return $this->_formBoardsArray(json_decode($response));
	}
	
	/**
	 * @param array $cards
	 * @param array $lists
	 *
	 * @return array
	 */
	public function getAllCardsByOrganization(array $cards, array $lists) {
		$orgCards = [];
		foreach ($cards as $card) {
			if (array_key_exists($card->idList, $lists)) {
				$orgCards[$card->id] = $card;
			}
		}
		
		return $orgCards;
	}
	
	//TODO::refactor this
	/**
	 * Get lists from boards by names
	 *
	 * @param array $boards
	 * @param array $listNames
	 *
	 * @return array
	 */
	public function getListsByNames(array $boards, array $listNames = ['To Do', 'In Process', 'On Approval', 'Pending', 'Done', 'Archive', 'Cancelled']) {
		$lists = [];
		
		foreach ($boards as $board) {
			$result = array_filter($board->lists, function($list) use($listNames) {
				
				return in_array($list->name, $listNames);
			});
			
			foreach ($result as $list) {
				$lists[$list->id] = $list;
			}
		}
		
		return $lists;
	}
	
	/**
	 * Get cards by user and type
	 *
	 * @param string $user
	 * @param string $type
	 *
	 * @return array
	 */
	public function getCardsByUser($user, $type) {
		$curl = new Curl('GET', $this->_formRequest("members/$user/cards/$type?"));
		$curl->exec();
		$results = $curl->response();
		
		return json_decode($results);
	}
	
	/**
	 * Get all cards by project and type
	 *
	 * @param string $boardId
	 * @param string $type
	 *
	 * @return array
	 */
	public function getCardsByProject($boardId, $type) {
		$curl = new Curl('GET', $this->_formRequest("boards/$boardId/cards/$type?"));
		$curl->exec();
		$results = $curl->response();
		
		return json_decode($results);
	}
	
	/**
	 * @param array $cards
	 * @param array $boards
	 *
	 * @return array
	 */
	public function formCards(array $cards, array $boards) {
		foreach ($cards as $card) {
			if(array_key_exists($card->idBoard, $boards)) {
				$card->boardName = $boards[$card->idBoard]->name;
				if ($card->due != null) {
					$card->due = Carbon::parse($card->due, 'UTC')->setTimezone('Europe/Kiev');
				}
			}
		}
		
		$date = array();
		foreach ($cards as $key => $row) {
			$date[$key] = $row->due;
		}
		array_multisort($date, SORT_ASC, $cards);
		
		return $cards;
	}
	
	/**
	 * Get all cards by user, project and type
	 *
	 * @param string $userId
	 * @param string $boardId
	 * @param string $type
	 *
	 * @return array
	 */
	public function getCardsByUserAndProject($userId, $boardId, $type) {
		$curl = new Curl('GET', $this->_formRequest("boards/$boardId/cards/$type?members=true&"));
		$curl->exec();
		$results = $curl->response();
		
		$cards =  json_decode($results);
		
		$userCards = [];
		
		foreach ($cards as $card) {
			if (in_array($userId, $card->idMembers)) {
				$userCards[$card->id] = $card;
			}
		}
		
		return $userCards;
		
	}
	
	/**
	 * Get active cards
	 *
	 * @param array $cards
	 * @param array $doneLists
	 *
	 * @return array
	 */
	public function getActiveCards(array $cards, array $doneLists) {
		$activeCards = [];
		
		foreach ($cards as $card) {
			if (!array_key_exists($card->idList, $doneLists) && !$card->dueComplete) {
				$activeCards[$card->id] = $card;
			}
		}
		
		return $activeCards;
	}
	
	/**
	 * Get done cards
	 *
	 * @param array $cards
	 * @param array $doneLists
	 *
	 * @return array
	 */
	public function getDoneCards(array $cards, array $doneLists) {
		$activeCards = [];
		
		foreach ($cards as $card) {
			if (array_key_exists($card->idList, $doneLists) && $card->dueComplete) {
				$activeCards[$card->id] = $card;
			}
		}
		
		return $activeCards;
	}
	
	/**
	 * Get cards in the List
	 *
	 * @param array $cards
	 * @param array $list
	 *
	 * @return array
	 */
	public function getCardsInList(array $cards, array $list) {
		$cardsInList = [];
		
		foreach ($cards as $card) {
			if (array_key_exists($card->idList, $list)) {
				$cardsInList[$card->id] = $card;
			}
		}
		
		return $cardsInList;
	}
	
	/**
	 * Get fucked up cards
	 *
	 * @param array $cards
	 *
	 * @return array
	 */
	public function getFuckedUpCards(array $cards) {
		$fuckedUpCards = [];
		
		foreach ($cards as $cardId => $card) {
			if ($card->due != null && $card->due < Carbon::now() && !$card->dueComplete) {
				$fuckedUpCards[$cardId] = $card;
			}
		}
		$fuckedUpCards['quantity'] = count($fuckedUpCards);
		$fuckedUpCards['percentage'] = $fuckedUpCards['quantity']/count($cards)*100;
		
		return $fuckedUpCards;
	}
	
	/**
	 * @param $userId
	 *
	 * @return mixed
	 */
	public function getTrelloUserById($userId) {
		$curl = new Curl('GET', $this->_formRequest("members/$userId/?"));
		$curl->exec();
		$results = $curl->response();
		
		return json_decode($results);
	}
	
	public function getTrelloUsersByRole(User $user) {
		$users = [];
		
		if ($user->role == 'top') {
			$users = $this->getAllUsers();
		} elseif ($user->role == 'head') {
			$users = $this->_getTrelloUsersByBranch($user->branch_id);
		} else {
			$users[] = $this->getTrelloUserById($user->trello_id);
		}
		
		return $users;
	}
	
	/**
	 * @param $branchId
	 *
	 * @return array
	 */
	private function _getTrelloUsersByBranch($branchId) {
		$users = [];
		$teamMembers = User::getFullUsers()
		                   ->where('roles.branch', $branchId)
		                   ->get();
		
		foreach ($teamMembers as $member) {
			$trelloUser = $this->getTrelloUserById($member->trello_id);
			if (!is_null($trelloUser)) {
				$users[] = $trelloUser;
			}
		}
		
		return $users;
	}
	
	/**
	 * Form request to Trello API
	 *
	 * @param string $endpoint
	 *
	 * @return string
	 */
	private function _formRequest($endpoint) {
		$mainFrame = "https://api.trello.com/1/";
		$auth = "key=$this->_key&token=$this->_token";
		
		return $mainFrame.$endpoint.$auth;
	}
	
	/**
	 * @param array $boards
	 *
	 * @return array
	 */
	private function _formBoardsArray(array $boards) {
		$results= [];
		foreach ($boards as $board) {
			$results[$board->id] = $board;
		}
		
		return $results;
	}
	
}
