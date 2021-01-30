<?php declare(strict_types = 1);

namespace Mailsender\Core;

use Mailsender\Core\Entity\IMailType;

/**
 * Interface IMailTypeRepository
 *
 * @package Mailsender\Core
 */
interface IMailTypeRepository
{

  /**
   * Returns mail type from database as one object.
   *
   * @param string $name
   *
   * @return \Mailsender\Core\Entity\IMailType
   */
	public function fetchMailTypeByName(string $name): IMailType;

}
