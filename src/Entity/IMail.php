<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:17
 */

namespace Mailsender\MailSet\Entity;

use DateTimeInterface;

interface IMail extends \JsonSerializable
{

	/**
	 * @return int
	 */
	public function getId(): int;

	/**
	 * @return IMailType
	 */
	public function getMailType(): IMailType;

	/**
	 * @return IContact
	 */
	public function getRecipient(): IContact;

	/**
	 * @return IContact
	 */
	public function getSender(): IContact;

	/**
	 * @return null|string
	 */
	public function getSubject(): ?string;

	/**
	 * @return IAttachment[]|array
	 */
	public function getAttachments(): array;

	/**
	 * @return IContact[]|array
	 */
	public function getBccRecipients(): array;

	/**
	 * @return string
	 */
	public function getCharset(): string;

	/**
	 * @return DateTimeInterface
	 */
	public function getDateCreated(): DateTimeInterface;

	/**
	 * @return string
	 */
	public function getData(): string;

	/**
	 * @return string
	 */
	public function getHashcode(): string;

	/**
	 * @return DateTimeInterface
	 */
	public function getDateSent(): DateTimeInterface;

}
