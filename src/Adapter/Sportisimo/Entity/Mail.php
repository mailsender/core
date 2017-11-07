<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:29
 */

namespace Mailsender\MailSet\Adapter\Sportisimo\Entity;

use DateTimeInterface;
use Mailsender\MailSet\Entity\IAttachment;
use Mailsender\MailSet\Entity\IContact;
use Mailsender\MailSet\Entity\IMail;
use Mailsender\MailSet\Entity\IMailType;

final class Mail implements IMail
{

	/**
	 * @var int
	 */
	private $id;

	/**
	 * @var IMailType
	 */
	private $mailType;

	/**
	 * @var IContact
	 */
	private $recipient;

	/**
	 * @var IContact
	 */
	private $sender;

	/**
	 * @var string|null
	 */
	private $subject;

	/**
	 * @var array|IAttachment[]
	 */
	private $attachments = [];

	/**
	 * @var array|IContact[]
	 */
	private $bccRecipients = [];

	/**
	 * @var string
	 */
	private $charset;

	/**
	 * @var DateTimeInterface
	 */
	private $dateCreated;

	/**
	 * @var string
	 */
	private $data;

	/**
	 * @var string
	 */
	private $hashcode;

	/**
	 * @var DateTimeInterface
	 */
	private $dataSent;

	/**
	 * @param IMailType $mailType
	 * @return Mail
	 */
	public function setMailType(IMailType $mailType): Mail
	{
		$this->mailType = $mailType;

		return $this;
	}

	/**
	 * @param IContact $recipient
	 * @return Mail
	 */
	public function setRecipient(IContact $recipient): Mail
	{
		$this->recipient = $recipient;

		return $this;
	}

	/**
	 * @param IContact $sender
	 * @return Mail
	 */
	public function setSender(IContact $sender): Mail
	{
		$this->sender = $sender;

		return $this;
	}

	/**
	 * @param null|string $subject
	 * @return Mail
	 */
	public function setSubject($subject)
	{
		$this->subject = $subject;

		return $this;
	}

	/**
	 * @param array|IAttachment[] $attachments
	 * @return Mail
	 */
	public function setAttachments($attachments)
	{
		$this->attachments = $attachments;

		return $this;
	}

	/**
	 * @param array|IContact[] $bccRecipients
	 * @return Mail
	 */
	public function setBccRecipients($bccRecipients)
	{
		$this->bccRecipients = $bccRecipients;

		return $this;
	}

	/**
	 * @param string $charset
	 * @return Mail
	 */
	public function setCharset(string $charset): Mail
	{
		$this->charset = $charset;

		return $this;
	}

	/**
	 * @param DateTimeInterface $dateCreated
	 * @return Mail
	 */
	public function setDateCreated(DateTimeInterface $dateCreated): Mail
	{
		$this->dateCreated = $dateCreated;

		return $this;
	}

	/**
	 * @param string $data
	 * @return Mail
	 */
	public function setData(string $data): Mail
	{
		$this->data = $data;

		return $this;
	}

	/**
	 * @param string $hashcode
	 * @return Mail
	 */
	public function setHashcode(string $hashcode): Mail
	{
		$this->hashcode = $hashcode;

		return $this;
	}

	/**
	 * @param DateTimeInterface $dataSent
	 * @return Mail
	 */
	public function setDataSent(DateTimeInterface $dataSent): Mail
	{
		$this->dataSent = $dataSent;

		return $this;
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		// TODO: Implement getInt() method.
	}

	/**
	 * @return IMailType
	 */
	public function getMailType(): IMailType
	{
		// TODO: Implement getMailType() method.
	}

	/**
	 * @return IContact
	 */
	public function getRecipient(): IContact
	{
		// TODO: Implement getRecipient() method.
	}

	/**
	 * @return IContact
	 */
	public function getSender(): IContact
	{
		// TODO: Implement getSender() method.
	}

	/**
	 * @return null|string
	 */
	public function getSubject(): ?string
	{
		// TODO: Implement getSubject() method.
	}

	/**
	 * @return IAttachment[]|array
	 */
	public function getAttachments(): array
	{
		// TODO: Implement getAttachments() method.
	}

	/**
	 * @return IContact[]|array
	 */
	public function getBccRecipients(): array
	{
		// TODO: Implement getBccRecipients() method.
	}

	/**
	 * @return string
	 */
	public function getCharset(): string
	{
		// TODO: Implement getCharset() method.
	}

	/**
	 * @return DateTimeInterface
	 */
	public function getDateCreated(): DateTimeInterface
	{
		// TODO: Implement dateCreated() method.
	}

	/**
	 * @return string
	 */
	public function getData(): string
	{
		// TODO: Implement getData() method.
	}

	/**
	 * @return string
	 */
	public function getHashcode(): string
	{
		// TODO: Implement hashcode() method.
	}

	/**
	 * @return DateTimeInterface
	 */
	public function getDateSent(): DateTimeInterface
	{
		// TODO: Implement dateSent() method.
	}
}
