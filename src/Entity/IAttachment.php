<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:12
 */

namespace Mailsender\Core\Entity;

interface IAttachment extends \JsonSerializable
{

	public function getFileName(): string;

	public function getPath(): string;

	public function setDeleteAfterSend(bool $deleteAfterSend): IAttachment;

	public function isDeleteAfterSend(): bool;

}
