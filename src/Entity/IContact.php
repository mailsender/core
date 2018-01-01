<?php declare(strict_types = 1);
/**
 * Created by PhpStorm.
 * User: olisar
 * Date: 27.10.2017
 * Time: 21:11
 */

namespace Mailsender\MailSet\Entity;

interface IContact extends \JsonSerializable
{

	public function getName(): string;

	public function getEmail(): string;

}
