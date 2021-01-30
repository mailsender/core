<?php declare(strict_types = 1);

namespace Mailsender\Core;

use Mailsender\Core\Entity\IMail;

/**
 * Interface IMailRepository
 *
 * @package Mailsender\Core
 */
interface IMailRepository
{

	/**
	 * @param int $id
	 * @return IMail
	 */
	public function fetchMailById(int $id): IMail;

}
