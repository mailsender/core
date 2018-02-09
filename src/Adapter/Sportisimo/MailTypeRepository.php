<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:45
 */

namespace Mailsender\MailSet\Adapter\Sportisimo;

use Mailsender\MailSet\Adapter\Sportisimo\Entity\MailType;
use Mailsender\MailSet\Entity\IMailType;
use Mailsender\MailSet\IMailTypeRepository;
use Sportisimo\Core\Database\IDatabase;

class MailTypeRepository implements IMailTypeRepository
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
	 * @throws \Exception
	 */
	public function fetchMailTypeByName(string $name): IMailType
	{
		try
		{
			return new MailType($this->database, null, $name);
		}
		catch (\Exception $e)
		{
			// TODO: osetrit vyjimky
			throw $e;
		}
	}

}
