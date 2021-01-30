<?php declare(strict_types = 1);

namespace Mailsender\Core\Entity;

/**
 * Class Contact
 * Copyright (c) 2017 Sportisimo s.r.o.
 *
 * @package Mailsender\Core\Entity
 */
class Contact implements IContact
{

	/**
	 * @var string
	 */
	private string $name;

	/**
	 * @var string
	 */
	private string $email;

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
