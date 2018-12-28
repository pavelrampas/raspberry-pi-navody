<?php
declare(strict_types=1);

namespace App\Presenters;


class HomepagePresenter extends \App\Presenters\BasePresenter
{
	/**
	 * @param int $strana
	 */
	public function renderDefault($strana = 1)
	{
		$number = 5;
		$page = $strana;
		$this->template->number = $number;
		$this->template->page = $page;
		$this->template->posts = $this->loadNewsList($page - 1, $number);
	}
}
