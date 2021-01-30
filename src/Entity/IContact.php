<?php declare(strict_types = 1);

namespace Mailsender\Core\Entity;

use JsonSerializable;

/**
 * Interface IContact
 *
 * @package Mailsender\Core\Entity
 */
interface IContact extends JsonSerializable
{

	public function getName(): string;

	public function getEmail(): string;

}
