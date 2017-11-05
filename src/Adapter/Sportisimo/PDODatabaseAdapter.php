<?php
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:45
 */

namespace Oli\MailServer\Adapter\Sportisimo;

use Oli\MailServer\Adapter\Sportisimo\Entity\MailType;
use Oli\MailServer\Entity\IMailType;
use Oli\MailServer\IDatabaseAdapter;
use Sportisimo\Core\Database\IDatabase;

class PDODatabaseAdapter implements IDatabaseAdapter
{

	/**
	 * @var IDatabase
	 */
	private $database;

	/**
	 * PDODatabaseAdapter constructor.
	 * @param IDatabase $database
	 */
	public function __construct(IDatabase $database)
	{
		$this->database = $database;
	}

	/**
	 * @param string $name
	 * @return IMailType
	 * @throws \Sportisimo\Core\Nette\Exceptions\NoResultException
	 * @throws \Sportisimo\Core\Nette\Exceptions\InvalidArgumentException
	 * @throws \Sportisimo\Core\Database\Exceptions\DatabaseException
	 */
	public function fetchMailTypeByName(string $name): IMailType
	{
		return new MailType($this->database, null, $name);
	}

}
