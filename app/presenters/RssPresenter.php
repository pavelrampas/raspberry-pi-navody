<?php
declare(strict_types=1);

namespace App\Presenters;


class RssPresenter extends \App\Presenters\BasePresenter
{
	public function renderDefault()
	{
		$this->template->posts = $this->loadNewsList(0, 10);
		$this->template->date = time();
	}
}
