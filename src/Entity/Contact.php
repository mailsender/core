<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:29
 */

namespace Mailsender\MailSet\Entity;

final class Contact
{

	/**
	 * @var string
	 */
	private $name;

	/**
	 * @var string
	 */
	private $email;

	/**
	 * Contact constructor.
	 * @param string $name
	 * @param string $email
	 */
	public function __construct(string $name, string $email)
	{
		$this->name = $name;
		$this->email = $email;
	}

	/**
	 * @return string
	 */
	public function getName(): string
	{
		return $this->name;
	}

	/**
	 * @return string
	 */
	public function getEmail(): string
	{
		return $this->email;
	}

}
