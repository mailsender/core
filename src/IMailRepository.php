<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 28.02.2018
 * Time: 21:44
 */

namespace Mailsender\Core;

use Mailsender\Core\Entity\IMail;

interface IMailRepository
{

	/**
	 * @param int $id
	 * @return IMail
	 */
	public function fetchMailById(int $id): IMail;

}
