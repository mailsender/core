<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:07
 */

namespace Oli\MailServer\Adapter\Sportisimo\Entity;

use Oli\MailServer\Entity\IAttachment;
use Oli\MailServer\Entity\IContact;
use Oli\MailServer\Entity\IMailType;
use Sportisimo\Core\Database\Entities\APrimaryEntity;
use Sportisimo\Core\Database\IDatabase;

/**
 * Class MailType
 * @package Oli\MailServer\Entity
 */
final class MailType extends APrimaryEntity implements IMailType
{

	/**
	 * @var IDatabase
	 */
	private $database;

	/**
	 * MailType constructor.
	 * @param IDatabase $database
	 * @param int|null $id
	 * @param null|string $name
	 * @throws \Sportisimo\Core\Database\Exceptions\DatabaseException
	 * @throws \Sportisimo\Core\Nette\Exceptions\InvalidArgumentException
	 * @throws \Sportisimo\Core\Nette\Exceptions\NoResultException
	 * @throws \Sportisimo\Core\Nette\Exceptions\LogicException
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
	 * @throws \Sportisimo\Core\Database\Exceptions\DatabaseException
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
		// TODO: Implement mapping() method.
	}

	public function getInt(): int
	{
		// TODO: Implement getInt() method.
	}

	public function getName(): string
	{
		// TODO: Implement getName() method.
	}

	public function getSender(): IContact
	{
		// TODO: Implement getSender() method.
	}

	public function getSubject(): string
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

	public function getCharset(): string
	{
		// TODO: Implement getCharset() method.
	}

	public function getPriority(): int
	{
		// TODO: Implement getPriority() method.
	}

}
