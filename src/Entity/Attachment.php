<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:31
 */

namespace Mailsender\MailSet\Entity;

final class Attachment
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

}
