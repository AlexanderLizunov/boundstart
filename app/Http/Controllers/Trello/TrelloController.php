<?php

namespace App\Http\Controllers\Trello;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Trello\Trello;
use App\User;

class TrelloController extends Controller {
	
	public function index() {
		$user = User::getFullUser(\Auth::user()->id);
		$trello = new Trello();
		$users = $trello->getTrelloUsersByRole($user);
		$boards = $trello->getAllBoardsVisibleToTeam();
		
		return view('trello.index.index')->with([
			'users' => $users,
			'boards' => $boards
		]);
	}
	
	public function dashboard() {
		$userId = $_REQUEST['user_name'];
		if (array_key_exists('project', $_REQUEST)) {
			$projectId = $_REQUEST['project'];
		} else {
			$projectId = null;
		}
		
		$trello = new Trello();
		$teamBoards = $trello->getAllBoards();
		$allLists = $trello->getListsByNames($teamBoards);
		$doneLists = $trello->getListsByNames($teamBoards, ['Done', 'Archive', 'Cancelled']);
		
		if ($projectId != null && $projectId !== "all") {
			$userCards = $trello->getCardsByUserAndProject($userId, $projectId, 'open');
		} else {
			$userCards = $trello->getCardsByUser($userId,'open');
		}
		
		$orgCards = $trello->getAllCardsByOrganization($userCards, $allLists);
		$cards = $trello->formCards($orgCards, $teamBoards);
		$activeCards = $trello->getActiveCards($cards, $doneLists);
		$fuckedUpCards = $trello->getFuckedUpCards($cards);
		
		return view('trello.dashboard.dashboard')->with([
			'cardsTotal'    => count($orgCards),
			'cards'         => $activeCards,
			'fuckedUpTasks' => $fuckedUpCards,
		]);
	}
	
}
