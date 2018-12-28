<?php
declare(strict_types=1);

namespace App;

use Nette;
use Nette\Application\Routers\Route;
use Nette\Application\Routers\RouteList;

class RouterFactory
{
	use Nette\StaticClass;

	/**
	 * @return Nette\Application\IRouter
	 */
	public static function createRouter()
	{
		$router = new RouteList();
		$router[] = new Route('rss.php', 'Rss:default', Route::ONE_WAY);
		$router[] = new Route('rss.xml', 'Rss:default');
		$router[] = new Route('<action>', 'Homepage:default');
		$router[] = new Route('novinky/<id>', 'News:default');
		return $router;
	}
}
