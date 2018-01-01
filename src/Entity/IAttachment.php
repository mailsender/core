<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:12
 */

namespace Mailsender\MailSet\Entity;

interface IAttachment extends \JsonSerializable
{

	public function getFileName(): string;

	public function getPath(): string;

}
