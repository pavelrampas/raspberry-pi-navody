<?php

namespace App\Presenters;


class NewsPresenter extends \App\Presenters\BasePresenter
{
	/**
	 * @param string $id
	 */
	public function renderDefault($id)
	{
		$postId = (int) explode('-', $id)[0];
		$this->template->posts = $this->loadNews($postId);
	}
}
