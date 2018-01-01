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
use Ramsey\Uuid\Uuid;

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
	 * Fullfill parameters from encoded string.
	 * @param string $encodedJson
	 */
	public function setJson(string $encodedJson)
	{
		foreach(json_decode($encodedJson) as $key => $val)
		{
			if(property_exists(__CLASS__, $key))
			{
				$this->$key =  $val;
			}
		}
	}

	/**
	 * Set mail type and pre-fill all pre-fillable parameters.
	 * @param IMailType $mailType
	 * @return Mail
	 */
	public function setMailType(IMailType $mailType): Mail
	{
		$this->mailType = $mailType;

		$this->setSender($mailType->getSender());
		$this->setSubject($mailType->getSubject());
		$this->setAttachments($mailType->getAttachments());
		$this->setBccRecipients($mailType->getBccRecipients());
		$this->setCharset($mailType->getCharset());
		$this->setDateCreated(new \DateTime());
		$this->setHashcode(md5(Uuid::uuid4()));

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
	public function setSubject($subject): Mail
	{
		$this->subject = $subject;

		return $this;
	}

	/**
	 * @param array|IAttachment[] $attachments
	 * @return Mail
	 */
	public function setAttachments($attachments): Mail
	{
		$this->attachments = $attachments;

		return $this;
	}

	/**
	 * @param array|IContact[] $bccRecipients
	 * @return Mail
	 */
	public function setBccRecipients($bccRecipients): Mail
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
		return $this->id;
	}

	/**
	 * @return IMailType
	 */
	public function getMailType(): IMailType
	{
		return $this->mailType;
	}

	/**
	 * @return IContact
	 */
	public function getRecipient(): IContact
	{
		return $this->recipient;
	}

	/**
	 * @return IContact
	 */
	public function getSender(): IContact
	{
		return $this->sender;
	}

	/**
	 * @return null|string
	 */
	public function getSubject(): ?string
	{
		return $this->subject;
	}

	/**
	 * @return array|IAttachment[]
	 */
	public function getAttachments(): array
	{
		return $this->attachments;
	}

	/**
	 * @return array|IContact[]
	 */
	public function getBccRecipients(): array
	{
		return $this->bccRecipients;
	}

	/**
	 * @return string
	 */
	public function getCharset(): string
	{
		return $this->charset;
	}

	/**
	 * @return DateTimeInterface
	 */
	public function getDateCreated(): DateTimeInterface
	{
		return $this->dateCreated;
	}

	/**
	 * @return string
	 */
	public function getData(): string
	{
		return $this->data;
	}

	/**
	 * @return string
	 */
	public function getHashcode(): string
	{
		return $this->hashcode;
	}

	/**
	 * @return DateTimeInterface
	 */
	public function getDateSent(): DateTimeInterface
	{
		return $this->dataSent;
	}

	/**
	 * Specify data which should be serialized to JSON
	 * @link http://php.net/manual/en/jsonserializable.jsonserialize.php
	 * @return array|mixed[] data which can be serialized by <b>json_encode</b>,
	 * which is a value of any type other than a resource.
	 * @since 5.4.0
	 */
	public function jsonSerialize(): array
	{
		return get_object_vars($this);
	}

}
