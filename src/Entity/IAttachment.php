<?php declare(strict_types = 1);

namespace Mailsender\Core\Entity;

use JsonSerializable;

/**
 * Interface IAttachment
 *
 * @package Mailsender\Core\Entity
 */
interface IAttachment extends JsonSerializable
{

	public function getFileName(): string;

	public function getPath(): string;

	public function setDeleteAfterSend(bool $deleteAfterSend): IAttachment;

	public function isDeleteAfterSend(): bool;

}
