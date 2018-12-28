<?php
declare(strict_types=1);

namespace App\Presenters;

use Nette;

abstract class BasePresenter extends Nette\Application\UI\Presenter
{
	public const MODEL_NEWS = __DIR__ . '/../model/news.json';


	/**
	 * @param int|null $id
	 * @return array
	 */
	protected function loadNews($id = null)
	{
		$news = $this->getNews();

		if ($id) {
			foreach ($news as $new) {
				if ($new->id == $id) {
					return $new;
				}
			}
		}

		return $news;
	}


	/**
	 * @param int $page
	 * @param int $number
	 * @return array
	 */
	protected function loadNewsList($page = 0, $number = 5)
	{
		return array_slice($this->getNews(), $page * $number, $number);
	}


	/**
	 * @return array
	 */
	protected function getNews()
	{
		$json = file_get_contents(self::MODEL_NEWS);
		return json_decode($json)->news;
	}
}
