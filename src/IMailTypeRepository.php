<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:43
 */

namespace Mailsender\Core;

use Mailsender\Core\Entity\IMailType;

interface IMailTypeRepository
{

	/**
	 * Returns mail type from database as one object.
	 * @param string $name
	 * @return IMailType
	 */
	public function fetchMailTypeByName(string $name): IMailType;

}
