<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:07
 */

namespace Mailsender\MailSet\Adapter\Sportisimo\Entity;

use Mailsender\MailSet\Entity\Contact;
use Mailsender\MailSet\Entity\IAttachment;
use Mailsender\MailSet\Entity\IContact;
use Mailsender\MailSet\Entity\IMailType;
use Sportisimo\Core\Database\Entities\APrimaryEntity;
use Sportisimo\Core\Database\IDatabase;

/**
 * Class MailType
 * @package Mailsender\MailSet\Entity
 */
final class MailType extends APrimaryEntity implements IMailType
{

	/**
	 * Name of table in database.
	 * @var string
	 */
	public const TABLE = 'sm_mail_types';

	/**
	 * @var string
	 */
	public const NAME = 'name';

	/**
	 * @var string
	 */
	public const SENDER_NAME = 'sender_name';

	/**
	 * @var string
	 */
	public const SENDER_EMAIL = 'sender_email';

	/**
	 * @var string
	 */
	public const SUBJECT = 'subject';

	/**
	 * @var string
	 */
	public const ATTACHMENTS = 'attachments';

	/**
	 * @var string
	 */
	public const BCC_RECIPIENTS = 'bccRecipients';

	/**
	 * @var string
	 */
	public const CHARSET = 'charset';

	/**
	 * @var string
	 */
	public const PRIORITY = 'priority';

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var IContact
	 */
	private $sender;

	/**
	 * @var string
	 */
	private $subject;

	/**
	 * @var array|IAttachment[]
	 */
	private $attachments;

	/**
	 * @var array|IContact[]
	 */
	private $bccRecipients;

	/**
	 * @var string
	 */
	private $charset;

	/**
	 * @var int
	 */
	private $priority;

	/**
	 * MailType constructor.
	 * @param IDatabase $database
	 * @param int|null $id
	 * @param null|string $name
	 * @throws \Sportisimo\Core\Nette\Exceptions\LogicException
	 * @throws \Sportisimo\Core\Nette\Exceptions\NoResultException
	 * @throws \Sportisimo\Core\Nette\Exceptions\InvalidArgumentException
	 * @throws \Sportisimo\Core\Nette\Exceptions\DuplicateException
	 * @throws \Sportisimo\Core\Database\Exceptions\LockException
	 * @throws \Sportisimo\Core\Database\Exceptions\DeadlockException
	 * @throws \Sportisimo\Core\Database\Exceptions\DatabaseException
	 */
	public function __construct(IDatabase $database, ?int $id, ?string $name = null)
	{
		if($id !== null)
		{
		  parent::__construct($database, $id);
		}
		else
		{
			$this->database = $database;
			$this->load($name);
		}
	}

	/**
	 * @param string $name
	 * @throws \Sportisimo\Core\Nette\Exceptions\DuplicateException
	 * @throws \Sportisimo\Core\Database\Exceptions\LockException
	 * @throws \Sportisimo\Core\Database\Exceptions\DeadlockException
	 * @throws \Sportisimo\Core\Database\Exceptions\DatabaseException
	 * @throws \Sportisimo\Core\Nette\Exceptions\InvalidArgumentException
	 * @throws \Sportisimo\Core\Nette\Exceptions\InvalidArgumentException
	 * @throws \Sportisimo\Core\Nette\Exceptions\InvalidArgumentException
	 * @throws \Sportisimo\Core\Nette\Exceptions\NoResultException
	 */
	private function load(string $name): void
	{
		$row = $this->database->queryBuilder()
			->select()
			->from(self::TABLE)
			->where(self::NAME . ' = ?', $name)
			->execute()
			->fetch(self::class);
		$this->mapping($row);
	} // load()

	/**
	 * Mapovani vysledku z databaze na entitu
	 * @param array|mixed[] $row
	 * @return void
	 */
	protected function mapping(array $row): void
	{
		$this->id = $row[self::ID];
		$this->name = $row[self::NAME];
		$this->sender = new Contact($row[self::SENDER_NAME], $row[self::SENDER_EMAIL]);
		$this->subject = $row[self::SUBJECT];
		$this->attachments = $row[self::ATTACHMENTS];
		$this->bccRecipients = $row[self::BCC_RECIPIENTS];
		$this->charset = $row[self::CHARSET];
		$this->priority = $row[self::PRIORITY];
	}

	/**
	 * @return int
	 */
	public function getId(): int
	{
		return $this->id;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return IContact
	 */
	public function getSender(): IContact
	{
		return $this->sender;
	}

	/**
	 * @return string
	 */
	public function getSubject(): string
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
	 * @return int
	 */
	public function getPriority(): int
	{
		return $this->priority;
	}

}
