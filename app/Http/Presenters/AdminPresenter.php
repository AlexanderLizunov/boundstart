<?php

namespace App\Http\Presenters;

/**
 * Created by PhpStorm.
 * User: BogdanKootz
 * Date: 09.07.16
 * Time: 15:44
 */
use Carbon\Carbon;
use Laracasts\Presenter\Presenter;

class AdminPresenter extends Presenter {

	public function master() {
		if ($this->entity->master == 1) {
			return 'Да';
		}
		return "Нет";
	}

	public function last_visit() {
		Carbon::setLocale('ru');

		$last_visit = $this->entity->last_visit;

		$diff = $last_visit->diffForHumans(Carbon::now());

		return $diff;
	}
}