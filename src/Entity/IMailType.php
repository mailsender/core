<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:07
 */

namespace Mailsender\MailSet\Entity;

interface IMailType
{

	/**
	 * @return int
	 */
	public function getId(): int;

	/**
	 * @return string
	 */
	public function getName(): string;

	/**
	 * Instance of person who sends an email.
	 * @return IContact
	 */
	public function getSender(): IContact;

	/**
	 * @return string
	 */
	public function getSubject(): string;

	/**
	 * @return IAttachment[]|array
	 */
	public function getAttachments(): array;

	/**
	 * @return IContact[]|array
	 */
	public function getBccRecipients(): array;

	/**
	 * Returns charset
	 * @return string
	 */
	public function getCharset(): string;

	/**
	 * Returns priority. Higher priority will be sended earlier.
	 * @return int
	 */
	public function getPriority(): int;

}
