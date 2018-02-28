<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:31
 */

namespace Mailsender\Core\Entity;

class Attachment implements IAttachment
{

	/**
	 * @var string
	 */
	private $fileName;

	/**
	 * @var string
	 */
	private $path;

	/**
	 * @var bool
	 */
	private $deleteAfterSend = false;

	/**
	 * Attachment constructor.
	 * @param string $fileName
	 * @param string $path
	 */
	public function __construct(string $fileName, string $path)
	{
		$this->fileName = $fileName;
		$this->path = $path;
	}

	/**
	 * @return string
	 */
	public function getFileName(): string
	{
		return $this->fileName;
	}

	/**
	 * @return string
	 */
	public function getPath(): string
	{
		return $this->path;
	}

	/**
	 * @param bool $deleteAfterSend
	 * @return IAttachment
	 */
	public function setDeleteAfterSend(bool $deleteAfterSend = true): IAttachment
	{
		$this->deleteAfterSend = $deleteAfterSend;
		return $this;
	}

	/**
	 * @return bool
	 */
	public function isDeleteAfterSend(): bool
	{
		return $this->deleteAfterSend;
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
