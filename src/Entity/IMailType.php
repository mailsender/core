<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:07
 */

namespace Oli\MailServer\Entity;

interface IMailType
{

	public function getInt(): int;

	public function getName(): string;

	public function getSender(): IContact;

	public function getSubject(): string;

	/**
	 * @return IAttachment[]|array
	 */
	public function getAttachments(): array;

	/**
	 * @return IContact[]|array
	 */
	public function getBccRecipients(): array;

	public function getCharset(): string;

	public function getPriority(): int;
}
