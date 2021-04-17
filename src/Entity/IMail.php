<?php declare(strict_types = 1);

namespace Mailsender\Core\Entity;

use DateTimeInterface;
use JsonSerializable;

/**
 * Interface IMail
 *
 * @package Mailsender\Core\Entity
 */
interface IMail extends JsonSerializable
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
	 * @return DateTimeInterface|null
	 */
	public function getDateSent(): ?DateTimeInterface;

}
